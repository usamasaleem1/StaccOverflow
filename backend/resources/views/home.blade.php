@extends("layouts.withHeader")

@section("title")
    Stacc Overflow
@endsection

{{-- This is suppose to be inside the @section("styles") block but whatever --}}
<link rel="stylesheet" href="{{ asset("css/voting.css")  }}">

@section("styles")
    <style>
        code {
            display: block;
            white-space: pre;
            background-color: #1a202ccc;
            max-width: 60%;
            border-radius: 7px;
            padding: 10px;
            margin-top: 5px;
            color: white;
        }
    </style>
    <script src="{{asset("js/codeFormatters.js")}}"></script>
    <script>
        // ALL constants here
        const CSRF_TOKEN = "{{  csrf_token() }}";
        const QUESTION_VOTING_ROUTE = "{{ route("question_vote")  }}";
        const SIGN_IN_ROUTE = "{{ route("login")  }}";
        const UP = {{\App\Models\QuestionVote::UPVOTE}};
        const DOWN = {{\App\Models\QuestionVote::DOWNVOTE}};
        const IS_LOGGED = {{\Illuminate\Support\Facades\Auth::check() == true ? "true" : "false"}};
    </script>
    <script src="{{ asset("js/questionVotingLogic.js")  }}"></script>
@endsection

@section("content")
    <div class="container">
        <div class="pt-5 text-white">
            <header class="py-5 mt-5">
                <h1 class="display-4">Stacc Overflow</h1>
                <p class="lead mb-0">Testing this page functionality.</p>
                <p class="lead mb-0">Made by
                    <a href="https://github.com/usamasaleem1/SOEN341/" class="text-white" target="_blank">
                        <u>Team at SOEN 341</u></a>
                </p>
            </header>

            <div class="py-1">
                <p style="margin-top: -25px; margin-bottom: 25px" ; class="lead">Sorted by latest</p>
            </div>

            @foreach($questions as $question)
                {{-- The voting stuff is here --}}
                @php
                    $votes = $question->questionVotes;
                    $userVote = $votes->firstWhere("user_id", Auth::id())
                @endphp
                <div class="up-down-vote" style="margin-left: 50px;margin-right: 30px;margin-top: -15px">
                    <a class="up-vote">

                        @if ($userVote != null && $userVote->type == \App\Models\QuestionVote::UPVOTE)
                            <i class="ion-arrow-up-a"
                               onclick="questionVote({{$question->id}}, {{\App\Models\QuestionVote::NONE}})"></i>

                        @else
                            <i class="ion-arrow-up-a gray"
                               onclick="questionVote({{$question->id}}, {{\App\Models\QuestionVote::UPVOTE}})"></i>
                        @endif

                        <i class="ion-plus">{{ $votes->filter(function ($value) {return $value->type == \App\Models\QuestionVote::UPVOTE;})->count()  }}</i>
                    </a>

                    <a class="down-vote">

                        @if ($userVote != null && $userVote->type == \App\Models\QuestionVote::DOWNVOTE)
                            <i class="ion-arrow-down-a"
                               onclick="questionVote({{$question->id}}, {{\App\Models\QuestionVote::NONE}})"></i>
                        @else
                            <i class="ion-arrow-down-a gray"
                               onclick="questionVote({{$question->id}}, {{\App\Models\QuestionVote::DOWNVOTE}})"></i>
                        @endif

                        <i class="ion-minus">{{ $votes->filter(function ($value) {return $value->type == \App\Models\QuestionVote::DOWNVOTE;})->count()  }}</i>
                    </a>
                    <div class="up-down-vote-value-wrapper"></div>
                </div>


                @include("components.questionCard", ["question" => $question])
            @endforeach
        </div>
    </div>


    <script>
        const codeDOMs = document.querySelectorAll("p[class=question_content] code");

        for (const code of codeDOMs) {
            let content = code.innerText;

            // Get the correct language formatter
            let attribute = code.parentNode.getAttribute("data-lang").toLowerCase();

            for (const formatter in LANG_TO_FORMATTER) {
                if (attribute === formatter) {
                    content = LANG_TO_FORMATTER[formatter].format(content);
                }
            }
            code.innerHTML = content;
        }
    </script>
@endsection
