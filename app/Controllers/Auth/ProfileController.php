<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        $user = new UserModel();
        
        $id = $session->get('id');

        $db = db_connect();
        $query = $db->query('SELECT * FROM users');

        // die(json_encode( $user->findAll()));
        // die(json_encode( $query->getResult()));
        
        $data = [
            // 'user' => $user->findAll()
            'user' => $query->getResult('array')
        ];

        echo view('auth/profile', $data);
    }

    public function update_profile()
    {  
        $session = session();
        $user = new userModel();
 
        $fname = $this->request->getVar('fname');
        $lname = $this->request->getVar('lname');
        $email = $this->request->getVar('email');

        $id = $session->get('id');

        $result = $user->where(array('email LIKE' => $email, 'id <>' => $id))->findAll();

        if($result) {

            $session->setFlashdata('msg', 'This email is already exist!');
            return redirect()->back()->withInput();

        } else {
            
            $filename = '';
            if (is_uploaded_file($_FILES['profile']['tmp_name'])) {
                $date       = date('Y_m_d_H_i_s'); 
                $ext        = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                $filename   = 'profile_' . $id . '.' . $ext;
                $path       = APPPATH . '../public/img/' . $filename;
                move_uploaded_file($_FILES['profile']['tmp_name'], $path);
            } else {
                $filename = $session->get('profile');
            }
            
            $data = [
                'fname'     => $fname,
                'lname'     => $lname,
                'email'     => $email,
                'profile'     => $filename,
            ];
            $user->update($id, $data);

            // $db = db_connect();
            // $builder = $db->table('users');
            // $builder->where('id', $id);
            // $builder->update($data);

            $authSession = new SessionConroller();
            $new = $user->where('id', $id)->first();
            $authSession->authorised($new);

            $session->setFlashdata('success', 'Your profile has been updated');
            return redirect()->back()->withInput();
        }
 
    }

    public function update_password()
    {
        $session = session();

        helper(['form']);
        $rules = [
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $user = new userModel();
            
            $id = $session->get('id');

            $data = [
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $user->update($id, $data);

            $session->setFlashdata('pass', 'Your password has been updated');
            return redirect()->back()->withInput();
        } else {
            $data['validation'] = $this->validator;
            echo view('auth/profile', $data);
        }
    }
}
