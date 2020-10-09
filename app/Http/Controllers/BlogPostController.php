<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function blogpost(){
    	return view('blogpost');
    }
}
