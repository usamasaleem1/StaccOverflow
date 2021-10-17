<div class="best_answer_holder" onclick="markAsBestAnswer({{$comment->id}}, {{$comment->question->id}})">
    @if ($comment->is_best)
        <i class="fas fa-star"></i>
    @elseif(\Illuminate\Support\Facades\Auth::id() == $comment->question->user_id)
        <i class="far fa-star"></i>
    @endif
</div>

<div class="card-container">
    <div class="card">

        <div class="img">

        </div>
        <p style="text-align: right; margin-right: 30px; margin-bottom: 0px; margin-top: -30px; color: rgba(115, 181, 192, 1.0)">
            by <strong>
                <a
                    href="{{ url("search/author/" . $comment->question->user_id) }}">
                    {{ $comment->user->name  }}
                </a>
            </strong>
            &nbsp; {{ $comment->created_at->diffForHumans()  }}
            <br/>
        </p>

        <p style="margin-left: 7%; margin-right: 7%; margin-bottom: 4%; color: #000000"
           class="question_content"
           data-lang="{{ $tag }}">
            {!! $comment->content !!}
        </p>
    </div>
</div>
