@extends('admin.layouts.app')

@section('title','Delwarit')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View students</h4>
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
                    {{-- <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.student') }}">Add Career</a></h4> --}}

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">SL No:</th>
                                <th scope="col">Name</th>
                                <th scope="col">Course</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->course->name }}</td>
                                <td>{!! $student->phone !!}</td>
                                <td>{{ $student->email }}</td>
                                <td><img src="{{asset('/storage/app/public/'.$student->image)}}" height="50px" width="auto"alt=""></td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{ route('info.student',$student->id) }}">Info</a>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.student',$student->id) }}">Delete</a>
                                  {{--   @if($student->status == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('deactive.student',$student->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('active.student',$student->id) }}">Deactive</a>

                                    @endif --}}
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