<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;

class PagesController extends Controller
{
    public function index() {
        // $title = 'Welcome to inSync';
        return redirect()->route('login');
    }

    public function myevents() {
        return view('pages.myevents');
    }

    public function dashboard() {
        return view('pages.dashboard');
    }

    public function editgroups() {
        return view('pages.editgroups');
    }

    public function viewgroups() {
        $groups = Group::all();
        return view('pages.viewgroups')->with('groups', $groups);
    }
}
