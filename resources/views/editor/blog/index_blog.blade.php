@extends('admin.layouts.app')


@section('content')


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View blogs</h4>
                <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.blog') }}" class="btn btn-outline-primary">Add blog</a></h4>
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
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>@foreach($blog->blogcate as $blogcate){{ $blogcate->name }}, @endforeach</td>
                                <td><img src="{{asset('/storage/app/public/'.$blog->image)}}" height="50px" width="auto"alt=""></td>
                                <td>{!! Str::words($blog->description,'16','...') !!}</td>
                                <td>{{ $blog->created_at->format('d/m/Y') }}</td>

                                <td>
                                    <a class="btn btn-outline-info" href="{{ route('edit.blog',$blog->id) }}">Edit</a>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.blog',$blog->id) }}">Delete</a>
                                    @if($blog->status == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('deactive.blog',$blog->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('active.blog',$blog->id) }}">Deactive</a>

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