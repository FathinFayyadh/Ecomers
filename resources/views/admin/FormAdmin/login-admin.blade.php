@extends('template')
@section('title', 'Login Admin')
@section('content')
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5  ">
            <div class="card shadow-lg border border-2 border-dark p-1 ">
                <div class="card-header bg-primary text-white">
                    <h4 class="text-center mb-0">Welcome Admin</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('login-admin.store') }}" method="POST">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter admin email"
                            @error('email') is-invalid @enderror required>
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror                     
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" 
                            @error('password') is-invalid @enderror required>
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection