@extends('Admin.dashboard')
@section('title', 'Profil Admin')

@section('content-admin')

<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title text-center mb-4">Profile</h5>
            
            <div class="row">
              <!-- Profile Image Section -->
              <div class="col-md-4 text-center">
                <img id="profile-image" src="{{ asset('assets/img/undraw_profile.svg') }}" alt="Profile Image" class="rounded-circle mb-3" width="150" height="150">
                <div class="mb-3">
                  <input type="file" id="file-input" class="form-control w-auto" accept="image/*">
                </div>
                <small>Change Profile Photo</small>
              </div>
  
              <!-- Profile Form Section -->
              <div class="col-md-8">
                <form>
                  <!-- Name -->
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" disabled>
                  </div>
  
                  <!-- Email -->
                  <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" disabled>
                  </div>
  
                  <!-- Old Password -->
                  <div class="mb-3">
                    <label for="old-password" class="form-label">Old Password</label>
                    <input type="password" class="form-control" id="old-password" placeholder="Enter old password">
                  </div>
  
                  <!-- New Password -->
                  <div class="mb-3">
                    <label for="new-password" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="new-password" placeholder="Enter new password">
                  </div>
  
                  <!-- Confirm Password -->
                  <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" placeholder="Confirm your password">
                  </div>
  
                  <!-- Update Profile Button -->
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Update Profile</button>
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