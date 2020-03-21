@extends('auth::resources.views.layouts.main')

@section('title', __('lang::app.name'))

@section('after-styles')
    {{--<link rel="stylesheet" href="/vendor/fc9/auth/home.css"/>--}}
@endsection

@section('after-scripts')
    {{--<script src="/vendor/fc9/auth/home.js"></script>--}}
@endsection

{{--
@section('logo')
@endsection
--}}

@section('content')
    <form method="post" action="#" id="login-form">
        @csrf
        <div class="grid-panel-web__header">
            <h5 class="heading text__web-h5 grid-panel-web__title">
                @lang('lang::auth.home.title')
            </h5>
            <h5 class="heading text__web-subtitle grid-panel__subtitle" data-testid="panel-subtitle">
                @lang('lang::auth.home.subtitle', ['Company' => __('lang::app.name')])
            </h5>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="grid grid-align-center grid-justify-space-between grid-fill grid-direction__column grid-panel-web__content grid-panel__content">
            <div class="grid grid-fill grid-direction__column text__web-body2">
                <div class="grid grid-align-center grid-justify-space-between grid-fill grid-direction__column">
                    <div class="grid grid-fill grid-direction__column" style="padding-top: 2rem">
                        <button type="submit" id="submit" title="@lang('lang::auth.BEGIN')" edisabled="disabled"
                                class="mobile-button mobile-button__primary mobile-button__primary--disabled">
                            @lang('lang::auth.BEGIN')
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-align-center grid-direction__column grid-panel__links grid-panel-web__links text__web-link">
            @if (Route::has('password.request'))
                <a href="{{ url('login-help') }}">@lang('lang::auth.login.Cant_sign_in')</a>
            @endif
            @if (Route::has('signup'))
                <a href="{{ url('register-1') }}" target="_blank">@lang('lang::auth.sign_up.to_login')</a>
            @endif
        </div>
    </form>
@endsection