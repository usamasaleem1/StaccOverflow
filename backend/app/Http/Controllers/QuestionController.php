<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionVote;
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


        return $controller->index(new QuestionController());
    }

    public function all()
    {
        return Question::all()->sortBy("created_at", SORT_REGULAR, true);
    }

    public function vote(Request $request)
    {
        // Remove all previous votes done by this user on this question
        QuestionVote::where([
            ["user_id", "=", Auth::id()],
            ["question_id", "=", $request->get("question_id")]
        ])->delete();

        if ($request->get("type") != QuestionVote::NONE) {
            $vote              = new QuestionVote();
            $vote->user_id     = Auth::user()->id;
            $vote->question_id = $request->get("question_id");
            $vote->type        = $request->get("type");
            $vote->save();
        }
        return response("", 200);
    }
}
