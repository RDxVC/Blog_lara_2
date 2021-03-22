<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
      $posts = Post::where('status', Post::IS_PUBLIC)->paginate(2);
      $popularPosts = Post::orderBy('views', 'desc')->take(3)->get();
      $recentPosts = Post::orderBy('date', 'desc')->take(4)->get();
      $categories = Category::all();
      return view('pages.index', compact('posts', 'popularPosts', 'recentPosts', 'categories'));
    }

    public function show($slug)
    {
      $post = Post::where('slug', $slug)->firstOrFail();
      $count = Comment::count();
      return view('pages.show', compact('post', 'count'));
    }

    public function tag($slug)
    {
      $tag = Tag::where('slug', $slug)->firstOrFail();
      $posts = $tag->posts()->paginate(2);
      return view('pages.list', compact('posts'));
    }

    public function category($slug)
    {
      $category = Category::where('slug', $slug)->firstOrFail();
      $posts = $category->posts()->paginate(2);
      return view('pages.list', compact('posts'));

    }
}
