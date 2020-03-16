{{-- @extends('layouts.master')
​
@section('title')
    <title>Login</title>
@endsection
​
@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
​
            <form method="POST" action="{{ route('login') }}">
                @csrf
                @if (session('error'))
                    @alert(['type' => 'danger'])
                        {{ session('error') }}
                    @endalert
                @endif
                <div class="form-group has-feedback">
                    <input type="email"
                        name="email"
                        class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        placeholder="{{ __('E-Mail Address') }}"
                        value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"> {{ $errors->first('email') }}</span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password"
                        name="password"
                        class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} "
                        placeholder="{{ __('Password') }}">
                    <span class="fa fa-lock form-control-feedback"> {{ $errors->first('password') }}</span>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                </div>
            </form>
​
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fa fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fa fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
​
            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="#" class="text-center">Register a new membership</a>
            </p>
        </div>
    </div>
@endsection --}}


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group has-feedback"><label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input
                                                name="email"
                                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                value="{{ old('email') }}"
                                                type="email"
                                                placeholder="Enter email address" />
                                                <span class="fa fa-envelope form-control-feedback"> {{ $errors->first('email') }}</span>
                                            </div>


                                            <div class="form-group has-feedback"><label class="small mb-1" for="inputPassword">Password</label>
                                                <input  name="password"
                                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} "
                                                type="password"
                                                placeholder="Enter password" />
                                                <span class="fa fa-lock form-control-feedback"> {{ $errors->first('password') }}</span>
                                            </div>



                                            <div class="form-group has-feedback">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="reset">Forgot Password?</a><button type="submit" class="btn btn-primary"> Login </button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2019</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

