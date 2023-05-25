<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller

{
   public function index()

   {
    $data = array(
        'title' => 'Home page'
    );
    // return view('login',$data);
    return view('home',$data);
   }

}
