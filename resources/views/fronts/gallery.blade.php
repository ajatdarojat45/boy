@extends('layouts.front') @section('title') Gallery - Yosef Almeida Boy @endsection @section('content')
<div class="container container animated fadeInRight">
   <br>
   <center>
      <strong><a href="{{route('front/index')}}">Home</a></strong> / <strong>Gallery</strong>
   </center><br>
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox float-e-margins">
            <div class="ibox-content">
               <div class="lightBoxGallery">
                  @foreach ($galleries as $gallery)
                     <a href="{{asset('storage/galleries/'.$gallery->image)}}" title="{{$gallery->note}}" data-gallery=""><img src="{{asset('storage/galleries/'.$gallery->image)}}" width="250px" height="150"></a>
                  @endforeach
                  <div class="text-right">
                     {{$galleries->links()}}
                  </div>
                  <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                  <div id="blueimp-gallery" class="blueimp-gallery">
                     <div class="slides"></div>
                     <h3 class="title"></h3>
                     <a class="prev">‹</a>
                     <a class="next">›</a>
                     <a class="close">×</a>
                     <a class="play-pause"></a>
                     <ol class="indicator"></ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <center><a href="{{route('front/index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a></center>
</div>
@endsection
