@extends('layouts.admin')
@section('title')
   Service Edit - Yosef Almeida Boy
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Sub Service</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="{{route('subService/index')}}">Sub Service</a></li>
            <li class="active"><strong>Edit</strong></li>
            <li class="active"><strong>{{$subService->name}}</strong></li>
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
                        <form action="{{route('subService/update')}}" method="post" enctype="multipart/form-data">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Name:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('name'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('name') }}</strong>
                                          </span>
                                       @endif
                                       <input type="text" name="name" class="form-control" value="{{$subService->name}}">
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
                                       <textarea name="description" rows="5" class="form-control summernote">{{$subService->description}}</textarea>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Service:</label>
                                    <div class="col-sm-10">
                                       @if ($errors->has('service_id'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('service_id') }}</strong>
                                          </span>
                                       @endif
                                       <select class="form-control" name="service_id">
                                          <option value="">-- Please select service --</option>
                                          @foreach ($services as $service)
                                             <option value="{{$service->id}}" @if ($service->id == $subService->service_id) selected @endif>
                                                {{$service->name}}
                                             </option>
                                          @endforeach
                                       </select>
                                    </div>
                                 </div>
                              </fieldset>
                              <input type="hidden" name="id" value="{{$subService->id}}">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" title="Send">
                                 <i class="fa fa-save"></i> Update
                              </button>
                           </div>
                        </form>
                        {{-- <form action="{{route('service/updateImage')}}" method="post" enctype="multipart/form-data">
                           <div class="panel-body">
                              <fieldset class="form-horizontal">
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Image:</label>
                                    <div class="col-sm-8">
                                       @if ($errors->has('image'))
                                          <span class="help-block">
                                             <strong style="color: red">{{ $errors->first('image') }}</strong>
                                          </span>
                                       @endif
                                       <input type="file" name="image" class="form-control">
                                    </div>
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$subService->id}}">
                                    <div class="col-sm-2">
                                       <button type="submit" class="btn btn-primary pull-right btn-sm" data-toggle="tooltip" data-placement="top" title="Send">
                                          <i class="fa fa-save"></i> Upload
                                       </button>
                                    </div>
                                 </div>
                              </fieldset>
                           </div>
                        </form> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <br>
@endsection
