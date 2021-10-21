@extends("layouts.withHeader")

@section("title")
    Search results
@endsection
{{--<link rel="stylesheet" href="{{asset("css/voting.css")}}">--}}

@section("styles")
    <link rel="stylesheet" href="{{asset("css/postQuestion.css")}}">

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

    <style>
        .best_answer_holder {
            font-size: 40px;
        }

        .best_answer_holder .fas {
            color: #DAA520;
        }

        .best_answer_holder:hover {
            color: #DAA520;
        }
    </style>
@endsection

@section("content")
    <div class="container">
        <div class="pt-5 text-white">
            <header class="py-5 mt-5">
                <h1 class="display-4"></h1>
            </header>

            <div class="up-down-vote" style="margin-left: 69.69%; margin-top: -55px">
                <a class="up-vote" href="">
                    <i class="ion-arrow-up-a"></i>
                    {{-- <i class="ion-plus">34</i> --}}
                </a>
                <a class="down-vote" href="">
                    <i class="ion-arrow-down-a"></i>
                    {{-- <i class="ion-minus">6</i> --}}
                </a>
                <div class="up-down-vote-value-wrapper"></div>
            </div>

            @include("components.questionCard", ["question" => $question])

            <br/>
            <h4>{{ $question->questionComments->count()  }} Answers</h4>
            <br/>

            {{-- New comment form --}}
            <form method="POST" action="{{ route("post_comment")  }}">
                @csrf
                <br>
                <div class="none">
                    {{-- Question box --}}
                    <textarea required name="content" class="search2" type="text" id="search" placeholder='Explain your question here.

                Protip: add your code as <code> YOUR CODE HERE </code> to format correctly.'></textarea>
                </div>
                <br/>
                <br/>
                <input type="hidden" name="question_id" value="{{$question->id}}"/>
                <div class="container">
                    <button id="button" type="submit"></button>
                </div>
            </form>
            <br/>
            <br/>

            @foreach ($question->questionComments->sortByDesc("is_best") as $comment)
                @include("components.commentCard", ["comment" => $comment, "tag" => count($question->tags) > 0 ? $question->tags[0]->name : ""])
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


        async function markAsBestAnswer(comment_id, questionId) {
            const response = await fetch("{{route("mark_best_answer")}}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{csrf_token()}}",
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    comment_id: comment_id,
                    question_id: questionId
                })
            });

            if (response.ok) {
                window.location.reload();
            }
        }
    </script>
@endsection
