@extends('layouts.front')
@section('title')

@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <center>
         <strong><a href="{{route('front/index')}}">Home</a></strong> /
         <strong><a href="{{route('front/service', $subService->service->slug)}}">{{$subService->service->name}}</a></strong> /
         <strong>{{$subService->name}}</strong>
      </center>
      <div class="row">
         @php
            $no = 0;
            foreach ($subService->detailServices as $detailService) {
               $no = $no + 1;
            }
         @endphp

         @if ($no != 0)
            @foreach ($subService->detailServices as $detailService)
               <div class="col-lg-3">
                  <a href="{{route('front/detailService', $detailService->slug)}}" style="color:white">
                  <div class="widget navy-bg p-lg text-center">
                     <div class="m-b-md">
                        {!! $detailService->icon !!}
                        <br><br>
                        <h3 class="font-bold no-margins">
                           {{$detailService->name}}
                        </h3>
                        {{-- <small><a href="{{route('front/detailService', $detailService->slug)}}" style="color:white">View</a> </small> --}}
                     </div>
                  </div>
               </a>
               </div>
            @endforeach
         @else
            <br>
            <div class="col-lg-12">
               <div class="animated fadeInRight">
                  <div class="mail-box">
                     <div class="mail-body">
                        <h3 class="text-center">{{$subService->name}}</h3>
                        {!! $subService->description !!}
                     </div>
                  </div>
               </div>
            </div>
         @endif
      </div>
      <br>
      <center><a href="{{route('front/service', $subService->service->slug)}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
