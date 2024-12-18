@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Profile</h1>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <!-- Add more profile details here -->
    </div>
@endsection
