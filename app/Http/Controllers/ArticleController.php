<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Article;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function articles($id){
    	$article = Cache::remember("article:$id", 60, function () use ($id) {
    		return Article::findOrFail($id);
    	});
    	return view('article')
    	->with('article', $article);
    }

    public function add(){
    	return view('addarticle');
    }

    public function create(Request $request){
    	Article::create([''])
    }
}
