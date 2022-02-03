@extends('admin.layouts.app')

@section('title','Dashboard | Applied List')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">New Applied</h4>
                <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.career') }}" class="btn btn-outline-primary">Add career</a></h4>
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
                                <th scope="col">Email</th>
                                <th scope="col">Post name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($careerapplied as $career)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $career->name }}</td>
                                <td>{{ $career->email }}</td>
                                <td>{{ $career->career->title }}</td>
                                <td>{{ $career->created_at->format('d/m/Y') }}</td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{ route('view.career.applicant',$career->id) }}">View</a>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.career.applicant',$career->id) }}">Delete</a>
                                    @if($career->status == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('deactive.career.applicant',$career->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('active.career.applicant',$career->id) }}">Deactive</a>
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