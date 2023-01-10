<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ordercontroller extends Controller
{

    public function checkout(){

        return view('User.Orders');
    }


    public function orders(){

        return view('User.Orders');
    }
}
