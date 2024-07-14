<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Tag;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        confirmDelete('Delete Tag!', 'Are you sure you want to delete?');
        return view('admin.tag.index', compact('tags'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required'
        ]);

        $title = Str::lower($request->title);
        $slug = Str::slug($title, '-');

        // Check if slug is exist
        if (Tag::firstWhere('slug', $slug) == null) {
            Tag::create([
                'title' => $title,
                'slug' => $slug,
            ]);

            return redirect()->route('tags.index');
        }

        return back()->withErrors(['title' => 'Tag is exist!'])->withInput();
    }

    public function destroy(string $slug): RedirectResponse
    {
        $tag = Tag::firstWhere('slug', $slug);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
