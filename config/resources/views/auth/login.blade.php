@extends('layouts.app')

@section('content')


    <!--Start Login area-->
    <section class="login-wrapper-area">
        <div class="login-wrap">
            <div class="container">
                <div class="login-area">
                    <div class="area">
                        <div class="row">
                            <div class="col-lg-6">

                                <form method="POST" action="{{ route('login') }}" class="theme-form">
                                    @csrf
                                    <div class="tab-content" id="myTabContent">
                                      {{--   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <h2>Get Started</h2>
                                            <form class="form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Phone Number" aria-label="number" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Address" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="password" class="form-control" placeholder="Confirm-Password" aria-label="password" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <select class="form-select" aria-label="Default select example">
                                                            <option selected>Category</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Trainer-Name" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" placeholder="Batch-Number" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="number" class="form-control" placeholder="Id" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                                                            <label for="vehicle1">By signing up, you agree to <span><a href="terms.html">Terms &amp; Conditions</a></span>
                                                            </label>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> --}}
                                        <h2>Login</h2>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email*" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password*">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                      {{--   <div class="row">
                                            <div class="col-lg-12">
                                                <div class="f-1">
                                                    <p>Forget Password? <a href="#0">Reset It.</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active default" href="{{ route('register') }}">Sign Up</a>
                                        </li>
                                        <li class="nav-item text-right" style="float:right;" role="presentation">
                                            <button class="nav-link default">Sign In</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <div class="image">
                                    <img src="{{ asset('public/frontend/assets/images/login.png') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Login area-->
@endsection
