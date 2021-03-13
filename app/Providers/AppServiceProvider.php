<?php

namespace App\Providers;

use App\Comment;
use App\Post;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('pages._sidebar', function($view){
          $view->with('popularPosts', Post::orderBy('views', 'desc')->take(3)->get());
          $view->with('recentPosts', Post::orderBy('date', 'desc')->take(4)->get());
          $view->with('categories', Category::all());
        });

        view()->composer('admin._sidebar', function($view){
          $view->with('newCommentsCount', Comment::where('status', 0)->count());
        });

    }
}
