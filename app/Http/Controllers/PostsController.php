<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function showPosts($id)
    {
      $posts = Post::where('user_id', $id)->paginate(2);
        return view('pages.index', compact('posts'));
    }

    public function create()
    {
      $categories = Category::pluck('title', 'id')->all();
      $tags = Tag::pluck('title', 'id')->all();
        return view('pages.create', compact(
          'categories',
          'tags'
        ));
    }


    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
        'date' => 'required',
        'image' => 'nullable|image'
      ]);
      $post = Post::add($request->all());
      $post->uploadImage($request->file('image'));
      $post->setCategory($request->get('category_id'));
      $post->setTags($request->get('tags'));
      $post->toggleStatus($request->get('status'));

      return redirect('/')->with('status', 'Пост успешно добавлен!');

    }

}
