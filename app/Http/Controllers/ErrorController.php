<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ErrorController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('layouts.errors.404');
        } else {
            abort(404);
        }
    }
}
