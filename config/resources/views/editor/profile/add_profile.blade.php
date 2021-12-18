@extends('admin.layouts.app')

@section('title','Create Profile')

@section('content')
<!-- Start Page content -->
<div class="content">
    <!-- Start Content -->
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
                    <h4 class="header-title mb-4" style="float: left;">Add Profile</h4>
                    <h4 class="header-title mb-4" style="float: right;"><a href="{{route('user.profile')}}">View Profile</a></h4><br>

                    <br><br>
                    @if(!$user->userdetail)
                    <form method="post" action="{{ route('store.userdetail') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="profession" class="col-3 col-form-label">profession *</label>
                            <div class="col-9">
                                <input type="text" id="profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">nationality *</label>
                            <div class="col-9">
                                <input type="text" id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality"  value="{{ old('nationality') }}">
                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">blood_group *</label>
                            <div class="col-9">
                                <input type="text" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group"  value="{{ old('blood_group') }}">
                                @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">birth_date *</label>
                            <div class="col-9">
                                <input type="text" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"  value="{{ old('birth_date') }}">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">gender *</label>
                            <div class="col-9">
                                <select type="text" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender"  value="{{ old('gender') }}">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">phone *</label>
                            <div class="col-9">
                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ old('phone') }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">address *</label>
                            <div class="col-9">
                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address"  value="{{ old('address') }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Front Image/Icon</label>
                            <div class="col-9">
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"  value="{{ old('image') }}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Description *</label>
                            <div class="col-9">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fb_link" class="col-3 col-form-label">fb_link</label>
                            <div class="col-9">
                                <input type="text" id="fb_link" class="form-control @error('fb_link') is-invalid @enderror" name="fb_link"  value="{{ old('fb_link') }}">
                                @error('fb_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter_link" class="col-3 col-form-label">twitter_link</label>
                            <div class="col-9">
                                <input type="text" id="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link"  value="{{ old('twitter_link') }}">
                                @error('twitter_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram_link" class="col-3 col-form-label">instagram_link</label>
                            <div class="col-9">
                                <input type="text" id="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link"  value="{{ old('instagram_link') }}">
                                @error('instagram_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="github_link" class="col-3 col-form-label">github_link</label>
                            <div class="col-9">
                                <input type="text" id="github_link" class="form-control @error('github_link') is-invalid @enderror" name="github_link"  value="{{ old('github_link') }}">
                                @error('github_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="linkedin_link" class="col-3 col-form-label">linkedin_link</label>
                            <div class="col-9">
                                <input type="text" id="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" name="linkedin_link"  value="{{ old('linkedin_link') }}">
                                @error('linkedin_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form method="post" action="{{ route('update.userdetail',$user->userdetail->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="profession" class="col-3 col-form-label">profession *</label>
                            <div class="col-9">
                                <input type="text" id="profession" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ $user->userdetail->profession }}">
                                @error('profession')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">nationality</label>
                            <div class="col-9">
                                <input type="text" id="nationality" class="form-control @error('nationality') is-invalid @enderror" name="nationality"  value="{{ $user->userdetail->nationality }}">
                                @error('nationality')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">blood_group</label>
                            <div class="col-9">
                                <input type="text" id="blood_group" class="form-control @error('blood_group') is-invalid @enderror" name="blood_group"  value="{{ $user->userdetail->blood_group }}">
                                @error('blood_group')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">birth_date *</label>
                            <div class="col-9">
                                <input type="text" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"  value="{{ $user->userdetail->birth_date }}">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">gender *</label>
                            <div class="col-9">

                                <select type="text" id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender"  value="{{ $user->userdetail->gender }}">
                                    <option value="Male" @if($user->userdetail->gender == 'Male') selected="" @endif>Male</option>
                                    <option value="Female" @if($user->userdetail->gender == 'Female') selected="" @endif>Female</option>
                                    <option value="Other" @if($user->userdetail->gender == 'Other') selected="" @endif>Other</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">phone *</label>
                            <div class="col-9">
                                <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ $user->userdetail->phone }}">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-3 col-form-label">address *</label>
                            <div class="col-9">
                                <input type="text" id="address" class="form-control @error('address') is-invalid @enderror" name="address"  value="{{ $user->userdetail->address }}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-3 col-form-label">Front Image/Icon</label>
                            <div class="col-9">
                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror" name="image"  value="{{ old('image') }}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-3 col-form-label">Description *</label>
                            <div class="col-9">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ $user->userdetail->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fb_link" class="col-3 col-form-label">fb_link</label>
                            <div class="col-9">
                                <input type="text" id="fb_link" class="form-control @error('fb_link') is-invalid @enderror" name="fb_link"  value="{{ $user->userdetail->fb_link }}">
                                @error('fb_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="twitter_link" class="col-3 col-form-label">twitter_link</label>
                            <div class="col-9">
                                <input type="text" id="twitter_link" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link"  value="{{ $user->userdetail->twitter_link }}">
                                @error('twitter_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram_link" class="col-3 col-form-label">instagram_link</label>
                            <div class="col-9">
                                <input type="text" id="instagram_link" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link"  value="{{ $user->userdetail->instagram_link }}">
                                @error('instagram_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="github_link" class="col-3 col-form-label">github_link</label>
                            <div class="col-9">
                                <input type="text" id="github_link" class="form-control @error('github_link') is-invalid @enderror" name="github_link"  value="{{ $user->userdetail->github_link }}">
                                @error('github_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group row">
                            <label for="linkedin_link" class="col-3 col-form-label">linkedin_link</label>
                            <div class="col-9">
                                <input type="text" id="linkedin_link" class="form-control @error('linkedin_link') is-invalid @enderror" name="linkedin_link"  value="{{ $user->userdetail->linkedin_link }}">
                                @error('linkedin_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>

                        <div class="form-group mb-0 justify-content-end row text-center">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Save</button>
                            </div>
                        </div>
                    </form>

                    @endif
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- end container-fluid -->
</div>
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

