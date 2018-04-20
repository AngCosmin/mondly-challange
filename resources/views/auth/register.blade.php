@extends('layouts.app')

@section('content')
    <section id="wrapper">
        <div class="login-register" style="background-image:url(theme/assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                    <h3 class="box-title m-b-20">Sign Up</h3>
                    <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        @include('partials.messages')

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" value="{{ old('name') }}" type="text" autofocus required placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" value="{{ old('email') }}" type="email" required="" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password" required placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-success p-t-0">
                                    <input id="checkbox-signup" type="checkbox"  class="filled-in chk-col-light-blue">
                                    <label for="checkbox-signup"> I agree to all <a href="javascript:void(0)">Terms</a></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                Already have an account? <a href="{{ route('login') }}" class="text-info m-l-5"><b>Sign In</b></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
