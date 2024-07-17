<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function showLoginForm()
    {
        helper(['form']);
        echo view('auth/login');
    }

    public function login()
    {
        $session = session();
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = new UserModel();
        $data = $user->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $authSession = new SessionConroller();
                $authSession->authorised($data);
                return redirect()->route('/');
            } else {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        $authSession = new SessionConroller();
        $authSession->unauthorised();
        return redirect()->route('/');
    }
}
