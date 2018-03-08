@extends('layouts.front')
@section('title')

@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <div class="row">
         <div class="col-lg-3">
            <a href="{{route('front/profile')}}" style="color:white">
            <div class="widget navy-bg p-lg text-center">
               <div class="m-b-md">
                  <i class="fa fa-user-circle fa-4x"></i>
                  <br><br>
                   <h3 class="font-bold no-margins">
                       Profile
                   </h3>
               </div>
            </div>
            </a>
         </div>
         <div class="col-lg-3">
            <a href="{{route('front/contact')}}" style="color:white">
            <div class="widget navy-bg p-lg text-center">
               <div class="m-b-md">
                  <i class="fa fa-phone fa-4x"></i>
                  <br><br>
                   <h3 class="font-bold no-margins">
                       Contact
                   </h3>
               </div>
            </div>
            </a>
         </div>
         <div class="col-lg-3">
            <a href="{{route('front/article')}}" style="color:white">
            <div class="widget navy-bg p-lg text-center">
               <div class="m-b-md">
                  <i class="fa fa-newspaper-o fa-4x"></i>
                  <br><br>
                   <h3 class="font-bold no-margins">
                       Article
                   </h3>
               </div>
            </div>
            </a>
         </div>
         <div class="col-lg-3">
            <a href="{{route('front/gallery')}}" style="color:white">
            <div class="widget navy-bg p-lg text-center">
               <div class="m-b-md">
                  <i class="fa fa-image fa-4x"></i>
                  <br><br>
                   <h3 class="font-bold no-margins">
                       Gallery
                   </h3>
               </div>
            </div>
            </a>
         </div>
         @foreach ($services as $service)
            <div class="col-lg-3">
               <a href="{{route('front/service', $service->slug)}}" style="color:white">
               <div class="widget navy-bg p-lg text-center">
                  <div class="m-b-md">
                     {!! $service->icon !!}
                     <br><br>
                      <h3 class="font-bold no-margins">
                          {{$service->name}}
                      </h3>
                      {{-- <small><a href="{{route('front/service', $service->slug)}}" style="color:white">View</a> </small> --}}
                  </div>
               </div>
               </a>
            </div>
         @endforeach
      </div>
   </div>
@endsection
