<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return 'register';
    }

    public function login()
    {
        return 'login';
    }

    public function logout()
    {
        return 'logout';
    }
}
