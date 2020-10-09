<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Article;

class ArticleController extends Controller
{
    public function articles(){
    	$article = Article::all();
    	return view('article', compact('article'));
    }
}
