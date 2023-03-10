<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index(){
        $name = Auth::user()->name;
        return view('admin.dashboard', compact('name'));
    }

    public function indexSiswa(){
        $name = Session::get('name');
        return view('admin.dashboard', compact('name'));
    }

}
