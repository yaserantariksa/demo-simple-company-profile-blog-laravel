<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Article;
use App\Models\Tag;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $articles = Article::where('title', 'LIKE', "%$search%")
            ->orWhereHas('tags', function (Builder $query) use ($search) {
                $query->where('title', 'LIKE', "%$search%");
            })
                ->latest()
                ->paginate(10);
        } else {
            $articles = Article::latest()->paginate(10);
        }
        return view('admin.article.index', compact('articles', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.article.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:60',
            'featured_img' => 'nullable|image',
            'video_url' => 'nullable|url',
            'content' => 'required',
        ]);

        $title = $request->title;
        $slug = Str::slug($title, '-');
        $is_draft = $request->is_draft ? 'true' : false;

        // check if slug is duplicate
        if (count(Article::where('slug', $slug)->get()) == 0) {
            $image = $request->file('featured_img');

            if ($image == null) {
                $article = [
                    'title' => $title,
                    'slug' => $slug,
                    'user_id' => $request->user_id,
                    'video_url' => $request->video_url,
                    'content' => $request->content,
                    'is_draft' => $is_draft,
                ];
            } else {
                $image->storeAs('public/upload', $image->hashName());
                $article = [
                    'title' => $title,
                    'slug' => $slug,
                    'user_id' => $request->user_id,
                    'featured_img' => $image->hashName(),
                    'video_url' => $request->video_url,
                    'content' => $request->content,
                    'is_draft' => $is_draft,
                ];
            }
            $savedArticle = Article::create($article);

            $tags = $request->tags;
            $savedArticle->tags()->attach($tags);

            if ($is_draft) {
                return redirect()->route('articles.index')->withSuccess('Article saved as draft successfully');
            } else {
                return redirect()->route('articles.index')->withSuccess('Article publish successfully');
            }
        }

        return back()->withErrors(['title' => 'Title is already exist, submit unique title!'])->onlyInput('title');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        confirmDelete('Delete Article!', 'Are you sure you want to delete?');

        $article = Article::firstWhere('slug', $slug);
        $video_key = null;
        if ($article->video_url) {
            $video_key = (explode('/', $article->video_url))[3];
        }
        return view('admin.article.show', compact('article', 'video_key'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $article = Article::firstWhere('slug', $slug);

        if (Auth::user()->id == $article->user_id) {

            $existing_tags_id = [];
            foreach ($article->tags()->get() as $tag) {
                $existing_tags_id[] = $tag->id;
            }
            $tags = Tag::all();
            return view('admin.article.edit', compact('article', 'tags', 'existing_tags_id'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug): RedirectResponse
    {
        $oldArticle = Article::firstWhere('slug', $slug);
        if (Auth::user()->id == $oldArticle->user_id) {
            $request->validate([
                'title' => 'required',
                'featured_img' => 'nullable|image',
                'video_url' => 'nullable|url',
                'content' => 'required',
            ]);

            $newTitle = $request->title;
            $newSlug = Str::slug($newTitle, '-');
            $newImage = $request->file('featured_img');
            $is_draft = $request->is_draft ? 'true' : false;

            if ((count(Article::where('slug', $newSlug)->get()) == 0) || (count(Article::where('slug', $newSlug)->get()) == 1) && ($oldArticle->id == Article::firstWhere('slug', $newSlug)->id)) {

                if ($newImage) {
                    $newImage->storeAs('public/upload', $newImage->hashName());
                    Storage::delete('public/upload/' . $oldArticle->featured_img);

                    $article = [
                        'title' => $newTitle,
                        'slug' => $newSlug,
                        'featured_img' => $newImage->hashName(),
                        'video_url' => $request->video_url,
                        'is_draft' => $is_draft,
                    ];
                } else {
                    $article = [
                        'title' => $newTitle,
                        'slug' => $newSlug,
                        'video_url' => $request->video_url,
                        'is_draft' => $is_draft,
                    ];
                }

                $oldTags = [];
                foreach ($oldArticle->tags()->get()->toArray() as $tag) {
                    $oldTags[] = $tag['id'];
                }

                $newTags = $request->tags;
                $detachTags = array_diff($oldTags, $newTags);
                $attachTags = array_diff($newTags, $oldTags);

                if (count($detachTags) != 0) {
                    $oldArticle->tags()->detach($detachTags);
                }

                if (count($attachTags) != 0) {
                    $oldArticle->tags()->attach($attachTags);
                }

                $oldArticle->update($article);

                return redirect()->route('articles.index')->withSuccess('Article updated successfully!');
            }
        }


        return back()->withErrors(['title' => 'Updated title is duplicate with other article'])->onlyInput('title');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug): RedirectResponse
    {
        $article = Article::firstWhere('slug', $slug);
        if (Auth::user()->id == $article->user_id) {
            if ($article) {
                if ($article->featured_img) {
                    Storage::delete('public/upload/' . $article->featured_img);
                }
                $article->delete();
                return redirect()->route('articles.index');
            }
            return back();
        }
    }
}
