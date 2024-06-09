<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalUsers = User::where('usertype', 'user')->count();

        $totalCompletedResources = Resource::where('progress', 'completed')->count();

        $totalInProgressResources = Resource::where('progress', 'on progress')->count();

        return view('admin.dashboard', compact('totalUsers', 'totalCompletedResources', 'totalInProgressResources'));
    }
}
