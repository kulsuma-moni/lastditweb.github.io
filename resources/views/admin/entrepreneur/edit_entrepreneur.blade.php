@extends('admin.layouts.app')


@section('title','Create entrepreneur')


@section('content')
<!-- Start Page content -->
<div class="content">
          <!-- Container-fluid starts-->
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="header-title mb-4" style="float: left;">Add New entrepreneur</h4>
                        <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('index.entrepreneur') }}" class="btn btn-outline-primary">All entrepreneur List</a></h4>
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
                    <form method="post" action="{{ route('update.entrepreneur',$entrepreneur->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-3 col-form-label">Name *</label>
                            <div class="col-9">
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $entrepreneur->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">Slug *</label>
                            <div class="col-9">
                                <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror" name="slug"  value="{{ $entrepreneur->slug }}">
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-3 col-form-label">Email *</label>
                            <div class="col-9">
                                <input type="text" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $entrepreneur->email }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-3 col-form-label">Phone *</label>
                            <div class="col-9">
                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $entrepreneur->phone }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profession" class="col-3 col-form-label">Profession *</label>
                            <div class="col-9">
                                <input type="text" id="profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ $entrepreneur->profession }}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="division_id" class="col-3 col-form-label">Division</label>
                            <div class="col-9">
                                <select id="division_id" class="form-control @error('division_id') is-invalid @enderror" name="division_id">
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
                        </div>
                        <div class="form-group row">
                            <label for="district_id" class="col-3 col-form-label">District</label>
                            <div class="col-9">
                                <select id="district_id" class="form-control @error('district_id') is-invalid @enderror" name="district_id">
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
                            <label for="image" class="col-3 col-form-label">Profile Image</label>
                            <div class="col-9">
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"  value="{{ old('image') }}">
                                <input type="hidden" name="old_image" value="{{ $entrepreneur->image }}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="career_obj" class="col-3 col-form-label">Career Objectives</label>
                            <div class="col-9">
                                <textarea name="career_obj" class="form-control @error('career_obj') is-invalid @enderror" cols="30" rows="10">{{ $entrepreneur->career_obj }}</textarea>
                                @error('career_obj')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="expert_in" class="col-3 col-form-label">Expert In</label>
                            <div class="col-9">
                                <textarea name="expert_in" id="editor12" class="form-control @error('expert_in') is-invalid @enderror" cols="30" rows="10">{{ $entrepreneur->expert_in }}</textarea>
                                @error('expert_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image2" class="col-3 col-form-label">Experience Image</label>
                            <div class="col-9">
                                <input type="file" id="image2" class="form-control @error('image2') is-invalid @enderror" name="image2">
                                <input type="hidden" name="old_image2" value="{{ $entrepreneur->image2 }}">
                                @error('image2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Description </label>
                            <div class="col-9">
                                <textarea name="description" id="editor" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ $entrepreneur->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image3" class="col-3 col-form-label">Description Image</label>
                            <div class="col-9">
                                <input type="file" id="image3" class="form-control @error('image3') is-invalid @enderror" name="image3" value="{{ old('image3') }}">
                                <input type="hidden" name="old_image3" value="{{ $entrepreneur->old_image3 }}">
                                @error('image3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="experience_year" class="col-3 col-form-label">Experience Year</label>
                            <div class="col-9">
                                <select id="experience_year" class="form-control @error('experience_year') is-invalid @enderror" name="experience_year"  value="{{ old('experience_year') }}">
                                    <option value="1" @if($entrepreneur->experience_year == '1') selected="" @endif>1 year</option>
                                    <option value="2" @if($entrepreneur->experience_year == '2') selected="" @endif>2 years</option>
                                    <option value="3" @if($entrepreneur->experience_year == '3') selected="" @endif>3 years</option>
                                    <option value="4" @if($entrepreneur->experience_year == '4') selected="" @endif>4 years</option>
                                    <option value="5-10" @if($entrepreneur->experience_year == '5-10') selected="" @endif>5-10 years</option>
                                    <option value="10-15" @if($entrepreneur->experience_year == '10-15') selected="" @endif>10-15 years</option>
                                    <option value="15+">10-15 years</option>

                                </select>
                                @error('experience_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="link" class="col-3 col-form-label">Resume Link*</label>
                            <div class="col-9">
                                <input type="number" id="link" class="form-control @error('link') is-invalid @enderror" name="link"  value="{{ $entrepreneur->link }}">
                                @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr>

                        <div class="form-group row">
                            <label for="meta_tag" class="col-3 col-form-label">Meta Tag *</label>
                            <div class="col-9">
                                <textarea name="meta_tag" class="form-control @error('meta_tag') is-invalid @enderror" cols="30" rows="10">{{ $entrepreneur->meta_tag }}</textarea>
                                @error('meta_tag')
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
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor12'))
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


