@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Booked Appointment</div>
                
                <form method="POST" action="{{ url('/profile') }}">
                @csrf
                    <table width=100%>
                        <tr>
                            <td>Sr no.</td>
                            <td>Doctor-name</td>
                            <td>Timing</td>
                        </tr>

                        <tr>
                            @foreach($appointment as $data)
                            <td>{{ auth()->user()->$data }}</td>
                            @endforeach
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


https://laravel.com/docs/8.x/migrations
https://laravel.com/docs/8.x/seeding
https://laravel.com/docs/8.x/eloquent
https://laravel.com/docs/8.x/eloquent-relationships