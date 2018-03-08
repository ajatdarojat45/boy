@extends('layouts.front')
@section('title')
Contact - Yosef Almeida Boy
@endsection
@section('content')
   <div class="container container animated fadeInRight">
      <br>
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <center>
               <i class="fa fa-phone fa-4x"></i>
               <h1><strong>Contact</strong></h1><br>
               <address>
                  <h3>
                   <strong><i class="fa fa-map-marker"></i> Address</strong><br>
                   {!! $contact->description !!}<br>
                   <i class="fa fa-phone"></i> Telp <br> {{$contact->name}} <br> <br>
                   <i class="fa fa-mobile-phone"></i> Handphone <br> {{$contact->slug}} <br><br>
                   <i class="fa fa-at"></i> Email <br> <a href="mailto:{{$contact->icon}}?subject=feedback">{{$contact->icon}}</a>

                   </h3>
               </address>
            </center>
         </div>
      </div>
      <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
   </div>
@endsection
