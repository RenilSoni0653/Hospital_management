@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if($user->profile()->count() <= 0)
            <form method="POST" action="{{ url('/profile') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text">Name : </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-2 col-form-label text">Address : </label>

                            <div class="col-md-6">
                                <input id="address" type="textarea"  rows="10" cols="10" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-2 col-form-label text">Phone Number : </label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('address') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-2 col-form-label text">Age : </label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" autocomplete="age" autofocus>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label text">Gender : </label>

                            <div class="col-md-6">
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" autocomplete="gender" autofocus>
                                    <option name="gender" value="Male">Male</option>
                                    <option name="gender" value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text">Email : </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? auth()->user()->email }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Profile
                                </button>
                            </div>
                        </div>
                @else
                <div class="card-header">Patient Dashboard</div>
                    <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td><a href="{{ url('/profile/'.auth()->user()->id.'/edit') }}">Edit Profile</a></td>
                            <td><a href="/appointment/create">Book Appointment</a></td>
                        </tr>
                        
                        <tr>
                            <td><a href="/appointment">Show booked Appointment</a></td>
                            <td><a href="/profile">Change Password</a></td>
                        </tr>
                    </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
