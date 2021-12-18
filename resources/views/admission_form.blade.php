@extends('layouts.app')

@section('title','Addmission Form')

@section('content')

    <!--Start About Inner Area-->
    <section class="about-wrapper-inner">
        <div class="about-wrap">
            <div class="container">
                <div class="ellipse1">
                    <img src="assets/images/Ellipse1.svg" alt="" class="img-fluid">
                </div>
                <div class="ellipse2">
                    <img src="assets/images/Ellipse2.svg" alt="" class="img-fluid">
                </div>
                <div class="row">
                    <div class="col-lg-12 mx-auto">
                        <div class="inner-content">
                            <h1>Admission</h1>
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li>/</li>
                                <li>Get Admission</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Inner Area-->

{{-- Start Admssion Form --}}
    <section class="admission-form-wrapper">
        <div class="admission-wrap">
            <div class="container">
                <div class="form-box">
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                	<form action="{{ route('store.student') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="box">
                        <div class="row">
                            <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <div class="row form">
                                            <div class="col-lg-12 form-head">
                                                <h3>PERSONAL &amp; CONTACT INFORMATION</h3>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="text" name="name" value="{{ old('name') }}" placeholder="Student Name*" class="form-control @error('name') is-invalid @enderror ">
                                            </div>
                                             <div class="col-lg-6 col-sm-6">
                                                <input type="text" name="fname" value="{{ old('fname') }}" placeholder="Father’s Name*" class="form-control @error('fname') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="text" name="mname" value="{{ old('mname') }}" placeholder="Mother’s Name*" class="form-control @error('mname') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-12 col-sm-12 mb-3">
                                                <select type="text" name="course_id" value="{{ old('course_id') }}" placeholder="Select Course*" class="form-control @error('course_id') is-invalid @enderror">
                                                    @foreach($courses as $course)
                                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-12 col-sm-12">
                                                <input type="text" name="present_address" value="{{ old('present_address') }}" placeholder="Present Address*" class="form-control @error('present_address') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-12">
                                                <input type="text" name="permanent_address" value="{{ old('permanent_address') }}" placeholder="Permanent Address*" class="form-control @error('permanent_address') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="text" name="occupation" value="{{ old('occupation') }}" placeholder="Occupation*" class="form-control @error('occupation') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="date" name="birth_date" value="{{ old('birth_date') }}"  class="form-control @error('birth_date') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <select class="form-control @error('nationality') is-invalid @enderror" name="nationality" value="{{ old('nationality') }}">
                                                    <option value="">Nationality*</option>
                                                    <option value="1">Bangladeshi</option>
                                                    <option value="2">Other Country</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row">
                                                    <div class="col-lg-5 col-sm-4">
                                                        <select class="form-control " name="blood_group" value="{{ old('blood_group') }}">
                                                            <option value="">Blood Group*</option>
                                                            <option value="A+">A+</option>
                                                            <option value="A-">A-</option>
                                                            <option value="B+">B+</option>
                                                            <option value="B-">B-</option>
                                                            <option value="AB+">AB+</option>
                                                            <option value="AB-">AB-</option>
                                                            <option value="O+">O+</option>
                                                            <option value="O-">O-</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-7 col-sm-8 ru-main text-right">
                                                        <span class="ru">Gender*</span>
                                                        <label class="customcheck">Male
                                                            <input type="radio" name="gender" value="1" class="@error('gender') is-invalid @enderror">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                        <label class="customcheck">Female
                                                            <input type="radio" name="gender" value="2" class="@error('gender') is-invalid @enderror">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input  type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone*" class="form-control phone @error('phone') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email*" class="form-control phone @error('email') is-invalid @enderror">
                                            </div>
                                            <div class="col-lg-6 col-sm-6">
                                                <input type="file" name="image" value="{{ old('image') }}" class="form-control phone @error('image') is-invalid @enderror">
                                            </div>
                                         </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" id="getintouch-part">
                            <div class="form-head">
                                <h3>Educational Background</h3>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <textarea name="education" class="form-control @error('education') is-invalid @enderror" id="message" rows="5">                                                </textarea>
                            </div>
                        </div>
                    <div class="reference">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row form">
                                    <div class="col-lg-12 form-head">
                                        <h3>Reference Details</h3>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <input type="text" name="ref_name" value="{{ old('ref_name') }}" placeholder="Name*" class="form-control ">
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" name="ref_phone" value="{{ old('ref_phone') }}" placeholder="Mobile Number*" class="form-control ">
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" name="ref_batch_name" value="{{ old('ref_batch_name') }}" placeholder="Batch*" class="form-control ">
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <input type="text" name="ref_relation" value="{{ old('ref_relation') }}" placeholder="Reference" class="form-control ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="admission-button">
                                <button type="submit" class="btn default">Submit</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<!--End Admission Form-->

@endsection