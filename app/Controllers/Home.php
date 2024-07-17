<?php

namespace App\Controllers;

class Home extends BaseController
{
    // public function index(): string
    // {
    //     return view('welcome_message');
    // }

    public function index()
    {
        $session = session();

        $data = [
            'fname' => $session->get('fname'),
            'lname' => $session->get('lname'),
            'email' => $session->get('email'),
            'authorised' => $session->get('isLoggedIn'),
        ];

        return view('home', $data);
    }
}
