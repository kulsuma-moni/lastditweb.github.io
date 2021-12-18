@extends('admin.layouts.app')

@section('title','Delwarit')

@section('content')



<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-sm-12">
                <!-- meta -->

                    @if(session('success'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('success')}}.
                    </div>
                    @endif
                    @if(session('notsuccess'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success!</strong> {{session('notsuccess')}}.
                    </div>
                    @endif


                    @error('email')
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Email already exist.please change the email and try again!!</strong>.
                    </div>
                    @endif
                <div class="profile-user-box card bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <span class="float-left mr-2">@if($profile->userdetail) <img src="{{ asset('storage/app/public/'.$profile->userdetail->image) }}" alt="" class="avatar-xl rounded-circle" height="128" width="128">@else No Image @endif</span>
                                <div class="media-body text-white">
                                    <h4 class="mt-1 mb-1 text-white font-18">{{ $profile->name }}</h4>
                                    <p class="font-13"> {{ $profile->email }}</p>

                                </div>
                            </div>
                            <div class="col-sm-8">
                            	<div class="text-right">
	                        		<div class="col-md-12">
	                                    <a href="{{ route('create.userdetail') }}" class="btn btn-light waves-effect">
	                                        <i class="mdi mdi-account-settings mr-1"></i>Update Profile
	                                    </a>
		                            </div>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ meta -->
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-12">
                <!-- Personal-Information -->
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Personal Information</h4>
                        <div class="panel-body">
                            <p class="text-muted font-13">
                                {{ $profile->userdetail->description ?? '' }}
                            </p>

                            <hr/>

                            <div class="text-left text-muted font-13">

                                <p class="mb-2"><strong>Profession :</strong><span> {{ $profile->userdetail->profession ?? '' }}</span></p>

                                <p class="mb-2"><strong>Nationality :</strong><span> {{ $profile->userdetail->nationality  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Blood Group :</strong><span> {{ $profile->userdetail->blood_group  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Birth Date :</strong> <span> {{ $profile->userdetail->birth_date  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Gender :</strong> <span> {{ $profile->userdetail->gender  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Phone :</strong> <span> {{ $profile->userdetail->phone  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Address :</strong> <span> {{ $profile->userdetail->address  ?? '' }}</span></p>

                                <p class="mb-2"><strong>Facebook :</strong><span> {{ $profile->userdetail->fb_link  ?? '' }}</span></p>

                                {{-- <p class="mb-2"><strong>Gender :</strong><span>@if($profile->gender == 1) Male @elseif($profile->gender== 2) Female @else Other @endif </span></p> --}}

{{--                                 <p class="mb-2"><strong>Languages :</strong>
                                    
                                    <span>English</span>
                                    
                                    <span>German</span>
                                    
                                    <span>Spanish</span>
                                    
                                    <span>French</span>
                                </p>
                            </div>

                            <ul class="social-links list-inline mt-4 mb-0">
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Skype"><i class="fab fa-skype"></i></a>
                                </li>
                            </ul>
 --}}
                        </div>
                    </div>
                </div>
                <!-- Personal-Information -->

            </div>

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection