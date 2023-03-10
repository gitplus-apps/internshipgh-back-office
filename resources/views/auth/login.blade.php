@extends('layouts.guest')

@section('title','Login')
@section('content')

    <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="{{url('/')}}" class="auth-logo">
                                        <img src="{{asset('assets/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto"
                                            alt="">
                                        <img src="{{asset('assets/images/logo-light.png')}}" height="30" class="logo-light mx-auto"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back 👋!</h4>
                                <p class="text-muted text-center mb-4">Sign in to continue to Internship Ghana.</p>

                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label" for="username">Email</label>
                                        <input type="text" class="form-control" id="email"
                                            placeholder="Enter email" name="email">
                                             <div class="mt-1">
                                                @if($errors->has('email'))
                                                    <p class="text-danger">{{ $errors->first('email')  }}</p>
                                                @endif
                                            </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword"
                                            placeholder="Enter password" name="password">
                                             <div class="mt-1">
                                                @if($errors->has('password'))
                                                        <p class="text-danger">{{ $errors->first('password')  }}</p>
                                                @endif
                            
                                            </div>
                                    </div>

                                    <div class="mb-3 row mt-4">
                                        <div class="col-sm-6">
                                            <div class="form-checkbox">
                                                <input type="checkbox" class="form-check-input me-1"
                                                   name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-label" class="form-check-label"
                                                    for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mt-4">
                                            <a href="{{ route('password.request') }}" class="text-muted"><i
                                                    class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Don't have an account ? <a href="{{route('register')}}" class="fw-bold text-primary"> Signup
                                Now </a> </p>
                      
                    </div>

                </div>

@endsection