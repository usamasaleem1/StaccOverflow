<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Class QuestionController
 *
 * @author  Shadi Jiha
 * @date    17 Oct. 2021
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    public function index(QuestionController $controller)
    {
        return redirect("")->with(["questions" => $controller->all()]);
    }

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
        $user->avatar   = "https://avatars.dicebear.com/api/avataaars/$name.svg";
        $user->bio      = "Hi 👋 my name is $name";
        $user->save();

        Auth::login($user);

        return $this->index(new QuestionController());
    }

    public function signin(Request $request)
    {
        $email    = $request->get("name");
        $password = $request->get("password");

        // Get user from DB
        $user = User::where("name", $email)->first();
        if (!$user) {
            return redirect("signin")->withErrors(["This email does not exist"]);
        }

        // Password matches the user's
        if (Hash::check($password, $user->password)) {


            // Backward compatibility
            $this->checkAvatarAndBio($user);

            Auth::login($user);

            return $this->index(new QuestionController());
        }

        // Otherwise invalid password
        return redirect("signin")->withErrors(["Invalid password"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return $this->index(new QuestionController());
    }

    public function checkAvatarAndBio(User $user)
    {
        $name = $user->name;
        if ($user->avatar == null) {
            $user->avatar = "https://avatars.dicebear.com/api/avataaars/$name.svg";
            $user->save();
        }

        if ($user->bio == null) {
            $user->bio = "Hi 👋 my name is $name";
            $user->save();
        }

        if ($user->location == null) {
            $user->location = request()->ip();
        }
    }
}
