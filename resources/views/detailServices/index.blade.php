@extends('layouts.admin')
@section('title')
   Detail Service - Yosef Almeida Boy
@endsection
@section('content')
   <div class="row wrapper border-bottom white-bg page-heading">
      <div class="col-lg-10">
         <h2>Detail Service</h2>
         <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><strong>Detail Service</strong></li>
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
                  <h2 class="page-header">Detail Service ({{ $detailServices->count() }})</h2>
                  <div class="mail-tools tooltip-demo m-t-md">
                     <div class="btn-group pull-right">
                        {{-- {{ $banks->links() }} --}}
                     </div>
                     <a class="btn btn-primary btn-sm" href='{{route('detailService/create')}}'><i class="fa fa-plus-circle"></i> Add</a>
                     <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Pdf</a>
                  </div><br>
                  <div class="table-responsive">
                      <table id="example1" class="table table-hover table-striped">
                          <thead>
                              <tr>
                                 <th style="text-align: center;">No.</th>
                                 <th style="text-align: center;">Name</th>
                                 <th style="text-align: center;">Sub Service</th>
                                 <th style="text-align: center;">Service</th>
                                 <th style="text-align: center;">Created at</th>
                                 <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              @php
                              $no = 0;
                              @endphp
                              @foreach ($detailServices as $detailService)
                              <tr class="read">
                                 <td class="text-center">{{ ++$no }}</td>
                                 <td class="text-left">{{ $detailService->name }}</td>
                                 <td class="text-left">{{ $detailService->subService->name }}</td>
                                 <td class="text-left">{{ $detailService->subService->service->name }}</td>
                                 <td class="text-center">{{ $detailService->created_at }}</td>
                                 <td class="text-center">
                                    <a href="{{route('detailService/edit', $detailService->id)}}" class="btn btn-primary btn-sm btn-outline"><i class="fa fa-edit"></i> </a>
                                    <a href="{{route('detailService/destroy', $detailService->id)}}" class="btn btn-danger btn-sm btn-outline confirm"><i class="fa fa-trash"></i> </a>
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
@endsection
