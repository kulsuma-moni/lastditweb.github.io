@php 
      $setting = App\Models\Admin\Setting::first();
@endphp

<!doctype html>
<html lang="en">

<!-- Mirrored from coderthemes.com/highdmin/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:51:24 GMT -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    @yield('header_css')
      @if($setting)
        <meta property="og:type" content="Training Institute,Training Institute sylhet" />
        <meta property="og:url" content="{{ URL::current() }}" />
        <meta property="og:site_name" content="DelwarIT" />
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/app/public/'.$setting->favicon)}}">
        <meta name="og:image" content="{{ asset('/storage/app/public/'.$setting->logo) }}"/>
        <meta name="og:title" content="{{ $setting->title }}" />
        <meta name="og:description" content="{{ $setting->meta_description }}" />
      @endif

    <!-- App css -->
    <link href="{{ url('public/backend') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/backend') }}/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/backend') }}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/backend') }}/assets/css/style.css" rel="stylesheet" type="text/css" />

      <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/toastr/toastr.min.css')}}">

    <script src="{{ url('public/backend') }}/assets/js/modernizr.min.js"></script>

   
      <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/toastr/toastr.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/sweetalert/sweetalert.css')}}">

      {{-- data table start --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
      {{-- data table end --}}

       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="" class="logo">
                        <span>
                            <img src="{{ url('public/backend') }}/assets/images/logo1.png" alt="" height="37">
                        </span>
                        <i>
                            <img src="{{ url('public/backend') }}/assets/images/logo1.png" alt="" height="38">
                        </i>
                    </a>
                </div>

                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                       {{--  @php
                            $user = App\Models\User::findOrFail(Auth::user()->id);
                        @endphp
                        <img src="{{ asset('storage/app/public/',$user->userdetail->image) }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid"> --}}
                    </div>
                    <h5><a href="">{{Auth::user()->name ?? ""}}</a> </h5>
                    <p class="text-muted">{{Auth::user()->type ?? ""}}</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <!--<li class="menu-title">Navigation</li>-->
                        @if(Auth::user()->is_editor == 1)

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fa-solid fa-chart-line"></i> <span> Dashboard </span>
                            </a>
                        </li>
                        @if(Auth::user()->is_admin == 1)
                        <li>
                            <a href="{{ route('applied.student') }}">
                                <i class="fa-solid fa-list"></i> <span> New Applied Students </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('active.student') }}">
                                <i class="fa-solid fa-users"></i> <span> Active Students </span>
                            </a>
                        </li>



                        <li>
                            <a href="javascript: void(0);"><i class="fas fa-chalkboard"></i> <span> Courses </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.course') }}">Add</a></li>
                                <li><a href="{{ route('index.course') }}">All</a></li>
                            </ul>
                        </li>



                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-user-group"></i> <span> Batches </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.batch') }}">Add</a></li>
                                <li><a href="{{ route('index.batch') }}">All</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-users-gear"></i> <span> Job's </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.career') }}">Add</a></li>
                                <li><a href="{{ route('index.career') }}">All</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-users-gear"></i> <span> Freelancer's </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.freelancer') }}">Add</a></li>
                                <li><a href="{{ route('index.freelancer') }}">All</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-users-gear"></i> <span> Entrepreneur's </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.entrepreneur') }}">Add</a></li>
                                <li><a href="{{ route('index.entrepreneur') }}">All</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-users-gear"></i> <span> Editors </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                {{-- <li><a href="{{ route('index.editor') }}">Editors</a></li> --}}
                                <li><a href="{{ route('index.editor') }}">New Applied Editors</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-users-gear"></i> <span> Councellers </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('index.counceller') }}">Councellers</a></li>
                                <li><a href="{{ route('new.index.counceller') }}">New Applied Councellers</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa-brands fa-servicestack"></i> <span> Service </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('create.service') }}">Add New Service</a></li>
                                <li><a href="{{ route('index.service') }}">All Services</a></li>
                                <li><a href="{{ route('deactive.service.list') }}">Deactive Services</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-location-crosshairs"></i> <span> Locations </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.division') }}">Division</a></li>
                                <li><a href="{{ route('admin.district') }}">District</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('index.contact') }}">
                                <i class="fa-solid fa-address-book"></i> <span>New Contact List </span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="javascript: void(0);"><i class="fa-brands fa-blogger-b"></i> <span> Blog </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.blogcate') }}">Manage Blog Category</a></li>

                                <li><a href="{{ route('create.blog') }}">Add New Blog</a></li>
                                @if(Auth::user()->is_admin == 1)
                                <li><a href="{{ route('index.blog') }}">All Blogs</a></li>
                                <li><a href="{{ route('deactive.blog.list') }}">Deactive Blogs</a></li>
                                @endif
                                @if(Auth::user()->is_editor == 1)
                                <li><a href="{{ route('user.index.blog') }}">My Blogs</a></li>
                                <li><a href="{{ route('user.deactive.blogs') }}">My Deactive Blogs</a></li>
                                @endif
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);"><i class="fa-solid fa-diagram-project"></i> <span> Portfolio </span> <span class="menu-arrow"></span></a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{ route('admin.portfoliocate') }}">Manage Category</a></li>
                                <li><a href="{{ route('create.portfolio') }}">Add Portfolio</a></li>  
                                 @if(Auth::user()->is_admin == 1)
                                <li><a href="{{ route('index.portfolio') }}">All Portfolios</a></li>
                                <li><a href="{{ route('deactive.portfolio.list') }}">My Deactive Porfolios</a></li>
                                @endif
                                @if(Auth::user()->is_editor == 1)
                                <li><a href="{{ route('user.index.portfolio') }}">My Porfolios</a></li>
                                <li><a href="{{ route('user.deactive.portfolios') }}">Deactive Porfolios</a></li>
                                @endif
                            </ul>
                        </li>


                        <li>
                            <a href="{{ route('setting') }}">
                                <i class="fa-solid fa-gear"></i> <span>Settings </span>
                            </a>
                        </li>
                        @endif

                    </ul>

                </div>
                <!-- Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>

        <!-- Left Sidebar End -->
        <!-- ============================================================== -->

        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->
            <div class="topbar">

                <nav class="navbar-custom">

                    <ul class="list-unstyled topbar-right-menu float-right mb-0">

                        <li class="hide-phone app-search">
                            <form>
                                <input type="text" placeholder="Search..." class="form-control">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fi-bell noti-icon"></i>
                                <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href="#" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                        <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                        <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fi-speech-bubble noti-icon"></i>
                                <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">


                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0"><span class="float-right"><a href="#" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                </div>

                                <div class="slimscroll" style="max-height: 230px;">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">{{-- <img src="{{ url('public/backend') }}/assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> --}}  </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="{{ url('public/backend') }}/assets/images/users/avatar-3.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sam Garret</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="{{ url('public/backend') }}/assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="{{ url('public/backend') }}/assets/images/users/avatar-5.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Sherry Marshall</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon"><img src="{{ url('public/backend') }}/assets/images/users/avatar-6.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Shawn Millard</p>
                                        <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all <i class="fi-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                               {{--  <img src="{{ url('public/backend') }}/assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> --}}<i class="fa-solid fa-user"></i>  <span class="ml-1">{{Auth::user()->name ?? ""}}<i class="mdi mdi-chevron-down"></i> </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
                                @if(Auth::user()->is_editor == 1)
                                <!-- item-->
                                <a href="{{ route('user.profile') }}" class="dropdown-item notify-item">
                                    <i class="fi-head"></i> <span>My Account</span>
                                </a>
                                @if(Auth::user()->is_admin == 1)
                                <!-- item-->
                                <a href="{{ route('setting') }}" class="dropdown-item notify-item">
                                    <i class="fi-cog"></i> <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-help"></i> <span>Support</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fi-lock"></i> <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                @endif


                                <form action="{{route('logout')}}" method="POST" id="logout-form">
                                    @csrf
                                    <i class="fi-power" style="padding: 10px 0px 15px 20px;"></i> <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); " style="color: black;">Logout</a>
                                </form>

                                @endif

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left disable-btn">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        <li>
                            <div class="page-title-box">
                                <h4 class="page-title">Dashboard </h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrhumb-item active">Welcome {{Auth::user()->name ?? ""}} in Delwarit Admin Panel !</li>
                                </ol>
                            </div>
                        </li>

                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->
            @yield('content')

        </div>

        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ url('public/backend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ url('public/backend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public/backend') }}/assets/js/metisMenu.min.js"></script>
    <script src="{{ url('public/backend') }}/assets/js/waves.js"></script>
    <script src="{{ url('public/backend') }}/assets/js/jquery.slimscroll.js"></script>

    <!-- Flot chart -->
    <script src="../plugins/flot-chart/jquery.flot.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.time.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.resize.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.pie.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="../plugins/flot-chart/curvedLines.js"></script>
    <script src="../plugins/flot-chart/jquery.flot.axislabels.js"></script>

    <!-- KNOB JS -->
    <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
    <script src="../plugins/jquery-knob/jquery.knob.js"></script>

    <!-- Dashboard Init -->
    <script src="{{ url('public/backend') }}/assets/pages/jquery.dashboard.init.js"></script>

    <!-- App js -->
    <script src="{{ url('public/backend') }}/assets/js/jquery.core.js"></script>
    <script src="{{ url('public/backend') }}/assets/js/jquery.app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    @yield('footer_js')

    {{-- toastr alert --}}
    

        {{-- toastr alert --}}
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            @if(Session::has('messege'))
                var type="{{Session::get('alert-type','info')}}"
                switch(type){
                    case 'info':
                         toastr.info("{{ Session::get('messege') }}");
                         break;
                    case 'success':
                        toastr.success("{{ Session::get('messege') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('messege') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('messege') }}");
                        break;
                }
              @endif
        </script>

        {{-- sweet alert --}}
        <script src="{{ asset('public/backend/assets/js/sweetalert.min.js') }}"></script>
        
        <script>
            //Delete Alert
            $(document).on("click","#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
                swal({
                title: "Are you sure?",
                text: "Delete for everytime!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location.href = link;
                } else {
                    swal("Your file is safe!");
                }
                });
            });
        </script>


        
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
        {{-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> --}}
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>

          <script>
            $(document).ready(function() {
                var table = $('#example').DataTable( {
                    lengthChange: false,
                    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
                } );
             
                table.buttons().container()
                    .appendTo( '#example_wrapper .col-md-6:eq(0)' );
            } );
        </script>

        
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js" integrity="sha512-cyAbuGborsD25bhT/uz++wPqrh5cqPh1ULJz4NSpN9ktWcA6Hnh9g+CWKeNx2R0fgQt+ybRXdabSBgYXkQTTmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

<!-- Mirrored from coderthemes.com/highdmin/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Apr 2019 06:51:50 GMT -->

</html>