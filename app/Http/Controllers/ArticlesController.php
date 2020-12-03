<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Gate;
use PDF;
use Storage;

class articlesController extends Controller
{
    // public function __construct()
    // {
    //     //$this->middleware('auth');
    //     $this->middleware(function($request, $next){
    //         if(Gate::allows('manage-articles')) return $next($request);
    //         abort(403, 'Anda tidak memiliki cukup hak akses');
    //     });
    // }

    public function viewArticles($id){
        $articles = Article::find($id);
        $articles = json_decode(json_encode($articles));
        return view('articles', ['articles'=>$articles], ['id'=>$id]);
        $value = Cache::rememberForever('articles', function(){
            return \app\articles::all();
        });    
    }
    public function index()
    {
        $articles = Article::all();
        $users = User::all();
        return view('admin.articles.manage',['articles' => $articles],['users' => $users]);
    }
    public function add()
    {
        return view('admin.articles.addarticle');
    }
    public function create(Request $request)
    {
        if($request->file('image')){
            $image_name = $request->file('image')->store('img','public');
        }
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'genre' => $request->genre,
            'featured_image' => $image_name,
        ]);
        return redirect('/manage');
    }
    public function edit($id)
    {
        $articles = Article::find($id);
        return view('admin.articles.editarticle',['articles'=>$articles]);
    }
    public function update($id, Request $request)
    {
        $articles = Article::find($id);
        if ($request->file('image')) {
            // echo "Has Image"; die;
            $articles->title = $request->title;
            $articles->content = $request->content;
            $articles->genre = $request->genre;
            if($articles->featured_image && file_exists(storage_path('app/public/' . $articles->featured_image)))
            {
                Storage::delete('public/'. $articles->featured_image);
            }
            $image_name = $request->file('image')->store('img', 'public');
            $articles->featured_image = $image_name;
            $articles->save();
        }
        return redirect('/manage');
    }
    public function delete($id)
    {
        $articles = Article::find($id);
        $articles->delete();
        return redirect('/manage');
    }
    

    public function cetak_pdf(){
        $articles = Article::all();
        $pdf = PDF::loadview('articles_pdf',['articles'=>$articles]);
        return $pdf->stream();
       }
}
