@extends('admin.layouts.app')


@section('title','Create Career')


@section('content')
<!-- Start Page content -->
<div class="content">
          <!-- Container-fluid starts-->
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="header-title mb-4" style="float: left;">Add New Job</h4>
                        <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('index.career') }}" class="btn btn-outline-primary">All Job List</a></h4>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                @endif
                @if(session('wrong'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('wrong')}}.
                    </div>
                @endif
            </div>
        </div>
        <!-- Container-fluid Ends-->
    <!-- Start Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- end col -->
            <div class="col-md-12">
                <div class="card-box">

                    <br><br>
                    <form method="post" action="{{ route('store.career') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="title" class="col-3 col-form-label">Job Title *</label>
                                <input type="text" id="name" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-6">
                            <label for="slug" class="col-3 col-form-label">Slug *</label>
                                <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug"  value="{{ old('slug') }}">
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                            <label for="experience_year" class=" col-form-label">Experience Year</label>
                                <select type="text" id="experience_year" class="form-control @error('experience_year') is-invalid @enderror" name="experience_year" value="{{ old('experience_year') }}">
                                    <option>No Experience</option>
                                    <option>Up to 1 year</option>
                                    <option>Up to 2 years</option>
                                    <option>Up to 3 years</option>
                                    <option>Up to 5 years</option>
                                    <option>Up to 10 years</option>
                                </select>
                                @error('experience_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                            <label for="division_id" class=" col-form-label">Division</label>
                                <select id="division_id" class="form-control @error('division_id') is-invalid @enderror" name="division_id"  value="{{ old('division_id') }}">
                                    <option value="">Select Division First</option>
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach

                                </select>
                                @error('division_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-4">
                            <label for="district_id" class=" col-form-label">District</label>
                                <select id="district_id" class="form-control @error('district_id') is-invalid @enderror" name="district_id"  value="{{ old('district_id') }}">
                                    @foreach($districts as $district)
                                    @endforeach
                                </select>
                                @error('district_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                            <label for="phone" class=" col-form-label">Phone</label>
                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="job_time" class=" col-form-label">Job Time</label>
                                <input type="text" id="job_time" class="form-control @error('job_time') is-invalid @enderror" name="job_time" value="{{ old('job_time') }}">
                                @error('job_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="job_type" class="col-form-label">Job Type</label>
                                <input type="text" id="job_type" class="form-control @error('job_type') is-invalid @enderror" name="job_type" value="{{ old('job_type') }}">
                                @error('job_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-4">
                            <label for="shift" class=" col-form-label">Shift</label>
                                <input type="text" id="shift" class="form-control @error('shift') is-invalid @enderror" name="shift" value="{{ old('shift') }}">
                                @error('shift')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="salary" class=" col-form-label">Salary </label>
                                <input type="text" id="salary" class="form-control @error('salary') is-invalid @enderror" name="salary" value="{{ old('salary') }}">
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="deadline" class="col-form-label">Deadline</label>
                                <input type="date" id="deadline" class="form-control @error('deadline') is-invalid @enderror" name="deadline" value="{{ old('deadline') }}">
                                @error('deadline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <div class="col-12">
                            <label for="responsibility" class="col-form-label">Responsibility</label>
                                <textarea name="responsibility" id="editor" class="form-control @error('responsibility') is-invalid @enderror" cols="30" rows="10">{{ old('responsibility') }}</textarea>
                                @error('responsibility')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                            <label for="requirement" class="col-form-label">Requirement</label>
                                <textarea name="requirement" id="editor1" class="form-control @error('requirement') is-invalid @enderror" cols="30" rows="10">{{ old('requirement') }}</textarea>
                                @error('requirement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                            <label for="benefit" class="col-form-label">Benefit</label>
                                <textarea name="benefit" id="editor2" class="form-control @error('benefit') is-invalid @enderror" cols="30" rows="10">{{ old('benefit') }}</textarea>
                                @error('benefit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-4">
                            <label for="address" class=" col-form-label">Location</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" cols="30" rows="5">{{ old('address') }}</textarea>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="description" class=" col-form-label">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-4">
                            <label for="note" class=" col-form-label">Note</label>
                                <textarea name="note" class="form-control @error('note') is-invalid @enderror" cols="30" rows="5">{{ old('note') }}</textarea>
                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <label for="file" class=" col-form-label">File</label>
                                <input type="file" id="file" class="form-control @error('file') is-invalid @enderror" name="file"  value="{{ old('file') }}">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">

                            <div class="col-12">
                            <label for="meta_tag" class=" col-form-label">Meta Tag</label>
                                <input type="text" id="meta_tag" class="form-control @error('meta_tag') is-invalid @enderror" name="meta_tag" value="{{ old('meta_tag') }}">
                                @error('meta_tag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                            <label for="meta_description" class="col-3 col-form-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" cols="30" rows="10">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
@endsection

@section('footer_js')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="division_id"]').on('change',function(){
            var division_id = $(this).val();
            $.ajax({
                method:'GET',
                dataType:'json',
                url:'{{ url("/fetch-district/") }}/'+division_id,
                success:function(data){
                     var d = $('select[name = "district_id"]').empty();
                     $('select[name = "district_id"]').append('<option>Select District</option>');
                   $.each(data, function(key, value){
                    $('select[name = "district_id"]').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    
                },
            });
        })
    })
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor1'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#editor2'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    $('#name').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
    });
</script>
@endsection

@section('header_css')
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
{{-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script> --}}
@endsection
