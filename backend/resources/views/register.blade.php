<html>

<head>
    <link rel="stylesheet" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Sign Up</title>
</head>

<body>
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
</body>
</html>
