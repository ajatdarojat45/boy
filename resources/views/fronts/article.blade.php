@extends('layouts.front')
@section('title')
Article - Yosef Almeida Boy
@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <center>
         <strong><a href="{{route('front/index')}}">Home</a></strong> / <strong>Article</strong>
      </center><br>
      <div class="row">
         @foreach ($articles as $article)
            <a href="{{route('front/articleDetail', $article->slug)}}" style="color:#595959">
               <div class="col-lg-4">
                  <div class="contact-box">
                     <h3>{{$article->title}}</h3>

                     {!! substr($article->description, 3, 100) !!}...
                     <div class="text-right">
                        <i class="fa fa-clock-o"></i> {{$article->created_at->diffForHumans()}}
                     </div>
                  </div>
               </div>
            </a>
         @endforeach
      </div>
      <div class="text-right">
         {{$articles->links()}}
      </div>
      <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
