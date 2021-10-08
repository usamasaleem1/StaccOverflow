@extends("layouts.withHeader")

@section("content")
    <div class="container">
        <div class="pt-5 text-white">
            <h1>Post a question</h1>
            <form method="POST" action="{{ route("post_post")  }}">
                @csrf
                <input type="text" name="title" placeholder="title"/>
                <br/>
                <textarea name="content" placeholder="Description"></textarea>

                <button type="submit">Post</button>
            </form>
        </div>
    </div>
@endsection
