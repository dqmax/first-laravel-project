<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user(){
        $users = User::get();
        foreach($users as $user){
            dump($user->name);
        }
    }
}
