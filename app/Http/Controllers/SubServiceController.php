<?php

namespace App\Http\Controllers;

use App\Service;
use App\SubService;
use Illuminate\Http\Request;

class SubServiceController extends Controller
{
   public function index()
   {
      $subServices = SubService::orderBy('service_id', 'desc')->get();
      return view('subServices.index', compact('subServices'));
   }

   public function create()
   {
      $services = Service::where('id', 0)
                           ->where('id', 4)
                           ->orderBy('name', 'asc')->get();
      return view('subServices.create', compact('services'));
   }

   public function store(Request $request)
   {
      // validasi
      $this->validate($request, [
         'name'			=> 'required',
         'description'	=> 'required',
         'service_id'   => 'required',
      ]);
      // upload image
      if (!empty($request->image)) {
         request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         $imageName = time().'.'.request()->image->getClientOriginalExtension();
         request()->image->move(public_path('storage/subServices'), $imageName);
      }else {
         $imageName = 'subService.jpg';
      }
      // slug
      $slug = str_slug($request->name, '-');
      if(SubService::where('slug', $slug)->first() != null){
         $slug = $slug.'-'.time();
      }
      // store data
      $subService = SubService::create([
         'name'			=> $request->name,
         'slug'			=> $slug,
         'description'	=> $request->description,
         'image'			=> $imageName,
         'service_id'   => $request->service_id,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function edit($id)
   {
      $subService = SubService::findOrFail($id);
      $services   =  Service::where('id', '!=', 0)
                              ->where('id', '!=', 4)
                              ->orderBy('name', 'asc')->get();

      if (!empty($subService)) {
         return view('subServices.edit', compact('subService', 'services'));
      }else {
         return back()->with('warning', 'Sorry, data not found.');
      }
   }

   public function update(Request $request)
   {
      // validasi
      $this->validate($request, [
         'id'           => 'required',
         'name'			=> 'required',
         'description'	=> 'required',
         'service_id'	=> 'required',
      ]);
      // cek data
      $subService = SubService::findOrFail($request->id);
      $subService->update([
         'name'			=> $request->name,
         'description'	=> $request->description,
         'service_id'	=> $request->service_id,
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
      request()->image->move(public_path('storage/subServices'), $imageName);
      // update image
      $subService = SubService::findOrFail($request->id);
      $subService->update([
         'image' => $imageName,
      ]);

      return back()->with('success', 'Image uploaded');
   }

   public function destroy($id)
   {
      $subService = SubService::findOrFail($id);
      $subService->delete();

      return back()->with('success', 'Data deleted');
   }
}
