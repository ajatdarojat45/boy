<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   public function index()
   {
      $services = Service::where('id', '!=', 0)
                           ->where('id', '!=', 4)
                           ->orderBy('created_at', 'desc')->get();
      return view('services.index', compact('services'));
   }

   public function create()
   {
      return view('services.create');
   }

   public function store(Request $request)
   {
      // validasi
      $this->validate($request, [
         'name'			=> 'required',
         'description'	=> 'required',
      ]);
      // upload image
      if (!empty($request->image)) {
         request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
         $imageName = time().'.'.request()->image->getClientOriginalExtension();
         request()->image->move(public_path('storage/services'), $imageName);
      }else {
         $imageName = 'service.jpg';
      }
      // slug
      $slug = str_slug($request->name, '-');
      if(Service::where('slug', $slug)->first() != null){
         $slug = $slug.'-'.time();
      }
      // store data
      $service = Service::create([
         'name'			=> $request->name,
         'slug'			=> $slug,
         'description'	=> $request->description,
         'image'			=> $imageName,
      ]);

      return back()->with('success', 'Data saved');
   }

   public function edit($id)
   {
      $service = Service::findOrFail($id);

      if (!empty($service)) {
         return view('services.edit', compact('service'));
      }else {
         return back()->with('warning', 'Sorry, data not found.');
      }
   }

   public function update(Request $request)
   {
      // validasi
      $this->validate($request, [
         'name'			=> 'required',
         'description'	=> 'required',
      ]);
      // cek data
      $service = Service::findOrFail($request->id);
      $service->update([
         'name'			=> $request->name,
         'description'	=> $request->description,
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
      request()->image->move(public_path('storage/services'), $imageName);
      // update image
      $service = Service::findOrFail($request->id);
      $service->update([
         'image' => $imageName,
      ]);

      return back()->with('success', 'Image uploaded');
   }

   public function destroy($id)
   {
      $service = Service::findOrFail($id);
      $service->delete();

      return back()->with('success', 'Data deleted');
   }

   public function profile()
   {
      $profile = Service::where('id', 0)->first();
      return view('profiles.edit', compact('profile'));
   }

   public function profileUpdate(Request $request)
   {
      // validasi
      $this->validate($request, [
         'name'			=> 'required',
         'description'	=> 'required',
         'slug'         => 'required',
         'icon'         => 'required',
      ]);
      // cek data
      $service = Service::findOrFail($request->id);
      $service->update([
         'name'			=> $request->name,
         'description'	=> $request->description,
         'slug'			=> $request->slug,
         'icon'      	=> $request->icon,
      ]);

      return back()->with('success', 'Data updated');
   }

   public function contact()
   {
      $contact = Service::where('id', 4)->first();
      return view('contacts.edit', compact('contact'));
   }
}
