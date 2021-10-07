@extends("layouts.withHeader")

@section("title")
    Stacc Overflow
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
                        </p>
                        <p style="margin-left: 30px">
                            {!! $question->content !!}
                        </p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection



