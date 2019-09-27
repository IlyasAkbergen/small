<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['client', 'manager']);

        $user = new UserResource($request->user());

        return view('dashboard', compact('user'));
    }
}
