<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
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
}
