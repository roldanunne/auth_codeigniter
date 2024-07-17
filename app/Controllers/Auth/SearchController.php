<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SearchController extends BaseController
{
    public function index()
    {
        echo view('auth/search');
    }

    public function search()
    {  
        $search = $this->request->getVar('search');

        $session = session();
        // Set up and execute the curl process
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://pixabay.com/api/?key=44974626-86371b20f6a6d49c2477b8356&q=".$search,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        $result = json_encode($response);


        // die($result);
        session()->set('result',$response);
        // if(count($response)){
        //     $session->setFlashdata('success', 'Has data');
        // } else {
        //     $session->setFlashdata('success', 'No Data');
        // }
        return redirect()->back()->withInput();
 
    }

}
