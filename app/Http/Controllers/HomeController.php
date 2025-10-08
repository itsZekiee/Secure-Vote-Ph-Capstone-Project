<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Pass an empty array or other data to the dashboard view
        return view('user-welcome');
    }

    public function dashboard()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        $user = auth()->user();
        return view('users.main-admin.ma-dashboard', compact('user'));
    }


    public function voterRecord()
    {
        return view('users.main-admin.ma-voterRecord');
    }
    public function votingSettings()
    {
        return view('users.main-admin.ma-votingSettings');
    }

    public function createForm()
    {
        return view('users.main-admin.ma-createForm');
    }
    public function candidates()
    {
        return view('users.main-admin.ma-candidatePage');
    }
    public function partylist()
    {
        return view('users.main-admin.ma-partylistPage');
    }
    public function analytics()
    {
        return view('users.main-admin.ma-analyticsPage');
    }
}
