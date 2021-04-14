@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book Appointment</div>
                
                <form method="POST" action="{{ url('/profile') }}">
                @csrf
                @php
                    $i = 0;
                    $j = -1;
                @endphp
            
                <div class="card-body">
                    <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text">Timing : </label>
                            <div class="col-md-6">
                                
                            <select name="hours" class=" @error('hours') is-invalid @enderror" value="{{ old('hours') }}" autocomplete="hours" autofocus>
                                    @while($i < 12)
                                    <option>{{ $i = $i + 1 }}</option>
                                    @endwhile
                                </select>
                                {{ ':' }}

                                <select name="minutes" class=" @error('minutes') is-invalid @enderror" value="{{ old('minutes') }}" autocomplete="minutes" autofocus>
                                    @while($j < 59)
                                    <option>{{  $j = $j + 1 }}</option>
                                    @endwhile
                                </select>

                                @error('[hours, minutes]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="dname" class="col-md-2 col-form-label text">Doctor name </label>
                            <div class="col-md-6">
                                <select class="form-control @error('dname') is-invalid @enderror" name="dname" value="{{ old('dname') }}" autocomplete="dname" autofocus>>
                                    @foreach($doctor as $data)
                                    <option name="dname">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('dname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Book Appointment
                                </button>
                            </div>
                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
