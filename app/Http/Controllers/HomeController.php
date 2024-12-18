<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Check if the user is authenticated and if the role is admin
        $layout = Auth::check() && Auth::user()->role == 'admin' ? 'admin-layout' : 'layout';

        return view('home', [
            'title' => 'Home Page',
            'layout' => $layout,  // Dynamically pass layout based on user role
        ]);
    }
}
