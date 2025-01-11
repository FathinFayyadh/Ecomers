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
                                    <img id="profile-image" src="{{ $user->photo }}" alt="Profile Image"
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
                                        <div class="modal fade" id="changePasswordModal" tabindex="-1"
                                            aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="changePasswordModalLabel">Change
                                                            Password</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('update.password') }}"
                                                            id="changePasswordForm">
                                                            @csrf <!-- Token CSRF sangat penting -->

                                                            <!-- Old Password -->
                                                            <div class="mb-3">
                                                                <label for="oldPassword" class="form-label">Old
                                                                    Password</label>
                                                                <input type="password" class="form-control" id="oldPassword"
                                                                    name="current_password" required>
                                                                @error('current_password')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- New Password -->
                                                            <div class="mb-3">
                                                                <label for="newPassword" class="form-label">New
                                                                    Password</label>
                                                                <input type="password" class="form-control" id="newPassword"
                                                                    name="new_password" required>
                                                                @error('new_password')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                            <!-- Confirm New Password -->
                                                            <div class="mb-3">
                                                                <label for="confirmPassword" class="form-label">Confirm New
                                                                    Password</label>
                                                                <input type="password" class="form-control"
                                                                    id="confirmPassword" name="new_password_confirmation"
                                                                    required>
                                                                @error('new_password_confirmation')
                                                                    <div class="text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            id="changePasswordForm">Save Changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Success/Error Feedback -->
                                        @if (session('success'))
                                            <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger mt-3">
                                                {{ session('error') }}
                                            </div>
                                        @endif

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

    <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
            console.log('Form submitted!');
        });
    </script>
@endsection
