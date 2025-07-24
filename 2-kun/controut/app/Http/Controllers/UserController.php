<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($user=null)
    {
        return view('show',[
            'username' => $user
        ]);
    }
    public function list()
{
    $user = [
        'Komil',
        'Shomil',
        'shoqosim'
    ];
    return view('list',compact('user'));
}
}
