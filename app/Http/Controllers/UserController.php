<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function account_request_view()
    {
        $user = User::where('status', 'submitted')->get();
        return view('pages.account-request.index',[
            'users' => $user,
        ]);
    }
}
