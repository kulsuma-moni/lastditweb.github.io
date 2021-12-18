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

                    @if(session('tomuchmoney'))
                    <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('tomuchmoney') }}</strong>.
                    </div>
                    @endif
                    
                    @if(session('paysuccess'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ session('paysuccess') }}</strong>.
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
                                <span class="float-left mr-2"><img src="{{ asset('storage/app/public/'.$student->image) }}" alt="" class="avatar-xl rounded-circle" height="128" width="128"></span>
                                <div class="media-body text-white">
                                    <h4 class="mt-1 mb-1 text-white font-18">{{ $student->name }}</h4>
                                    <p class="font-13"> {{ $student->course->name }}</p>
                                    <p class="mb-0">Roll : @if($student->roll){{ $student->roll }}@else N/A @endif</p>
                                    <p class="mb-0">Batch : @if($student->batch){{ $student->batch->batch_number }} @else N/A @endif</p>
                                    {{-- <p><strong >Course Fee : </strong>{{ $student->course->course_fee }}</p> --}}
                                    <p><strong >Due Fee : </strong>{{ $due }}</p>
                                </div>
                            </div>
                            <div class="col-sm-8">
                            		@if($student->status ==1)
                            	<div class="text-right">
	                        		<div class="col-md-12">
	                                    <button type="button" class="btn btn-light waves-effect">
	                                        <i class="mdi mdi-account-settings mr-1"></i>Student Already Confirmed!!
	                                    </button>
		                            </div>
                            	</div>
                            	@else

	                            	<form action="{{ route('confirm.student',$student->id) }}" method="post" enctype="multipart/form-data">
	                            		@csrf
		                            	<div class="row">
		                            		<div class="col-md-4"><input type="text" class="form-control @error('roll') is-invalid @endif" placeholder="Generate a Roll number" value="{{ $student->roll }}" name="roll">
                                                @error('roll')
                                                    <span>{{ $message }}</span>
                                                @endif
                                            </div>
		                            		<div class="col-md-4">
		                            			<select name="batch_id" class="form-control  @error('batch_id') is-invalid @endif">
		                            				<option value="">Select a Batch</option>
		                            				@foreach($batches as $batch)
			                            				@if($batch->course->id == $student->course->id)
				                            				<option value="{{ $batch->id }}">Batch - {{ $batch->batch_number }}</option>
			                            				@endif
		                            				@endforeach
		                            			</select>
		                            		</div>
		                            		<div class="col-md-4">
			                                    <button type="submit" class="btn btn-light waves-effect">
			                                        <i class="mdi mdi-account-settings mr-1"></i> Confirm
			                                    </button>
				                            </div>
		                            	</div>
		                            </form>
	                            @endif
                                @if($due > 0)

                                    <form action="{{ route('pay.student',$student->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mt-4">
                                            <div class="col-md-4 text-white"></div>
                                            <div class="col-md-4">
                                                <input name="pay" class="form-control  @error('pay') is-invalid @endif" placeholder="Pay now">
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-light waves-effect">
                                                    <i class="mdi mdi-account-settings mr-1"></i> Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                @else
                                    <h4>Paid</h4>

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
                        <a href="{{ route('payment.info',$student->id) }}" class="btn btn-outline-info mb-2">Payment Information</a>
                        <h4 class="header-title mb-3">Personal Information</h4>
                        <div class="panel-body">
                            <p class="text-muted font-13">
                                {{ $student->education }}
                            </p>

                            <hr/>

                            <div class="text-left text-muted font-13">

                                <p class="mb-2"><strong>Father Name :</strong><span> {{ $student->fname }}</span></p>

                                <p class="mb-2"><strong>Mother Name :</strong><span> {{ $student->mname }}</span></p>

                                <p class="mb-2"><strong>Mobile :</strong><span> {{ $student->phone }}</span></p>

                                <p class="mb-2"><strong>Email :</strong> <span> {{ $student->email }}</span></p>

                                <p class="mb-2"><strong>Present Address :</strong> <span> {{ $student->present_address }}</span></p>

                                <p class="mb-2"><strong>Permanent Address :</strong> <span> {{ $student->permanent_address }}</span></p>

                                <p class="mb-2"><strong>Date of Birth :</strong> <span> {{ $student->birth_date }}</span></p>

                                <p class="mb-2"><strong>Occupation :</strong><span> {{ $student->occupation }}</span></p>

                                <p class="mb-2"><strong>Gender :</strong><span>@if($student->gender == 1) Male @elseif($student->gender== 2) Female @else Other @endif </span></p>

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