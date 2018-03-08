@extends('layouts.front')
@section('title')

@endsection
@section('content')
   <div class="container animated fadeInRight">
      <br>
      <center>
         <strong><a href="{{route('front/index')}}">Home</a></strong> / <strong>{{$service->name}}</strong>
      </center>
      <div class="row">
         @foreach ($service->subServices as $subService)
            <div class="col-lg-3">
               <a href="{{route('front/subService', $subService->slug)}}" style="color:white">
                  <div class="widget navy-bg p-lg text-center">
                     <div class="m-b-md">
                        {!! $subService->icon !!}
                        <br><br>
                         <h3 class="font-bold no-margins">
                             {{$subService->name}}
                         </h3>
                        {{-- <small><a href="{{route('front/subService', $subService->slug)}}" style="color:white">View</a> </small> --}}
                     </div>
                  </div>
               </a>
            </div>
         @endforeach
      </div>
      <br>
      <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
