@extends('admin.layouts.app')


@section('title','List Batch')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View Batches</h4>
                <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.batch') }}">Add Batch</a></h4>
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
                

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">Course name</th>
                                <th scope="col">Batch Number</th>
                                <th scope="col">Starting date</th>
                                <th scope="col">Ending date</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($batches as $batch)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $batch->course->name }}</td>
                                <td>{!! $batch->batch_number !!}</td>
                                <td>{{ $batch->starting_at }}</td>
                                <td>{{ $batch->ending_at }}</td>
                                <td>{{ $batch->duration }}</td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{ route('edit.batch',$batch->id) }}">Edit</a>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.batch',$batch->id) }}">Delete</a>
                                    @if($batch->status == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('deactive.batch',$batch->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('active.batch',$batch->id) }}">Deactive</a>

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