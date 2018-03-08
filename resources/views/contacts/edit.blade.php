@extends('layouts.admin')
@section('title')
   Service Edit - Yosef Almeida Boy
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Profile</h2>
         <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="active"><strong>Contact</strong></li>
            <li class="active"><strong>Edit</strong></li>
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
                  <li class="active"><a data-toggle="tab" href="#tab-1"> Edit</a></li>
               </ul>
                  <div class="tab-content">
                     <div id="tab-1" class="tab-pane active">
                        <form action="{{route('profile/update')}}" method="post" enctype="multipart/form-data">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Address:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('description') }}</strong>
                                          </span>
                                       @endif
                                       <textarea name="description" rows="5" class="form-control summernote">{{$contact->description}}</textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Telp:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('name') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="name" class="form-control" value="{{$contact->name}}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Hp:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('slug') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="slug" class="form-control" value="{{$contact->slug}}">
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('icon') }}</strong>
                                          </span>
                                       @endif
                                       <input type="email" name="icon" class="form-control" value="{{$contact->icon}}">
                                    </div>
                                 </div>
                              </fieldset>
                              <input type="hidden" name="id" value="{{$contact->id}}">
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
