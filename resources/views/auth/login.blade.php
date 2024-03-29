<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
<div class="container smlg">
    <div class="row">
        <!-- <div class="col-md-6 login-setup-left">
            <div class="rw-1">
                <div class="login-top-img">
                    <a href="home.html"><img src="image/logo.png" alt=""></a>
                </div>
                <div class="col-md-12 my-fb">
                    <ul>
                        <li>
                            <span>
                                <small><a href=""><i class="fa-brands fa-facebook"></i></a></small>
                                <span class="ctr">
                                    <a href="">Continue with Facebook</a>
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 my-google">
                    <ul>
                        <li>
                            <span>
                                <small><a href=""><img src="image/google-icon.png" alt=""></a></small>
                                <span class="ctr">
                                    <a href="">Continue with Google</a>
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 my-apple">
                    <ul>
                        <li>
                            <span>
                                <small><a href=""><i class="fa-brands fa-apple"></i></a></small>
                                <span class="ctr">
                                    <a href="">Continue with Apple</a>
                                </span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
        <div class="col-md-12 login-setup-right">
            <div class="rw-2">
                <div class="col-md-12 login-top">
                    <h1>Login</h1>
                    <p>Don't have an account? Create your account,
                        it takes less than a minute.</p>
                </div>
                <div class="col-md-12 my-fb">
                    <ul>
                        <li>
                                <span>
                                    <small><a href=""><i class="fa-brands fa-facebook"></i></a></small>
                                    <span class="ctr">
                                        <a href="">Continue with Facebook</a>
                                    </span>
                                </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 my-google">
                    <ul>
                        <li>
                                <span>
                                    <small><a href=""><img src="{{asset('assets/image/google-icon.png')}}" alt=""></a></small>
                                    <span class="ctr">
                                        <a href="">Continue with Google</a>
                                    </span>
                                </span>
                        </li>
                    </ul>
                </div>
                <form id="loginform" class="form-horizontal" role="form" action="{{url('login')}}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <input type="email" name="email" id="" placeholder="Your email address">
                    </div>
                    <div class="col-md-12">
                        <input type="password" name="password" id="" placeholder="Password">
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <input type="submit" value="LOGIN">
                        </div>
                        <div class="col-md-7 pass-rec">
                            <p>Recover password</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
