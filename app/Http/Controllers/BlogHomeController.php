<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogHomeController extends Controller
{
    public function bloghome(){
    	return view('bloghome');
    }
}
