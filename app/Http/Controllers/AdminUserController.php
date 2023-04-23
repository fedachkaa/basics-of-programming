<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users (){
        $users = User::where('is_admin', 0)->get();
        return inertia('Admin/User/Users', [
            'users' => $users,
        ]);
    }

    public function admins (){
        $admins = User::where('is_admin', 1)->get();
        return inertia('Admin/User/Admins', [
            'admins' => $admins,
        ]);
    }
}
