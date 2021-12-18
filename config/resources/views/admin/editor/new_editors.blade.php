@extends('admin.layouts.app')


@section('content')


<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h4 class="header-title mb-4" style="float: left;">View editors</h4>
                {{-- <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('create.editor') }}" class="btn btn-outline-primary">Add editor</a></h4> --}}
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
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($editors as $editor)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $editor->title }}</td>
                                <td>{{ $editor->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <a class="btn btn-outline-info" href="{{ route('edit.editor',$editor->id) }}">Edit</a>
                                    <a class="btn btn-outline-danger" id="delete" href="{{ route('delete.editor',$editor->id) }}">Delete</a>
                                    @if($editor->is_editor == 1)
                                        <a class="btn btn-outline-primary" href="{{ route('deactive.editor',$editor->id) }}">Active</a>
                                    @else
                                        <a class="btn btn-outline-warning" href="{{ route('active.editor',$editor->id) }}">Deactive</a>

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