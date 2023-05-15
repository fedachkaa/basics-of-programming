<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return inertia('Auth/Register');
    }

    public function store(Request $request)
    {
        $user = User::create( $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
        ]));

        Auth::login($user);
        event(new Registered($user));

        return redirect()->route('home')->with('success', 'Майже готово! Щоб завершити процес реєстрації та активувати ваш обліковий запис, ми просимо вас підтвердити свою електронну пошту. Лист підтвердження вже надіслано.');
    }

    public function destroy()
    {

    }
}
