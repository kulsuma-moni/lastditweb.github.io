@extends('admin.layouts.app')

@section('title','Dashboard DelwarIT || Job Applicant Information')

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

                    
                <div class="profile-user-box card bg-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <span class="float-left mr-2">
                                    @if($applicant->image)
                                    <img src="{{ asset('storage/app/public/'.$applicant->image) }}" alt="" class="avatar-xl rounded-circle" height="128" width="128">
                                    @elseif($applicant->user->userdetail->image)
                                    <img src="{{ asset('storage/app/public/'.$applicant->user->userdetail->image) }}" alt="" class="avatar-xl rounded-circle" height="128" width="128">
                                    @else
                                    @endif
                                </span>
                                <div class="media-body text-white">
                                    <h4 class="mt-1 mb-1 text-white font-18">{{ $applicant->name }}</h4>
                                    <p class="font-13">{{ $applicant->email }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            	@if($applicant->status == 1)
                            	<div class="text-right">
	                        		<div class="col-md-12">
	                                    <button type="button" class="btn btn-light waves-effect">
	                                        <i class="mdi mdi-account-settings mr-1"></i>applicant Already Confirmed!!
	                                    </button>
		                            </div>
                            	</div>
                            	@else

	                            @endif

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
                        <a href="{{ route('payment.info',$applicant->id) }}" class="btn btn-outline-info mb-2">Payment Information</a>
                        <h4 class=" mb-3">Post : {{ $applicant->career->title }}</h4>
                        <div class="panel-body">
                            <p class="text-muted font-13">
                                {{ $applicant->education }}
                            </p>

                            <hr/>

                            <div class="text-left text-muted font-13">

                                <p class="mb-2"><strong>Mobile :</strong><span> {{ $applicant->phone }}</span></p>
                                <iframe src="{{ asset('storage/app/public/'.$applicant->file) }}" frameborder="1"  height="1000" width="100%"></iframe>

{{-- 
                                <p class="mb-2"><strong>Languages :</strong>
                                    
                                    <span>English</span>
                                    
                                    <span>German</span>
                                    
                                    <span>Spanish</span>
                                    
                                    <span>French</span>
                                </p> --}}
                            </div>

                        {{--     <ul class="social-links list-inline mt-4 mb-0">
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="social-list-item" data-placement="top" data-toggle="tooltip" href="#" title="Skype"><i class="fab fa-skype"></i></a>
                                </li>
                            </ul> --}}

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