@extends('template-user')
@section('title', 'Profil User')
@section('content')
    <div class="container mt-5 mb-4  pt-5">
        <div class="row ">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4 display-4 fw-bold">PROFILE</h5>
                        <div class="row justify-content-center mb-3">
                            <!-- Profile Image Section -->
                            <div class="col-md-4 text-center align-content-center">
                                <img id="profile-image" src="{{ asset('assets/img/undraw_profile.svg') }}" alt="Profile Image"
                                    class="rounded-circle mb-3" width="150" height="150">
                            </div>
                            <!-- Profile Form Section -->
                            <div class="col-md-4">
                                <form>
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name"
                                            value="{{ Auth::user()->name }}" disabled>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email"
                                            value="{{ Auth::user()->email }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gander</label>
                                        <input type="gender" class="form-control" id="gender"
                                            value="{{ Auth::user()->gender }}" disabled>
                                    </div>
                                    <!-- Update Profile Button -->
                                    <div class="d-grid pt-3">
                                        <a href="{{ route('update.profile') }}" class="btn btn-primary">Update Profile</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
