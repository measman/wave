<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }

    public function login_page()
    {
        return view('auth/login');
    }
}