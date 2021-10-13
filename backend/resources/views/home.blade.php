@extends("layouts.withHeader")

@section("title")
    Stacc Overflow
@endsection
<link rel="stylesheet" href="css/voting.css">
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
                <p style="margin-top: -25px; margin-bottom: 25px"; class="lead">Sorted by latest</p>
            </div>

            @foreach($questions as $question)
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


                <div class="card-container">
                    <div class="card">
                        <div class="img">
                        </div>
                        <h2 style="margin-top: 15px; margin-left: 30px; color: rgb(1,123,254); text-shadow: 0px 2px 2px rgba(0,0,0,0.2);">
                            {{ $question->title  }}
                        </h2>
                        {{-- by admin --}}
                        <p style="text-align: right; margin-right: 30px; margin-bottom: 0px; margin-top: -40px; color: rgba(115, 181, 192, 1.0)">
                            by <strong>{{ $question->user->name  }}</strong>
                            &nbsp; {{ $question->created_at->diffForHumans()  }}
                            <br/>
                        </p>
                        
                        <p style="margin-left: 30px; margin-top: 10px; color: rgb(1,123,254)">
                        Tags:
                            @foreach($question->tags as $tag)
                                <span>{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <p style="margin-left: 30px; margin-right: 30px; color: #000000" class="question_content"
                           data-lang="{{count($question->tags) > 0 ? $question->tags[0]->name : ""}}">
                            {!! $question->content !!}
                        </p>

                    </div>
                </div>
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



