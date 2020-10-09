<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Article2Controller extends Controller
{
    public function article()
    {
    	$articles = DB::table('articles')->get();
    	return view('article',['articles' => $articles]);

    }
}
