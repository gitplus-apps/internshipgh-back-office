@extends('layouts.guest')

@section('title','Register')
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
                    <h4 class="font-size-18 text-muted mt-2 text-center">Free Register</h4>
                    <p class="text-muted text-center mb-4">Creat your Internship Ghana Account now.</p>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="useremail">Email</label>
                            <input type="email" class="form-control" id="useremail"
                                placeholder="Enter email" name="email" value="{{old('email')}}" required>
                                <div class="mt-1">
                                      @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control" id="username"
                                placeholder="Enter username" name="name" value="{{old('name')}}" required>
                            <div class="mt-1">
                                  @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Password</label>
                            <input type="password" class="form-control" id="userpassword"
                                placeholder="Enter password" name="password" required>
                            <div class="mt-1">
                                @error('password')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label" for="userpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="userpassword"
                                placeholder="Confirm password" name="password_confirmation" required>
                        </div>

                        <div class="mb-3 row mt-4">
                            <div class="col-12 text-end">
                                <button class="btn btn-primary w-md waves-effect waves-light"
                                    type="submit">Register</button>
                            </div>
                        </div>

                        <div class="mt-4 row">
                            <div class="col-12">
                                <p class="text-muted mb-0">By registering you agree to Internship Ghana's <a
                                        href="#">Terms of Use</a></p>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
        <div class="mt-5 text-center">
            <p>Already have an account ? <a href="{{route('login')}}" class="fw-bold text-primary"> Login </a>
            </p>
            
        </div>

    </div>
    
@endsection