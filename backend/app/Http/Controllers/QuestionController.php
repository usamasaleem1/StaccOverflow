<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create(Request $request, AuthController $controller)
    {
        $title    = $request->get("title");
        $content  = $request->get("content");
        $label_id = $request->get("label_id");
        $user     = Auth::user();

        $question          = new Question();
        $question->user_id = $user->id;
        $question->title   = $title;
        $question->content = $content;
        $question->save();
        

        if ($label_id && $label_id != "-1") {
            $question->tags()->attach([$label_id]);
        }


        return $controller->index();
    }
}
