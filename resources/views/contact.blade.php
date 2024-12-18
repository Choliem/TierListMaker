{{-- anggap halaman inni setting untuk log out dan hapus account --}}

@if(auth()->user() && auth()->user()->is_admin)
    @extends('components.admin-layout')
@else
    @extends('components.layout')
@endif

@section('content')
    <x-slot:title>{{ $title ?? 'Contact Us' }}</x-slot:title>
    <h3 class="text-xl">Contact Kami</h3>
    <!-- Add additional content for the Contact page here -->
@endsection
