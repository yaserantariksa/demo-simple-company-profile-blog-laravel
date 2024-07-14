<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Article;
use App\Models\Tag;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $articles = Article::latest()->simplePaginate(6);

        $tags = Tag::all();
        return view('website.home', compact('tags', 'articles'));
    }

    public function blog(Request $request)
    {
        $search = $request->search;
        if ($search) {
            $articles = Article::where('title', 'LIKE', "%$search%")
                ->orWhereHas('tags', function (Builder $query) use ($search) {
                    $query->where('title', 'LIKE', "%$search%");
                })
                ->latest()
                ->simplePaginate(10);
        } else {
            $articles = Article::latest()->simplePaginate(10);
        }
        $tags = Tag::all();
        return view('website.blog', compact('tags', 'articles', 'search'));
    }
}
