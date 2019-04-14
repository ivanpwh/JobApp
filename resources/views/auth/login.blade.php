@extends('layouts.new_app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <section class="hero">
        <div class="hero-body has-text-centered">
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="columns">
                <div class="column"></div>
                <div class="column is-3">
                <div class="field">
                    <label class="label is-pulled-left">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        @if ($errors->has('email'))
                            <input class="input is-danger" type="text" placeholder="john@gmail.com" formControlName="email" name="email" id="email" autofocus>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help is-danger">
                                {{ $errors->first('email') }}
                            </p>
                        @else 
                            <input class="input" type="text" placeholder="john@gmail.com" formControlName="email" name="email" id="email">
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        @endif
                    </div>
                </div>
                
                </div>
                <div class="column"></div>
            </div>
            <div class="columns">
                <div class="column"></div>
                <div class="column is-3">
                <div class="field">
                    <label class="label is-pulled-left">Password:</label>
                    <div class="control has-icons-left has-icons-right">
                        @if ($errors->has('password'))
                            <input class="input is-danger" type="password" formControlName="password" name="password" id="password" placeholder="Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                            <span class="icon is-small is-right">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <p class="help is-danger">
                                {{ $errors->first('password') }}
                            </p>
                        @else 
                            <input class="input" type="password" formControlName="password" name="password" id="password" placeholder="Password">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        @endif
                    </div>
                    <br>
                    <br>
                    <button type="submit" class="button is-primary is-medium is-fullwidth">Login</button>
                </div>

                </div>
                <div class="column"></div>
            </div>
            </form>
        </div>
    </section>


@endsection
