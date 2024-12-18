@if(auth()->user() && auth()->user()->is_admin)
    @extends('components.admin-layout')
@else
    @extends('components.layout')
@endif

@section('content')
    <h1>Welcome to the Home Page</h1>
    <p>This is the content of the homepage.</p>
@endsection
