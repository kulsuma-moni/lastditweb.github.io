@extends('admin.layouts.app')


@section('content')


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View Courses</h4>
                <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.course') }}">Add Career</a></h4>
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
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Career</th>
                                <th scope="col">Image</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Class</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->name }}</td>
                                <td>{{ Str::words($course->description,'20','..') }}</td>
                                <td>{{ Str::words(strip_tags($course->career),'20','..') }}</td>
                                <td><img src="{{asset('/storage/app/public/'.$course->image)}}" height="50px" width="auto"alt=""></td>
                                <td>{{ $course->course_fee }}</td>
                                <td>{{ $course->total_class }}</td>

                                <td>
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('edit.course',$course->id) }}">Edit</a>
                                    <a class="btn btn-sm btn-outline-danger" id="delete" href="{{ route('delete.course',$course->id) }}">Delete</a>
                                    @if($course->status == 1)
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('deactive.course',$course->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-sm btn-outline-warning" href="{{ route('active.course',$course->id) }}">Deactive</a>

                                    @endif
                                    <a class="btn btn-sm btn-outline-secondary" target="_blank" id="" href="{{ route('single.course',$course->slug) }}">view</a>

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