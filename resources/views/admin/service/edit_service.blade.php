@extends('admin.layouts.app')
@section('title','Delwarit | Edit service')
@section('content')
   <!-- Page Body Start-->
 
    <div class="page-body">

            <!-- Container-fluid starts-->
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="header-title mb-4" style="float: left;">Edit service</h4>
                        <h4 class="header-title mb-4" style="float: right;"><a href="{{ route('index.service') }}" class="btn btn-outline-primary">All service List</a></h4>
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

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <form action="{{ route('update.service',$service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row product-adding">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>General</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom01" class="col-form-label pt-0"><span>*</span>service Title</label>
                                        <input class="form-control  @error('title') is-invalid @enderror" id="validationCustom01" type="text" required="" name="title" value="{{ $service->title }}"> 
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  <!--  -->
                                
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            
                                        <label for="validationCustom02" class="col-form-label"><span>*</span> service Image</label>
                                        <input class="form-control @error('image') is-invalid @enderror" id="validationCustom02" type="file" name="image" onchange="photoChange(this)">
                                        <input type="hidden" name="old_image" value="{{ $service->image }}">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>

                                        <div class="col-md-6">
                                        <img src="{{ asset('storage/app/public/'.$service->image) }}"  class="img-thumbnail mt-2" width="100%" id="photo">
                                        </div>
                                    </div>


                          
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Meta Data</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    <div class="form-group">
                                        <label for="validationCustom05" class="col-form-label pt-0"> Meta Title</label>
                                        <input class="form-control" id="validationCustom05" type="text" name="meta_tag" value="{{ $service->meta_tag }}">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Meta Description</label>
                                        <textarea rows="4" cols="12" class="form-control" name="meta_description">{{ $service->meta_description }}</textarea>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h5><span class="text-danger">*</span>Add Description</h5>
                            </div>
                            <div class="card-body">
                                <div class="digital-add needs-validation">
                                    
                                    <div class="form-group">
                                       <textarea style="height:300px" class=" @error('description') is-invalid @enderror" id="editor" name="description">{{ $service->description }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-0">
                                        <div class="product-buttons text-center">
                                            <button class="btn btn-primary">Add Product</button>
                                            <button type="button" class="btn btn-light">Discard</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

            </form>
        </div>
        <!-- Container-fluid Ends-->

    </div>

<script>
function photoChange(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo')
            .attr('src', e.target.result)
            .attr("class","img-thumbnail mt-3")
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script>
function photoChange1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#photo1')
            .attr('src', e.target.result)
            .attr("class","img-thumbnail mt-3")
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
@section('footer_js')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
@endsection