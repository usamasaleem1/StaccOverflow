<div class="card-container">
    <div class="card">
        <div class="img">
        </div>
        <h2
            style="cursor: pointer; margin-top: 25px; margin-left: 30px; color: rgb(1,123,254); text-shadow: 0px 2px 2px rgba(0,0,0,0.2);"
            onclick="window.location.href = '{{ url("/view/" . $question->id)  }}';">
            {{ $question->title  }}
        </h2>
        <p style="text-align: right; margin-right: 30px; margin-bottom: 0px; margin-top: -30px; color: rgba(115, 181, 192, 1.0)">
            by <strong>
                <a
                    href="{{ route("profile", ["id" => $question->user_id]) }}">
                    {{ $question->user->name  }}
                </a>
            </strong>
            &nbsp; {{ $question->created_at->diffForHumans()  }}
            <br/>
        </p>

        <p style="margin-left: 30px; margin-top: 10px; color: rgb(1,123,254)">
            Tags:
            @foreach($question->tags as $tag)
                <a href="{{ url("search/tag/" . $tag->id) }}">{{ $tag->name }}</a>
            @endforeach
        </p>
        <p style="margin-left: 7%; margin-right: 7%; margin-bottom: 4%; color: #000000"
           class="question_content"
           data-lang="{{count($question->tags) > 0 ? $question->tags[0]->name : ""}}">
            {!! $question->content !!}
        </p>

    </div>
</div>
