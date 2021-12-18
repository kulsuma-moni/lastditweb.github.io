@extends('admin.layouts.app')

@section('title','Delwarit | Freelancers List')

@section('content')


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">Deactive Freelancers </h4>
                <h4 class="header-title mb-4 btn btn-outline-primary" style="float: right;"><a href="{{ route('create.freelancer') }}">Add Freelancer</a></h4>
            </div>
        </div>
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
                    @if(session('success'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($freelancers as $freelancer)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $freelancer->name }}</td>
                                <td><img src="{{asset('/storage/app/public/'.$freelancer->image)}}" height="50px" width="auto"alt=""></td>
                                <td>{{ $freelancer->email }}</td>
                                <td>{{ $freelancer->phone }}</td>
                                <td>{{ $freelancer->profession }}</td>

                                <td>
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('edit.freelancer',$freelancer->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-outline-danger" id="delete" href="{{ route('delete.freelancer',$freelancer->id) }}">Delete</a>
                                    @if($freelancer->status == 1)
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('deactive.freelancer',$freelancer->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-sm btn-outline-warning" href="{{ route('active.freelancer',$freelancer->id) }}">Deactive</a>

                                    @endif
                                    <a class="btn btn-sm btn-outline-secondary" target="_blank" id="" href="{{ route('single.freelancer',$freelancer->slug) }}">view</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>

@endsection