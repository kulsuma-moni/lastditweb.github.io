@extends('admin.layouts.app')
@section('title','Division')
@section('content')
<!-- BREADCRUMB-->

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">Division</h4>
                <h4 class="header-title mb-4" style="float: right;"><button type="button" data-toggle="modal" data-target=".addDivision"class="btn btn-outline-primary">Add Division</button></h4>
            </div>
        </div>
    </div>
</div>


<!-- end row -->
<div class="row">
   <div class="col-12">
      <div class="card-box w-100">
           @if(session('success'))
           <div class="alert alert-success">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> {{session('success')}}.
           </div>
           @endif 
           @if(session('deletesuccess'))
           <div class="alert alert-danger">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Success!</strong> {{session('deletesuccess')}}.
           </div>
           @endif
         <!-- Large modal -->
         {{-- <button type="button" class="btn waves-effect waves-light float-right btn-primary" data-toggle="modal" data-target=".addDivision">Add Division</button> --}}
         <!-- Small modal -->
         <table  id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($divisions as $division)
               <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $division->name }}</td>
                  <td>@if($division->image)<img src="{{ asset('storage/app/public/'.$division->image) }}" alt="" width="50px" height="50px">@endif</td>
                  <td>{{ 27 }}</td>
                  <td>2011/01/25</td>
                  <td>
                     <!-- Large modal -->
                     <button type="button" class="btn btn-xs waves-effect waves-light btn-success" data-toggle="modal" data-target=".bs-example-modal-lg{{$division->id}}"><i class="fa fa-pencil"></i></button>
                     <button href="{{ route('delete.division',$division->id) }}" class="btn btn-xs waves-effect waves-light btn-danger" id="delete"><i class="fa fa-trash-o"></i></button>
                     <!-- Small modal -->
                  </td>
                  <!--  Modal content for the above example -->
                  <div class="modal fade bs-example-modal-lg{{$division->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                           </div>
                           <div class="modal-body">
                              <form action="{{ route('update.division',$division->id) }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="modal-body">
                                    <div class="card">
                                       <div class="card-header">
                                          <strong>All Element</strong> For Create Division
                                          <em>(deprecated)</em>
                                       </div>
                                       <div class="card-body card-block">
                                          <div class="has-success form-group">
                                             <label for="inputSuccess2i" class=" form-control-label">Division Name</label>
                                             <input type="text" id="inputSuccess2i" name="name" value="{{ $division->name }}" class="form-control-success form-control @error('name') is-invalid  @enderror">
                                             @error('name')
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                          </div>
                                          <div class="has-warning form-group">
                                             <label for="inputWarning2i" class=" form-control-label">Division Image</label>
                                             <input type="file" id="file-input" name="image" class="form-control-file  @error('image') is-invalid @enderror " onchange="photoChangEdit(this)">
                                             <input type="hidden" name="old_image" value="{{ $division->image }}">
                                             @error('image')
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                             <img class="img-thumbnail" src="{{ asset('/storage/app/public/'.$division->image) }}" alt="{{ $division->name }}" id="photoEdit" style="height: 100%; width: 100%;">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                        <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- end row -->


<!-- modal medium -->
<div class="modal fade mt-5 addDivision"  id="createModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="mediumModalLabel">Add Division</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('create.division') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <div class="card">
                  <div class="card-header">
                     <strong>All Element</strong> For Create Division
                     <em>(deprecated)</em>
                  </div>
                  <div class="card-body card-block">
                     <div class="has-success form-group">
                        <label for="inputSuccess2i" class=" form-control-label">Division Name</label>
                        <input type="text" id="inputSuccess2i" name="name" class="form-control-success form-control">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="has-warning form-group">
                        <label for="inputWarning2i" class=" form-control-label">Division Image</label>
                        <input type="file" id="file-input" name="image" class="form-control-file" onchange="photoChange(this)">
                        @error('image')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <img class="ml-5" src="" alt="" id="photo">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
               <button type="submit" class="btn btn-primary">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- end modal medium -->

@endsection
