<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/login.css">
<script src="/js/jquery.js"></script>
<script defer src="/js/login.js"></script>



</head>
<body>
@include('master.header')
    
<img src="images/menu.png" id="menu" alt="">
@if(session('login_check'))
<script>alert("be sure from your info")</script>

@endif

<!--  start of header   -->
<!-- <div class="header">
<img src="images/albert.jpg" alt="logo">
<ul>
    <li> <a href="index.html">Home </a> </li>
    <li> <a href="items.html">Items </a> </li>
    <li> <a href="contact.html">Contact Us </a> </li>
    <li> <a href="login.html">Login </a> </li>
    <li> <a href="signup.html">Signup </a> </li>
    
</ul>
</div> -->
<!-- end of header -->


<!-- start of login part -->
<div class="login_parent">

    <div class="login_part">
        <h1>Login now</h1>
        {!! Form::open(['url' => 'login/save']) !!}
        <input type="email" name="email"  placeholder="Email">
        <input type="password" name="pass" onkeyup="password()" id="t_password" placeholder="*****">
        <p style="color: red;" id="err_password">Password error</p>
        <button>Login</button>
        <hr>
        <p>if you don't have account
            <a href="/signups">Signup now</a> ?
        </p>
        <a href="/forget">forget password</a>
        <div class="space"></div>
    </div>

</div>
{!! Form::close() !!}


<!-- end of login part -->







</body>
</html>