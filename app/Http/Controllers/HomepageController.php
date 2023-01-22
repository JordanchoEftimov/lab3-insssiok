<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Inertia\Inertia;
use Inertia\Response;

class HomepageController extends Controller
{
    public function __invoke(): Response
    {
        $blogPosts = BlogPost::query()
            ->latest()
            ->with('images')
            ->take(3)
            ->get();

        return Inertia::render('Homepage', compact('blogPosts'));
    }
}
