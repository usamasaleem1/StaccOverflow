@extends("layouts.withoutHeader")
@section("title")
Sign up
@endsection
@section("styles")
<link rel="stylesheet" href="css/signup.css">
@endsection
@section("content")
    <div class="main">
        <p class="sign" Align="center">Sign Up</p>
        <p class="title" Align="center">Make an Account and Start Asking</p>
        <img src="https://static.thenounproject.com/png/538846-200.png" alt="User Icon" width="50" class="center"/>
        <form class="form1" action="/register" method="POST">
            @csrf
            <input class="un " type="text" Align="center" placeholder="Email" name="email">
            <input class="un " type="text" Align="center" placeholder="Username" name="name">
            <input class="pass" type="password" Align="center" placeholder="Password" name="password">
            <input class="pass" type="password" Align="center" placeholder="Confirm Password" name="confirm_password">
            <a class="submit" onclick="document.getElementsByClassName('form1')[0].submit();">Sign up</a>
            <p class="forgot" Align="center"><a href="signin">Already have an account? Sign in here</a></p>
        </form>
    </div>
@endsection
