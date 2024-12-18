@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Welcome, {{ auth()->user()->name }}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
@endsection
