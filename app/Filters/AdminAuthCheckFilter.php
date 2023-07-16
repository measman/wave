<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuthCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('userdata')) {
            return redirect()->to('login');
            $session = \Config\Services::session();
            $session->setTempdata('login_error', 'Sorry, You must logged In!', 3);
        } else {
            if (session()->get('userdata')['role_id'] > 4) {
                return redirect()->back();
                $session = \Config\Services::session();
                $session->setTempdata('login_error', 'Sorry, You are not allowed!', 3);
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
