@extends("layouts.main")
@section("content")

    <form action="/register" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email"/>
        <input type="text" name="name" placeholder="Name"/>
        <input type="password" name="password" placeholder="Password"/>
        <input type="submit" value="Register"/>
    </form>

@endsection
