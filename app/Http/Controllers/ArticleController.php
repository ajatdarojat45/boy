<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
   public function index()
   {
      $articles = Article::orderBy('created_at', 'desc')->get();
      return view('articles.index', compact('articles'));
   }

   public function create()
   {
      return view('articles.create');
   }

   public function store(Request $request)
   {
      // validasi
      $this->validate($request, [
         'title'			=> 'required',
         'description'	=> 'required',
      ]);
      // slug
      $slug = str_slug($request->title, '-');
      if(Article::where('slug', $slug)->first() != null){
         $slug = $slug.'-'.time();
      }
      // store data
      $article = Article::create([
         'title'			=> $request->title,
         'slug'			=> $slug,
         'description'	=> $request->description,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function edit($id)
   {
      $article = Article::findOrFail($id);
      return view('articles.edit', compact('article'));
   }

   public function update(Request $request)
   {
      // validasi
      $this->validate($request, [
         'id'			   => 'required',
         'title'			=> 'required',
         'description'	=> 'required',
      ]);
      // upadte data
      $article = Article::findOrFail($request->id);
      $article->update([
         'title'        => $request->title,
         'description'  => $request->description,
      ]);

      return back()->with('success', 'Data updated');
   }

   public function destroy($id)
   {
      $article = Article::findOrFail($id);
      $article->delete();

      return back()->with('success', 'Data deleted');
   }
}
