<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
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
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        return view('users.main-admin.ma-voterRecord');
    }

    public function votingSettings()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        return view('users.main-admin.ma-votingSettings');
    }

    public function createForm()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        return view('users.main-admin.ma-createForm');
    }

    public function candidateManagement()
    {
        // Pass any required data as needed
        return view('users.main-admin.ma-candidate');
    }

    public function partylistManagement()
    {
        // Pass any required data as needed
        return view('users.main-admin.ma-parylist');
    }

    public function analytics()
    {
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        return view('users.main-admin.ma-analyticsPage');
    }
    /*
    public function userdefault()
    {
        return view('users.user-client.user-default');
    }
    */
}
