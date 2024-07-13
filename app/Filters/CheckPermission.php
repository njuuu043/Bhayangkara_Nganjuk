<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckPermission implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = session()->get('userInfo')['role'];
       if($role != 1000 ){
        return redirect()->to(base_url("/"));
       }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    
    }
}