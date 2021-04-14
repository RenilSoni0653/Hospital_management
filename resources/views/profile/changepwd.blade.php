@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>
                <form method="POST" action="{{ url('/profile/'.auth()->user()->id) }}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text">Email-id : </label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? auth()->user()->profile->email }}" autocomplete="email" autofocus readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="opassword" class="col-md-2 col-form-label text">Old password : </label>

                            <div class="col-md-6">
                                <input id="opassword" type="password" class="form-control @error('opassword') is-invalid @enderror" name="opassword" value="{{ old('opassword') }}" autocomplete="opassword" autofocus>

                                @error('opassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="npassword" class="col-md-2 col-form-label text">New Password : </label>

                            <div class="col-md-6">
                                <input id="opassword" type="password" class="form-control @error('npassword') is-invalid @enderror" name="npassword" value="{{ old('npassword') }}" autocomplete="npassword" autofocus>

                                @error('npassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
