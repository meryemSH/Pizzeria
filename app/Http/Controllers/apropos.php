<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apropos extends Controller
{
    public function apropos(){
        return view('Aprops.aboutUs');
    }
}
