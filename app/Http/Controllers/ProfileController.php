<?php

namespace App\Http\Controllers;

use App\Models\Profilevm;
use App\Models\Statsprofile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    
    public function index()
    {
        $profile = Profilevm::first();
        $stats = Statsprofile::all();
        return view('profile.profile', compact('profile', 'stats'));
    }
}
