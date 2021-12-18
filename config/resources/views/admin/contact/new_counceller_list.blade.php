@extends('admin.layouts.app')

@section('title','Delwarit | New Counceller List')

@section('content')


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View councellers</h4>
                {{-- <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.counceller') }}">Add counceller</a></h4> --}}
            </div>
        </div>
    </div>
</div>


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">
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

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($councellers as $counceller)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $counceller->name }}</td>
                                <td>{{ $counceller->phone }}</td>
                                <td>{{ $counceller->email }}</td>
                                <td>{{ $counceller->message }}</td>
                                <td>{{ $counceller->created_at->format('d/m/Y') }}</td>

                                <td>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.contact',$counceller->id) }}">Delete</a>
                                    @if($counceller->status == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('active.contact',$counceller->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('deactive.contact',$counceller->id) }}">Deactive</a>

                                    @endif
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