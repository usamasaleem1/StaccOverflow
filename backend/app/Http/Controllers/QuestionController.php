<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionComment;
use App\Models\QuestionVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class QuestionController
 *
 * @author  Shadi Jiha
 * @date    17 Oct. 2021
 * @package App\Http\Controllers
 */
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

    public function view(Request $request, Question $q)
    {
        return view("view", [
            "question" => $q
        ]);
    }

    public function comment(Request $request)
    {
        $question_id = $request->get("question_id");
        $user_id     = Auth::id();


        $comment              = new QuestionComment();
        $comment->question_id = $question_id;
        $comment->user_id     = $user_id;
        $comment->content     = $request->get("content");
        $comment->save();

        return redirect()->back();
    }

    public function bestAsnwer(Request $request)
    {
        // Only proceed if the logged in user is the author of the question
        $question = Question::find($request->get("question_id"));
        $comment  = QuestionComment::find($request->get("comment_id"));

        if (Auth::id() != $question->user->id) {
            return response("", 401);
        }

        // Get the current best answer on the question
        $currents = $question->questionComments->filter(function ($com) {
            return $com->is_best;
        });

        foreach ($currents as $current) {
            $current->is_best = false;
            $current->save();
        }

        // Now if the request comment is is equal to the previous
        // best answer id, that means that the user wants to cancel the previous best answer
        // in the case don't do anything
        if (!$currents->contains("id", $comment->id)) {
            $comment->is_best = true;
            $comment->save();
        }

        return response("", 200);
    }
}
