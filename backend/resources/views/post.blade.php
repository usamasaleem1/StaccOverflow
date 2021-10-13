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
                    <input class="search" type="text" id="search" placeholder="Title"/>
                </div>
                <br>
                <div class="none">
                {{-- Question box --}}
                <textarea name="content" input class="search2" type="text" id="search" placeholder='Explain your question here. 
                
                Protip: add your code as <code> YOUR CODE HERE </code> to format correctly.'></textarea>
                </div>
                </div>
                <br/>
                


                {{-- <div class="dropdown">
                    <select name="one" class="dropdown-select">
                    <option value="">Select…</option>
                    <option value="1">Option #1</option>
                    <option value="2">Option #2</option>
                    <option value="3">Option #3</option>
                    </select>
                </div> --}}
                <div class="dropdownTag">
                <select name="label_id" class="dropdownTag-select">
                    <option value="-1">Select Tag</option>
                    @foreach(\Illuminate\Support\Facades\DB::table("tags")->orderBy('name', 'asc')->get() as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
                </div>
                <br>


                <script>
                    $(function() {
                    $( "#button" ).click(function() {
                        $( "#button" ).addClass( "onclic", 250, validate);
                    });

                    function validate() {
                        setTimeout(function() {
                        $( "#button" ).removeClass( "onclic" );
                        $( "#button" ).addClass( "validate", 450, callback );
                        }, 2250 );
                    }
                        function callback() {
                        setTimeout(function() {
                            $( "#button" ).removeClass( "validate" );
                        }, 1250 );
                        }
                    });
                </script>

            <div class="container">
            <button id="button"></button>
            </div>

            </form>
        </div>
    </div>

@endsection
