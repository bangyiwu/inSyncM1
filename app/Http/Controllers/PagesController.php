<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Welcome to inSync';
        return view('pages.index')->with('title', $title);
    }

    public function addevent() {
        return view('pages.addevent');
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
        return view('pages.viewgroups');
    }
}
