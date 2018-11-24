<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
		$articles = Article::where('status', 'published')
			->whereNull('deleted_at')
    		->orderBy('created_at', 'desc')
    		->paginate(10);

    	return View::make('articles.index')
    		->with('active', 'articles')
    		->with('articles', $articles);
    }

    public function show($slug)
    {
    	$article = Article::where('slug', $slug)
    		->first();

    	return View::make('articles.show')
    		->with('active', 'articles')
    		->with('article', $article);
    }
}
