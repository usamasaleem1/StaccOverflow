@extends("layouts.withHeader")

@section("title")
    Stacc Overflow
@endsection

@section("styles")
    <style>
        code {
            display: block;
            white-space: pre;
            background-color: #1a202ccc;
            max-width: 50%;
            border-radius: 7px;
            padding: 10px;
            margin-top: 5px;
            color: white;
        }
    </style>
    <script src="{{asset("js/codeFormatters.js")}}"></script>
@endsection

@section("content")
    <!-- For demo purpose -->
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
                <p class="lead">Sorted by created date</p>
            </div>

            @foreach($questions as $question)
                <div class="card-container">
                    <div class="card">
                        <div class="img">
                        </div>
                        <h2 style="margin: 25px">
                            {{ $question->title  }}
                        </h2>
                        <p style="margin-left: 30px">
                            by <strong>{{ $question->user->name  }}</strong>
                            &nbsp; {{ $question->created_at->diffForHumans()  }}
                            <br/>
                            Tags:
                            @foreach($question->tags as $tag)
                                <span>{{ $tag->name }}</span>
                            @endforeach
                        </p>
                        <p style="margin-left: 30px" class="question_content"
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



