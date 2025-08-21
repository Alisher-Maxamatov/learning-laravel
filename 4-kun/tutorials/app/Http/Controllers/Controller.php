<?php

namespace App\Http\Controllers;

use App\Models\User;

abstract class Controller
{

}
$user = User::find(1);
$posts = $user->posts;
