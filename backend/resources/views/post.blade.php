@extends("layouts.withHeader")

@section("content")
    <div class="container">
        <div class="pt-5 text-white">
            <link rel="stylesheet" href="css/postQuestion.css">
            <br>
            <br>
            <br>
            <br>
            <h1>Post a question</h1>
            <br>
            <form method="POST" action="{{ route("post_post")  }}">
                @csrf
                {{-- Title box --}}
                <div class="none" style="margin:0 auto;">
                    <input class="search" name="title" type="text" id="search" placeholder="Title" required/>
                </div>
                <br>
                <div class="none">
                    {{-- Question box --}}
                    <textarea required name="content" class="search2" type="text" id="search" placeholder='Explain your question here.

                Protip: add your code as <code> YOUR CODE HERE </code> to format correctly.'></textarea>
                </div>
                <br/>
                <div class="dropdownTag">
                    <select name="label_id" class="dropdownTag-select" required>
                        <option value="-1">Select Tag</option>
                        @foreach(\Illuminate\Support\Facades\DB::table("tags")->orderBy('name', 'asc')->get() as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <br/>
                <div class="container">
                    <button id="button" type="submit"></button>
                </div>
            </form>
        </div>

        <script>
            $(function () {
                $("#button").click(function () {
                    $("#button").addClass("onclic", 250, validate);
                });

                function validate() {
                    setTimeout(function () {
                        $("#button").removeClass("onclic");
                        $("#button").addClass("validate", 450, callback);
                    }, 2250);
                }

                function callback() {
                    setTimeout(function () {
                        $("#button").removeClass("validate");
                    }, 1250);
                }
            });
        </script>
    </div>
@endsection
