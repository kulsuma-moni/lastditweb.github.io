@extends('admin.layouts.app')

@section('title','Dashboard DelwarIT || Job Information')

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
                            <div class="col-sm-8">
                                <div class="media-body text-white">
                                    <h4 class="mt-1 mb-1 text-white font-18">Post : {{ $career->title }}</h4>
                                    <p><strong>Deadline</strong> : {{ $career->deadline }}</p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            	@if($career->status == 1)
                            	<div class="text-right">
	                        		<div class="col-md-12">
	                                    <button type="button" class="btn btn-light waves-effect">
	                                        <i class="mdi mdi-account-settings mr-1"></i>Active
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
                        <div class="panel-body">
                            <h4>Requirement</h4>
                            <p class="text-muted font-13">
                                {!! $career->requirement !!}
                            </p><br>
                            <h4>Responsibility</h4>
                            <p class="text-muted font-13">
                                {!! $career->responsibility !!}
                            </p><br>
                            <h4>Requirement</h4>
                            <p class="text-muted font-13">
                                {!! $career->benefit !!}
                            </p>

                            <hr/>

                            <div class="text-left font-24">

                                <p class="mb-2"><strong>Mobile :</strong><span> {{ $career->phone }}</span></p>
                                <p class="mb-2"><strong>Job Type :</strong><span> {{ $career->job_type }}</span></p>
                                <p class="mb-2"><strong>Job Time :</strong><span> {{ $career->job_time }}</span></p>
                                <p class="mb-2"><strong>Job Location :</strong><span> {{ $career->address }}</span></p>
                                <p class="mb-2"><strong>Shift :</strong><span> {{ $career->shift }}</span></p>
                                <p class="mb-2"><strong>Department :</strong><span> {{ $career->department }}</span></p>
                                <p class="mb-2"><strong>Salary Range :</strong><span> {{ $career->salary }}</span></p>
                                <p class="mb-2"><strong>Additional Notes :</strong><span> {{ $career->note }}</span></p>

                            </div>

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