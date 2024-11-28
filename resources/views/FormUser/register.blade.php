@extends('template')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block ">
                        <img src="{{ asset('assets/img/BgRegister.jpg') }}" alt="" class="bg-register-image w-100 m">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class=" mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            id='name' name='name' placeholder="First Name"
                                            @error('name') is-invalid @enderror required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" 
                                        class="form-control form-control-user @error('email') is-invalid @enderror" 
                                        id="email" 
                                        name="email" 
                                        placeholder="Email Address"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="password" name="password" placeholder="Password"
                                            @error('password') is-invalid @enderror required>
                                        @error('password')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" col-6 mb-3 mb-sm-0">
                                        <input type="password" 
                                            class="form-control form-control-user" 
                                            id="password_confirmation" 
                                            name="password_confirmation" 
                                            placeholder="Confirm Password" required>
                                    </div>
                                </div>
                                <div class="row justify-content-center ">
                                    <button type="submit" class="btn btn-primary w-25  btn-user btn-block">
                                        Register Account
                                    </button>
                                </div>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{ route('login.create') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
