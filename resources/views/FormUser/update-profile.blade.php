@extends('template-user')

@section('title', 'Update Profile')

@section('content')

    <div class="container mt-5 mb-4 pt-5">
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body shadow-lg">
                        <h5 class="card-title text-center mb-4 display-4 fw-bold">PROFILE</h5>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <!-- Form Start -->
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tambahkan method PUT untuk update -->

                            <div class="row justify-content-center mb-3">
                                <!-- Profile Image Section -->
                                <div class="col-md-4 text-center">

                                    <img id="profile-image" src="{{ asset('assets/img/undraw_profile.svg') }}"
                                        alt="Default Profile Image" class="rounded-circle mb-3" width="150"
                                        height="150">

                                    <div class="mb-3">
                                        <input type="file" id="file-input" name="photo" class="form-control w-auto"
                                            accept="image/*">
                                    </div>
                                    <small>Change Profile Photo</small>
                                </div>

                                <!-- Profile Form Section -->
                                <div class="col-md-4">
                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $user->name) }}" required>
                                    </div>

                                    <!-- Gender -->
                                    <label for="gender" class="form-label">Gender</label>
                                    <select class="form-select mb-2" name="gender" aria-label="Default select example">
                                        <option value="Laki-laki"
                                            {{ old('gender', $user->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ old('gender', $user->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                        </option>
                                    </select>

                                    <!-- Update Profile Button -->
                                    <div class="d-grid pt-3">
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
