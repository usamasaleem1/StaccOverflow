<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function searchByTag(Request $request, Tag $tag)
    {
        $questions = Question::whereHas('tags', function ($q) use ($tag) {
            $q->whereIn('tag_id', [$tag->id]);
        })->orderBy('created_at', 'desc')->get();


        return view("search", [
            "questions" => $questions,
            "query"     => "Tag ".$tag->name
        ]);
    }

    public function searchByAuthor(Request $request, int $user_id)
    {
        $user = User::find($user_id);
        if ($user == null) {
            return view("search", [
                "questions" => [],
                "query"     => "Author not found"
            ]);
        }

        $questions = Question::where("user_id", $user->id)->orderBy('created_at', 'desc')->get();
        return view("search", [
            "questions" => $questions,
            "query"     => "Author ".$user->name
        ]);
    }

}
