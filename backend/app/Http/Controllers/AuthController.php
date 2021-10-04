<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $email    = $request->get("email");
        $password = $request->get("password");
        $name     = $request->get("name");

        // Validate the input
        $validator = Validator::make($request->all(), [
            "email" => "required|email|unique:users",
            "name"  => "required|max:100"
        ]);

        // If the validator fails
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Otherwise it is ok, all user to database
        $user           = new User();
        $user->email    = $email;
        $user->password = Hash::make($password);
        $user->name     = $name;
        $user->save();

        Auth::login($user);

        return redirect("index");
    }

}
