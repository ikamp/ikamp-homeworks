@extends('layouts.app')

@section('content')
    <style>
        #container {
            margin-top: 100px;
        }

        body {
            background-color: darkred;
        }

        #center{
            margin-left: 400px;
            background-color:whitesmoke;
            height: 300px;
            width: 400px;
            border-radius: 10px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        #panel{
            margin: 50px;
            padding: 20px;
        }
        #submit{
            background-color: darkorange;
            border-radius: 10px;
            height: 30px;
            width: 80px;
        }
    </style>

    <div class="container" id="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div id="center">
                    <div class="panel panel-default" id="panel">
                        <div class="panel-heading">Giriş Yap</div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Adres</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email"
                                               value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Şifre</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password"
                                               required>

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
                                                <input type="checkbox"
                                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Beni Hatırla
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button id="submit" type="submit" class="btn btn-primary">
                                            Giriş Yap
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Parolanızı mı unuttunuz?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
