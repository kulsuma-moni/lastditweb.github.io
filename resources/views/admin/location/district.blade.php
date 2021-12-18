@extends('admin.layouts.app')
@section('title','district')
@section('content')
<!-- BREADCRUMB-->

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">District</h4>
                <h4 class="header-title mb-4" style="float: right;"><button  type="button" data-toggle="modal" data-target=".addDistrict" class="btn btn-outline-primary">Add District</button></h4>
            </div>
        </div>
    </div>
</div>


<!-- end row -->
<div class="row">
   <div class="col-12">
      <div class="card-box w-100">
         <!-- Large modal -->

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

         <!-- Small modal -->
         <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>Sl</th>
                  <th>district Name</th>
                  <th>division Name</th>
                  <th>Image</th>
                  <th>Created at</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @foreach($districts as $district)
               <tr>
                  <td>{{ $count++ }}</td>
                  <td>{{ $district->name }}</td>
                  <td>{{ $district->division->name }}</td>
                  <td>@if($district->image)<img src="{{ asset('storage/app/public/'.$district->image) }}" alt="" width="50px" height="50px">@endif</td>
                  <td>{{ $district->created_at }}</td>
                  <td>
                     <!-- Large modal -->
                     <button type="button" class="btn btn-xs waves-effect waves-light btn-success" data-toggle="modal" data-target=".bs-example-modal-lg{{$district->id}}"><i class="fa fa-pencil"></i></button>
                     <button href="{{ route('delete.district',$district->id) }}" class="btn btn-xs waves-effect waves-light btn-danger" id="delete"><i class="fa fa-trash-o"></i></button>
                     <!-- Small modal -->
                  </td>
                  <!--  Modal content for the above example -->
                  <div class="modal fade bs-example-modal-lg{{$district->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                     <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                              <h4 class="modal-title" id="myLargeModalLabel">Edit District</h4>
                           </div>
                           <div class="modal-body">
                              <form action="{{ route('update.district',$district->id) }}" method="POST" enctype="multipart/form-data">
                                 @csrf
                                 <div class="modal-body">
                                    <div class="card">
                                       <div class="card-header">
                                          <strong>All Element</strong> For Create district
                                          <em>(deprecated)</em>
                                       </div>
                                       <div class="card-body card-block">
                                          <div class="has-success form-group">
                                             <label for="inputSuccess2i" class=" form-control-label">District Name</label>
                                             <input type="text" id="inputSuccess2i" name="name" value="{{ $district->name }}" class="form-control-success form-control @error('name') is-invalid  @enderror" required>
                                             @error('name')
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                          </div>
                                          <div class="has-success form-group">
                                             <label for="inputSuccess2i" class=" form-control-label">Division</label>
                                             <select type="text" id="inputSuccess2i" name="division_id" class="form-control-success form-control @error('division_id') is-invalid  @enderror" required>
                                             @foreach($divisions as $division)
                                             <option value="{{ $division->id }}" @if ($division->id == $district->division_id) selected @endif>{{ $division->name }}</option>
                                             @endforeach
                                             </select>
                                             @error('division_id')
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                          </div>
                                          <div class="has-warning form-group">
                                             <label for="inputWarning2i" class=" form-control-label">District Image</label>
                                             <input type="file" id="file-input" name="image" class="form-control-file  @error('image') is-invalid @enderror " onchange="photoChangEdit(this)">
                                             <input type="hidden" name="old_image" value="{{ $district->image }}">
                                             @error('image')
                                             <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                             </span>
                                             @enderror
                                             <img class="img-thumbnail" src="{{ asset('storage/app/public/app/public/'.$district->image) }}" alt="{{ $district->name }}" id="photoEdit" style="height: 100%; width: 100%;">
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
<div class="modal fade mt-5 addDistrict"  id="createModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="mediumModalLabel">Add district</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('create.district') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <div class="card">
                  <div class="card-body card-block">
                     <div class="has-success form-group">
                        <label for="inputSuccess2i" class=" form-control-label">District Name *</label>
                        <input type="text" id="inputSuccess2i" name="name" class="form-control-success form-control">
                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="has-success form-group">
                        <label for="inputSuccess2i" class=" form-control-label">Division *</label>
                        <select type="text" id="inputSuccess2i" name="division_id" class="form-control-success form-control">
                           @foreach($divisions as $division)
                           <option value="{{ $division->id }}">{{ $division->name }}</option>
                           @endforeach
                        </select>
                        @error('division_id')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="has-warning form-group">
                        <label for="inputWarning2i" class=" form-control-label">Image (Optional)</label>
                        <input type="file" id="file-input" name="image" class="form-control-file" onchange="photoChange(this)">
                        @error('image')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <img class="ml-5" src="" alt="" id="photo">
                     </div>
                     <div class="has-warning form-group">
                        <button class="btn btn-primary" type="submit">Submit</button>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal medium -->

@endsection
