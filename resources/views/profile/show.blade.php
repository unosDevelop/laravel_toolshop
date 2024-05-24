@extends('admin.layout.main')

@section('container')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="profile_image" class="col-md-4 col-form-label text-md-right">Profile Image</label>

                        <div class="col-md-6">
                            @if ($user->profile_image)
                                <img src="{{ asset('images/profile/' . $user->profile_image) }}" alt="Profile Image" style="max-width: 150px;">
                            @else
                                <p>No profile image available</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-right">Birth Date</label>

                        <div class="col-md-6">
                            <input id="birth_date" type="text" class="form-control" name="birth_date" value="{{ $user->birth_date ? $user->birth_date->format('d/m/Y') : 'Not specified' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $user->phone_number ?: 'Not specified' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                        <div class="col-md-6">
                            <textarea id="address" class="form-control" name="address" rows="3" readonly>{{ $user->address ?: 'Not specified' }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="occupation" class="col-md-4 col-form-label text-md-right">Occupation</label>

                        <div class="col-md-6">
                            <input id="occupation" type="text" class="form-control" name="occupation" value="{{ $user->occupation ?: 'Not specified' }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
