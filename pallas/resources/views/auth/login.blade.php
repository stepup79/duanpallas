@extends('frontend.layouts.master')

@section('custom-css')
<style>
.main-login {
    margin-top: 80px;
}
</style>
@endsection

@section('main-content')
<div class="container mb-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card main-login">
                <div class="card-header">{{ __('pallas.login') }}</div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nv_taiKhoan') ? ' has-error' : '' }}">
                            <label for="nv_taiKhoan" class="col-md-4 control-label">{{ __('pallas.accountname') }}</label>

                            <div class="col-md-6">
                                <input id="nv_taiKhoan" type="text" class="form-control" name="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}" required autofocus>

                                @if ($errors->has('nv_taiKhoan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nv_taiKhoan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nv_matKhau') ? ' has-error' : '' }}">
                            <label for="nv_matKhau" class="col-md-4 control-label">{{ __('pallas.password') }}</label>

                            <div class="col-md-6">
                                <input id="nv_matKhau" type="password" class="form-control" name="nv_matKhau" required>

                                @if ($errors->has('nv_matKhau'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nv_matKhau') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="nv_ghinhodangnhap" {{ old('nv_ghinhodangnhap') ? 'checked' : '' }}/> {{ __('pallas.rememberlogin') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('pallas.login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('pallas.forgotpassword') }}?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
