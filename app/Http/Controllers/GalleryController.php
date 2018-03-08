<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
   public function index()
   {
      $galleries = Gallery::orderBy('created_at', 'desc')->get();
      return view('galleries.index', compact('galleries'));
   }

   public function store(Request $request)
   {
      // validate
      request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      // upload image
      $imageName = time().'.'.request()->image->getClientOriginalExtension();
      request()->image->move(public_path('storage/galleries'), $imageName);
      // store data
      $gallery = Gallery::create([
         'image'	=> $imageName,
         'note'   => $request->note,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function destroy($id)
   {
      $gallery = Gallery::findOrFail($id);
      $gallery->delete();

      return back()->with('success', 'Data deleted');
   }
}
