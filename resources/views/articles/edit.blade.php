@extends('layouts.admin')
@section('title')
   Article Edit - Yosef Almeida Boy
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Article</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('article/index')}}">Article</a></li>
            <li class="active"><strong>Edit</strong></li>
            <li class="active"><strong>{{$article->title}}</strong></li>
         </ol>
      </div>
      <div class="col-lg-2">
      </div>
   </div>
   <div class="wrapper wrapper-content animated fadeInRight ecommerce">
      @if (session('success'))
      <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong>Success!</strong> {{session('success') }}
      </div>
      @endif
      <div class="row">
         <div class="col-lg-12">
            <div class="tabs-container">
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#tab-1"> Create</a></li>
               </ul>
                  <div class="tab-content">
                     <div id="tab-1" class="tab-pane active">
                        <form action="{{route('article/update')}}" method="post" enctype="multipart/form-data">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Title:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('title'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('title') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="title" class="form-control" value="{{$article->title}}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Description:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('description'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('description') }}</strong>
                                          </span>
                                       @endif
                                       <textarea name="description" rows="5" class="form-control summernote">{{$article->description}}</textarea>
                                    </div>
                                 </div>
                                 <input type="hidden" name="id" value="{{$article->id}}">
                              </fieldset>
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" title="Send">
                                 <i class="fa fa-save"></i> Update
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
@endsection
