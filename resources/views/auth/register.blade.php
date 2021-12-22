@extends('frontend.master')

@section('title')
    Login
@endsection

@section('content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Regitration Page</h2>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Regitration</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="account-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="account-form form-style">
                        <p>User Name *</p>
                        <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name"
                        autofocus>
                        @error('name')
                                <div class="text-danger" style="margin-top: -20px; margin-bottom: 15px;">
                                    {{ $message }}
                                </div>
                        @enderror 

                        <p>Email Address *</p>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" >
                        @error('email')
                                <div class="text-danger" style="margin-top: -20px; margin-bottom: 15px;">
                                    {{ $message }}
                                </div>
                        @enderror 

                        <p>Password *</p>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" >
                        @error('password')
                                <div class="text-danger" style="margin-top: -20px; margin-bottom: 15px;">
                                    {{ $message }}
                                </div>
                        @enderror 
                        
                        <p>Confirm Password *</p>
                        <input id="password-confirm" type="password" name="password_confirmation"
                        required autocomplete="new-password">

                        @error('password-confirm')
                                <div class="text-danger" style="margin-top: -20px; margin-bottom: 15px;">
                                    {{ $message }}
                                </div>
                        @enderror 
                        <button type="submit">Register</button>
                        <div class="text-center">
                            <a href="{{route('login')}}">Or Login</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


{{--     <div class="d-flex align-items-center justify-content-center ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center">
                <img class="wd-250 mb-2" src="{{ asset('dashboard/img/muskan-logo.PNG') }}" alt="">
            </div>
            <div class="tx-center mg-b-60">Built on Service, and Focused on Style.</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your Username"
                        autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your Email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Enter your Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                        required autocomplete="new-password" placeholder="Enter your Confirm-Password">

                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div><!-- form-group -->

                <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
                <button type="submit" class="btn btn-info btn-block">Sign Up</button>
            </form>

            <div class="mg-t-40 tx-center">Already a member? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>

        </div><!-- login-wrapper -->
    </div><!-- d-flex --> --}}


{{--     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
