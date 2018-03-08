<?php

namespace App\Http\Controllers;

use App\SubService;
use App\Detailservice;
use Illuminate\Http\Request;

class DetailServiceController extends Controller
{
   public function index()
   {
      $detailServices = DetailService::orderBy('sub_service_id', 'desc')->get();
      return view('detailServices.index', compact('detailServices'));
   }

   public function create()
   {
      $subServices = SubService::orderBy('service_id', 'asc')->get();
      return view('detailServices.create', compact('subServices'));
   }

   public function store(Request $request)
   {
      // validasi
      $this->validate($request, [
         'name'			    => 'required',
         'description'	    => 'required',
         'sub_service_id'   => 'required',
      ]);
      // upload image
      if (!empty($request->image)) {
         request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         $imageName = time().'.'.request()->image->getClientOriginalExtension();
         request()->image->move(public_path('storage/detailServices'), $imageName);
      }else {
         $imageName = 'detailService.jpg';
      }
      // slug
      $slug = str_slug($request->name, '-');
      if(DetailService::where('slug', $slug)->first() != null){
         $slug = $slug.'-'.time();
      }
      // store data
      $detailService = DetailService::create([
         'name'			   => $request->name,
         'slug'			   => $slug,
         'description'     => $request->description,
         'image'			   => $imageName,
         'sub_service_id'  => $request->sub_service_id,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function edit($id)
   {
      $detailService = DetailService::findOrFail($id);
      $subServices   = SubService::orderBy('service_id', 'asc')->get();

      if (!empty($detailService)) {
         return view('detailServices.edit', compact('detailService', 'subServices'));
      }else {
         return back()->with('warning', 'Sorry, data not found.');
      }
   }

   public function update(Request $request)
   {
      // validasi
      $this->validate($request, [
         'id'              => 'required',
         'name'			   => 'required',
         'description'     => 'required',
         'sub_service_id'  => 'required',
      ]);
      // cek data
      $detailService = DetailService::findOrFail($request->id);
      $detailService->update([
         'name'			   => $request->name,
         'description'	   => $request->description,
         'sub_service_id'  => $request->sub_service_id,
      ]);

      return back()->with('success', 'Data updated');
   }

   public function updateImage(Request $request)
   {
      // upload image
      request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
      $imageName = time().'.'.request()->image->getClientOriginalExtension();
      request()->image->move(public_path('storage/detailServices'), $imageName);
      // update image
      $detailService = DetailService::findOrFail($request->id);
      $detailService->update([
         'image' => $imageName,
      ]);

      return back()->with('success', 'Image uploaded');
   }

   public function destroy($id)
   {
      $detailService = DetailService::findOrFail($id);
      $detailService->delete();

      return back()->with('success', 'Data deleted');
   }
}
