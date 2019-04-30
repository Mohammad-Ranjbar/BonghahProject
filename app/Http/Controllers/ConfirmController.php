<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    //

    public function confirmEmail($token)
    {
        $user =  User::whereToken($token)->firstOrFail();

        $user->verified = true;

        $user->token = null;

        $user->save();

        flash()->success('Good New','you are logged in.');
    }


}
