<?php

namespace App\Controllers;

use \App\Libraries\Hash;
use \App\Models\UserModel;

class Home extends BaseController
{
    public $session;
    public $usermodel;
    public function __construct()
    {
        $this->session = session();
        $this->usermodel = new UserModel();
    }
    public function index()
    {
        if ($this->session->has('userdata')) {


            if (!$this->session->get('userdata')['logged_in']) {
                return redirect()->route('login');
            } else {
                // $fy_id = session()->get('userdata')['fy_code'];
                // $user_id = session()->get('userdata')['userid'];
          
                    return view('admin/dashboard');
                
            }
        } else {
            return redirect()->route('login');
        }
    }

    public function login_page()
    {
        return view('auth/login');
    }
    public function test()
    {

        $rules = [
            'txtusername' => [
                'rules' => 'required|is_not_unique[users.username]',
                'errors' => [
                    'required' => 'Username is required',
                    'is_not_unique' => 'This username is not registered in our company.'
                ]
            ],
            'txtpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password is required'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data['validation'] = $this->validator;
            return view('auth/login', $data);
        } else {
            $un = $this->request->getVar('txtusername');
            $pw = $this->request->getVar('txtpassword');
            // echo $un;
            $user_info = $this->usermodel->where('lower(username)=lower(\'' . $un . '\')')->first();
            $check_password = Hash::check($pw, $user_info['password']);
            if ($check_password) {


                        $data = array(
                            'logged_in'  =>  TRUE,
                            'username' => $user_info['username'],
                            'userid' => $user_info['id']
                        );
                        
                            $this->session->set('userdata', $data);
                        
                        return redirect()->to(base_url());
                    
                
            } else {
                $this->session->setTempdata('login_error', 'Please provide correct username or password and try again.', 3);
                return redirect()->route('login')->withInput();
            }
        }
    }
}