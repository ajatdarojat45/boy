@extends('layouts.admin')
@section('title')
   Gallery - Yosef Almeida Boy
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Gallery</h2>
         <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="active"><strong>Gallery</strong></li>
         </ol>
      </div>
      <div class="col-lg-2">
      </div>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight">
      @if (session('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('success') }}
      </div>
      @endif
      @if (session('warning'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('warning') }}
      </div>
      @endif
      <div class="row">
          <div class="col-lg-12 animated fadeInRight">
              <div class="ibox-content">
                  <h2 class="page-header">Gallery ({{ $galleries->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                     <div class="btn-group pull-right">
                        {{-- {{ $banks->links() }} --}}
                     </div>
                     <a class="btn btn-primary btn-sm" data-toggle="modal" href="#myModal"><i class="fa fa-plus-circle"></i> Add</a>
                     <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                 <th style="text-align: center;">No.</th>
                                 <th style="text-align: center;">Image</th>
                                 <th style="text-align: center;">Note</th>
                                 <th style="text-align: center;">Created at</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($galleries as $gallery)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-center">
                                    <img src="{{asset('storage/galleries/'.$gallery->image)}}" alt="" width="100px" height="75px">
                                 </td>
                                 <td class="text-left">{{$gallery->note}}</td>
                                 <td class="text-center">{{ $gallery->created_at }}</td>
                                 <td class="text-center">
                                    <a href="{{route('gallery/destroy', $gallery->id)}}" class="btn btn-danger btn-sm btn-outline confirm"><i class="fa fa-trash"></i> </a>
                                 </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
   </div>
   <br>
   <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content animated flipInY">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               <h4 class="modal-title">Upload Image</h4>
               <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
            </div>
         <form action="{{route('gallery/store')}}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="panel-body">
                     <fieldset class="form-horizontal">
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Image:</label>
                           <div class="col-sm-10">
                              @if ($errors->has('image'))
                                 <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('image') }}</strong>
                                 </span>
                              @endif
                              <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Note:</label>
                           <div class="col-sm-10">
                              @if ($errors->has('note'))
                                 <span class="help-block">
                                    <strong style="color: red">{{ $errors->first('note') }}</strong>
                                 </span>
                              @endif
                              <textarea name="note" rows="3" class="form-control"></textarea>
                           </div>
                        </div>
                     </fieldset>
                     {{ csrf_field() }}
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-white btn-sm" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary btn-sm">Save</button>
            </div>
         </form>
         </div>
      </div>
   </div>

@endsection
