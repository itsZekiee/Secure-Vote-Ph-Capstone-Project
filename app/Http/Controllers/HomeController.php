<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pass an empty array or other data to the dashboard view
        return view('users.main-admin.ma-dashboard');
    }

    public function dashboard()
    {
        // Pass an empty array or other data to the dashboard view
        return view('users.main-admin.ma-dashboard');
    }

    public function voterRecord()
    {
        return view('users.main-admin.ma-voterRecord');
    }
    public function votingSettings()
    {
        return view('users.main-admin.ma-votingSettings');
    }
}
