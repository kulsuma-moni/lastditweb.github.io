@extends('admin.layouts.app')

@section('title','Delwarit')

@section('content')

<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">Payment Status - ({{ $student->name }})</h4>
                <h4 class="header-title mb-4" style="float: right;"><a class="btn btn-outline-dark" href="{{ route('info.student',$student->id) }}">Profile</a></h4>
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
                    <thead>
                        <tr>
                            <th>SL No:</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Pay</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($student->payment as $payment)
                        <tr>
                            <td>{{ $count++ }}</td> 
                            <td>{{ $payment->student->name }}</td>
                            <td>{{ $payment->student->email }}</td>
                            <td>{{ $payment->pay }}</td>
                            <td>{{ $payment->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>Total = </th>
                            <th>{{ $student->payment->sum('pay') }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>

                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>

@endsection