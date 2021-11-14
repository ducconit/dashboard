@extends('dashboard::layouts.guest')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('dashboard:index') }}"><b class="mr-2">Admin</b>Dashboard</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('Login admin page') }}</p>

                <form action="{{ route('dashboard:login') }}" id="login-form" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Username') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="{{ __('Password') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    {{ __('Remember me') }}
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-12 mt-2">
                            <button type="submit" id="btn-login"
                                    class="btn btn-primary btn-block">{{ __('Log in') }}</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function () {
            let btnLogin = $('#btn-login');
            btnLogin.click(function (e) {
                e.preventDefault();
                let self = $(this);
                self.prop('disabled');
                axios.post("{{ route('dashboard:login') }}")
                    .then(function (response) {
                        let res = response.data;
                        console.log(res)
                    })
            })
        })
    </script>
@endpush
