<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PelangganController extends BaseController
{
    public function index()
    {
        $data =[
            'title' => 'Home'
        ] ;
        return view('user/home', $data);
    }
}
