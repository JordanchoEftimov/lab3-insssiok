<?php

namespace App\Http\Controllers;

use App\Enums\MediaUsage;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;

class BlogPostController extends Controller
{
    public function __invoke(): Response
    {
        $blogPosts = BlogPost::query()
            ->with('images')
            ->latest()
            ->paginate();

        return Inertia::render('BlogPost/Index', compact('blogPosts'));
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $blogPost = new BlogPost($request->validated());
            $blogPost->user()->associate(auth()->id());
            $blogPost->save();
            $blogPost->uploadAndCreateImage($request->file('image'), MediaUsage::DEFAULT, 'blog-post-images/'.$blogPost->id, 500, 500);
        });

        return back()->with('success', 'Successfully created your new blog post');
    }
}
