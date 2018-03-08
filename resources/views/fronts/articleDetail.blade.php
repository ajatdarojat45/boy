@extends('layouts.front')
@section('title')
Article Detail - Yosef Almeida Boy
@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <center>
         <strong><a href="{{route('front/index')}}">Home</a></strong> /
         <strong><a href="{{route('front/article')}}">Article</a></strong> /
         <strong>{{$article->title}}</strong>
      </center><br>
      <div class="row">
         <div class="col-lg-12">
            <div class="contact-box">
               <h1 class="text-center">{{$article->title}}</h1>
               <p class="text-right">{{$article->created_at}}</p>
               {!! $article->description !!}
               <div class="text-right">
                  <i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}
               </div>
            </div>
         </div>
      <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
</div>
@endsection
