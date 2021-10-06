<html>

<head>
    <link rel="stylesheet" href="css/signin.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Sign in</title>
</head>

<body>
<div class="main">
    <p class="sign" Align="center">Sign In</p>
    <p class="title" Align="center">It's Not a Bug, It's a Feature</p>
    <img src="https://static.thenounproject.com/png/538846-200.png" alt="User Icon" width="50" class="center"/>
    <form class="form1" id="myform" action="/signin" method="POST">
        @csrf
        <input class="un " type="text" Align="center" placeholder="Username" name="name">
        <input class="pass" type="password" Align="center" placeholder="Password" name="password">
        <a class="submitSignIn" onclick="document.getElementById('myform').submit();">Sign in</a>
        <a class="submitSignUp" href="register">Sign up</a>
        <p class="forgot" Align="center"><a href="#">Forgot Password?</a></p>
    </form>
</div>

</body>

</html>
