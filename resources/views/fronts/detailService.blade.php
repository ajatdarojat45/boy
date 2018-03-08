@extends('layouts.front')
@section('title')

@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <center>
         <strong><a href="{{route('front/index')}}">Home</a></strong> /
         <strong><a href="{{route('front/service', $detailService->subService->service->slug)}}">{{$detailService->subService->service->name}}</a></strong> /
         <strong><a href="{{route('front/subService', $detailService->subService->slug)}}">{{$detailService->subService->name}}</a></strong> /
         <strong>{{$detailService->name}}</strong>
      </center>
      <div class="row">
         <br>
         <div class="col-lg-12">
            <div class="animated fadeInRight">
               <div class="mail-box">
                  <div class="mail-body">
                     <h3 class="text-center">{{$detailService->name}}</h3>
                     {!! $detailService->description !!}
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
      <center><a href="{{route('front/subService', $detailService->subService->slug)}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
