@extends('layouts.front')
@section('title')
Profile - Yosef Almedia Boy
@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <center>
               <img alt="image" class="img-circle m-t-xs img-responsive" src="{{asset('storage/services/'.$profile->image)}}">
               <h1><strong><u>{{$profile->name}}</u> </strong> </h1>
               <div class="font-bold">
                  <h3>{{$profile->slug}}</h3>
               </div>
                <address>
                    <strong><i class="fa fa-phone"></i> Phone</strong><br>
                    {{$profile->description}}
                </address>
                <address>
                    <strong><i class="fa fa-at"></i> Email</strong><br>
                    {{$profile->icon}}
                </address>
            </center>
         </div>
      </div>
      <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
