@extends('template-user')
@section('title', 'Update Profile')
@section('content')

<div class="container mt-5 mb-4  pt-5" >
    <div class="row ">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body shadow-lg">
                    <h5 class="card-title text-center mb-4 display-4 fw-bold">PROFILE</h5>
                    <div class="row justify-content-center mb-3">
                        <!-- Profile Image Section -->
                        <div class="col-md-4 text-center">
                            <img id="profile-image" src="{{ asset('assets/img/undraw_profile.svg') }}" alt="Profile Image"
                                class="rounded-circle mb-3" width="150" height="150">
                            <div class="mb-3">
                                <input type="file" id="file-input" class="form-control w-auto" accept="image/*">
                            </div>
                            <small>Change Profile Photo</small>
                        </div>

                        <!-- Profile Form Section -->
                        <div class="col-md-4">
                            <form action="{{ route('update.profile') }}" method="POST">
                                <!-- Name -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name"
                                        >
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <label for="gander" class="form-label">Gander</label>
                                <select class="form-select mb-2" name="gender" aria-label="Default select example">
                                    <option value="1" name="Laki-laki">Laki-laki</option>
                                    <option value="2" name="Perempuan">Perempuan</option>        
                                  </select>
                                <!-- Update Profile Button -->
                                <div class="d-grid pt-3">
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