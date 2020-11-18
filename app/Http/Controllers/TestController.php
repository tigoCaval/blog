<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Domain\Permissions\CertifyUser;

class TestController extends Controller
{
    
       protected $check;

       public function __construct(CertifyUser $check)
       {
           $this->middleware('auth');   
           $this->check = $check;
       }

        public function index()
        {
           $this->check->checkPermission('index'); 
           return  "ok"; 
        }


}
