<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class SessionConroller extends BaseController
{
    public function authorised($data)
    {
        $session = session();
        $authData = [
            'id' => $data['id'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'profile' => $data['profile'],
            'isLoggedIn' => true
        ];

        $session->set($authData);
    }

    public function unauthorised()
    {
        $session = session();
        $authData = ['isLoggedIn' => false];

        $session->set($authData);
    }
}
