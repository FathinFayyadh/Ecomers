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
                            @auth
                                <div class="col-md-4 text-center align-content-center">
                                    <img id="profile-image" src="{{ Storage::url(Auth::user()->image) }}" alt="Profile Image"
                                        class="rounded-circle mb-3" width="150" height="150">
                                </div>
                            @else
                                <div class="col-md-4 text-center align-content-center">
                                    <img id="profile-image" src="{{ asset('assets/img/undraw_profile.svg') }}"
                                        alt="Profile Image" class="rounded-circle mb-3" width="150" height="150">
                                </div>
                            @endauth
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
                                        <label for="gender" class="form-label">Gender</label>
                                        <input type="gender" class="form-control" id="gender"
                                            value="{{ Auth::user()->gender }}" disabled>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <!-- Trigger Button -->
                                        <button type="button" class="btn btn-warning mx-2" data-bs-toggle="modal"
                                            data-bs-target="#changePasswordModal">
                                            Change Password
                                        </button>

                                        <!-- Modal for changing password -->
                                        <div class="modal fade " id="changePasswordModal" tabindex="-1"
                                            aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="changePasswordModalLabel">Change
                                                            Password</h5>
                                                        <button type="button" class="btn-close " data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form id="changePasswordForm">
                                                            <div class="mb-3">
                                                                <label for="oldPassword" class="form-label">Old
                                                                    Password</label>
                                                                <input type="password" class="form-control" id="oldPassword"
                                                                    name="oldPassword" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="newPassword" class="form-label">New
                                                                    Password</label>
                                                                <input type="password" class="form-control" id="newPassword"
                                                                    name="newPassword" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="confirmPassword" class="form-label">Confirm New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="confirmPassword" name="confirmPassword" required>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            form="changePasswordForm">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Update Profile Button -->
                                        <div class="mr-3">
                                            <a href="{{ route('users.edit', Auth::user()->id) }}"
                                                class="btn btn-primary">Update Profile</a>
                                    </div>
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
