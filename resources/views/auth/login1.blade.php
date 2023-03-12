@extends('layouts.master')
@section('title', 'Events')
@push('styles')
<style>

.input-group-addon {
   color: #fff;
   background-color: #337ab7;
}


.form-control, .input-group-addon {
   border-radius: 0px;
}
label{
  text-align: left !important;
}
</style>
@endpush
@section('content')
<div class="container">
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title text-center"><i class="fas fa-sign-in-alt"></i> Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" action="{{url('login')}}" method="post">
                @csrf
                    <input type="hidden" name="reward_token" value="{{$link ?? ''}}">
                    @if(Session::has('success'))
                            <p class="alert alert-danger mt-2">{{ Session::get('error') }}</p>
                    @endif

                    <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control input-sm" name="email" value="" placeholder="username or email">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group col-sm-offset-3 col-sm-7">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control input-sm" name="password" placeholder="password">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls text-center">
                           <button id="btn-signup" type="submit" class="btn btn-primary btn-sm"> Login <i class="fas fa-sign-in-alt"></i>  </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account!
                                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-5 col-md-offset-4 col-sm-7 col-sm-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title text-center">Sign Up <i class="fa fa-user-plus"></i></div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>
            <div class="panel-body" >
                <form id="signupform" class="form-horizontal" action="{{url('create')}}"  method="post" role="form">
                 @csrf
                    @if(Session::has('error'))
                            <p class="alert alert-danger mt-2">{{ Session::get('error') }}</p>
                    @endif

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Email</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control input-sm" name="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-4 control-label">First Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control input-sm" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-4 control-label">Last Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control input-sm" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control input-sm" name="passwd" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-4 col-md-8">
                            <button id="btn-signup" type="submit" class="btn btn-primary btn-sm"> Sign Up <i class="fa fa-user-plus"></i></button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Do you have an account!
                                <a href="#" onClick="$('#signupbox').hide(); $('#loginbox').show()">
                                    Login Here
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
