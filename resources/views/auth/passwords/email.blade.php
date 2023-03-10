@extends('layouts.guest')
@section('title','Reset Password')
@section('content')
     <div class="col-md-8 col-lg-6 col-xl-5">
                    
                    <div class="card">
                        <div class="card-body">
                           @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html" class="auth-logo">
                                        <img src="{{asset('assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto"
                                            alt="">
                                        <img src="{{asset('assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 text-muted mt-2 text-center mb-4">Reset Password</h4>
                                <div class="alert alert-info" role="alert">
                                    Enter your Email and instructions will be sent to you!
                                </div>

                                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="useremail">Email</label>
                                        <input type="email" class="form-control" id="useremail"
                                            placeholder="Enter email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        
                                        @error('email')
                                            <span class="text-danger" role="alert">
                                                <p>{{ $message }}</p>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 row mt-4">
                                        <div class="col-12 text-center">
                                            <button class="btn btn-primary w-lg waves-effect waves-light"
                                                type="submit">Send Password Reset Link</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="{{route('login')}}" class="fw-bold text-primary"> Sign In Here </a> </p>
                        
                    </div>

                </div>
@endsection
