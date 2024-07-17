<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    public function showRegistrationForm()
    {
        helper(['form']);
        $data = [];
        echo view('auth/register', $data);
    }

    public function register()
    {
        helper(['form']);
        $rules = [
            'fname'          => 'required|min_length[2]|max_length[50]',
            'lname'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $user = new userModel();
            $filename = '';
            if (isset($_FILES['profile']) && is_uploaded_file($_FILES['profile']['tmp_name'])) {
                $date       = date('Y_m_d_H_i_s'); 
                $ext        = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                $filename   = 'profile_' . $date . '.' . $ext;
                $path       = APPPATH . '../public/img/' . $filename;
                move_uploaded_file($_FILES['profile']['tmp_name'], $path);
            }
            
            $data = [
                'fname'     => $this->request->getVar('fname'),
                'lname'     => $this->request->getVar('lname'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'profile'     => $filename
            ];

            $user->save($data);
            $new = $user->where('email', $this->request->getVar('email'))->first();
            $authSession = new SessionConroller();
            $authSession->authorised($new);

            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        }
    }
}
