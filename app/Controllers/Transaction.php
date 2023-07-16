<?php

namespace App\Controllers;

use \App\Libraries\Hash;
use \App\Models\UserModel;

class Transaction extends BaseController
{
    // public $session;
    // public $usermodel;
    public function __construct()
    {
        // $this->session = session();
        // $this->usermodel = new UserModel();
    }
    public function manage()
    {
        return view('admin/transaction');
    }

    
}