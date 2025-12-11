<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f6f5f7;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }

        h1 {
            font-weight: bold;
            margin: 0;
        }

        p {
            font-size: 14px;
            font-weight: 100;
            line-height: 20px;
            letter-spacing: .5px;
            margin: 20px 0 30px;
        }

        span {
            font-size: 12px;
        }

        a {
            color: #0e263d;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 14px 28px rgba(0, 0, 0, .2), 0 10px 10px rgba(0, 0, 0, .2);
            position: relative;
            overflow: hidden;
            width: 768px;
            max-width: 100%;
            max-height: 90vh;
            min-height: 620px;
            height: auto;
            padding-bottom: 40px;
        }

        .form-container form {
            background: #fff;
            display: flex;
            flex-direction: column;
            padding: 60px 50px 40px;
            height: auto;
            justify-content: flex-start;
            align-items: center;
            text-align: center;
        }

        .social-container {
            margin: 20px 0;
        }

        .social-container a {
            border: 1px solid #008ecf;
            border-radius: 50%;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            margin: 0 5px;
            height: 40px;
            width: 40px;
        }

        .form-container input {
            background: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        button {
            border-radius: 20px;
            border: 1px solid #008ecf;
            background: #008ecf;
            color: #fff;
            font-size: 12px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(.95);
        }

        button:focus {
            outline: none;
        }

        button.ghost {
            background: transparent;
            border-color: #fff;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: auto;
            transition: all .6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            z-index: 1;
            opacity: 0;
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform .6s ease-in-out;
            z-index: 100;
        }

        .overlay {
            background: #ff416c;
            background: linear-gradient(to right, #008ecf, #008ecf) no-repeat 0 0 / cover;
            color: #fff;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-panel {
            position: absolute;
            top: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 0 40px;
            height: 100%;
            width: 50%;
            text-align: center;
            transform: translateY(0);
            transition: transform .6s ease-in-out;
        }

        .overlay-right {
            right: 0;
            transform: translateY(0);
        }

        .overlay-left {
            transform: translateY(-20%);
        }

        /* Move signin to right */
        .container.right-panel-active .sign-in-container {
            transform: translateY(100%);
        }

        /* Move overlay to left */
        .container.right-panel-active .overlay-container {
            transform: translateX(-100%);
        }

        /* Bring signup over signin */
        .container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
        }

        /* Move overlay back to right */
        .container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        /* Bring back the text to center */
        .container.right-panel-active .overlay-left {
            transform: translateY(0);
        }

        /* Same effect for right */
        .container.right-panel-active .overlay-right {
            transform: translateY(20%);
        }
    </style>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form class="form mt-0" action="{{ route('auth.store') }}" method="POST">
            @csrf
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div>
                <span>or use your email for registration</span>
                <input type="text" name="name" id="name" class="form-control-sm" placeholder="Name">
                <input type="email" name="email" id="email" class="form-control-sm" placeholder="Email">
                <input type="password" name="password" id="password" class="form-control-sm" placeholder="Password">
                <input type="password" name="password_confirmation" id="confirm-password" class="form-control-sm"
                       placeholder="Confirm Password">
                <button type="submit" class="mt-2">Sign Up</button>
            </div>
        </form>
    </div>
    <div class="form-container sign-in-container">
        <form action="{{route('auth.authenticate')}}" method="POST">
            @csrf
            <h1>Sign In</h1>
            <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your account</span>
            <input type="email" name="email"  placeholder="Email" required class="form-control-sm"/>
            <input type="password" name="password" placeholder="Password" required class="form-control-sm"/>

            <input type="checkbox" name="remember"> Remember me
            <a href="#">Forgot your password?</a>
            <button type="submit">Sign In</button>
            <p>admin@gmail.com<br>admin</p>
        </form>
    </div>
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>To keep connected with us please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Hello, Friend!</h1>
                <p>Enter your personal details and start journey with us</p>
                <button class="ghost" id="signUp">Sign Up</button>
            </div>
        </div>
    </div>
</div>

<script>
    const container = document.getElementById('container');

    @if ($errors->any())
    @if (request()->getPathInfo() === '/auth/register')
    container.classList.add('right-panel-active');
    @endif
    @endif

    document.getElementById('signUp')?.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    document.getElementById('signIn')?.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
