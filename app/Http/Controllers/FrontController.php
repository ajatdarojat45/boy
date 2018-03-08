<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Article;
use App\Service;
use App\SubService;
use App\DetailService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
   public function index()
   {
      $services = Service::where('id', '!=', 0)
                           ->where('id', '!=', 4)
                           ->orderBy('name', 'asc')->get();
      return view('fronts.index', compact('services'));
   }

   public function service($slug)
   {
      $service = Service::where('slug', $slug)->first();
      return view('fronts.service', compact('service'));
   }

   public function subService($slug)
   {
      $subService = SubService::where('slug', $slug)->first();
      return view('fronts.subService', compact('subService'));
   }

   public function detailService($slug)
   {
      $detailService = DetailService::where('slug', $slug)->first();
      return view('fronts.detailService', compact('detailService'));
   }

   public function profile()
   {
      $profile = Service::where('id', 0)->first();
      return view('fronts.profile', compact('profile'));
   }

   public function contact()
   {
      $contact = Service::where('id', 4)->first();
      return view('fronts.contact', compact('contact'));
   }

   public function article()
   {
      $articles = Article::orderBy('created_at', 'asc')->paginate(12);
      return view('fronts.article', compact('articles'));
   }

   public function articleDetail($slug)
   {
      $article = Article::where('slug', $slug)->first();
      return view('fronts.articleDetail', compact('article'));
   }

   public function gallery()
   {
      $galleries = Gallery::orderBy('created_at', 'desc')->paginate(12);
      return view('fronts.gallery', compact('galleries'));
   }

}
