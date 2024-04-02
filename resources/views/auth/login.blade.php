@extends('layouts.app')

@section('content')
    <div class="login-container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center m-b-md">
                    <h3>PLEASE LOGIN TO APP</h3>
                    <small>This is the best app ever!</small>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <div class="form-group mt-2">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" required value="{{ old('email') }}" name="email" id="username" class="form-control  @error('email') is-invalid @enderror">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required=""  value="" name="password" id="password" class="form-control  @error('password') is-invalid @enderror">
<!--                                <span class="help-block small">Yur strong password</span>-->
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong class="is-invalid">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>
                            <div class="form-group mt-2" >
                                <button class="btn btn-success btn-block w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
