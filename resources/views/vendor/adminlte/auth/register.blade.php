@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

<body class="hold-transition register-page">
    <div id="app">
        <div class="register-box">
            <div class="register-logo">
                
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body animated fadeInDown">
                <p class="login-box-msg"><center><img src="{{asset('img/logo.png')}}" height="70"></center></p>
                <form action="{{ url('user/store2') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Username" name="username" style="border-radius: 15px;"/>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" name="password" style="border-radius: 15px;"/>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Nama User" name="nama_user" style="border-radius: 15px;"/>
                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group">
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary" style="border-radius: 15px;">{{ trans('adminlte_lang::message.register') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>

              

                <a href="{{ url('/login') }}" class="text-center">Saya Sudah Punya Akun</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

</body>

@endsection
