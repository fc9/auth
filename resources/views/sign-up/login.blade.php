@extends('templates.fc9.auth')

@section('title', __('app.shortname'))

@section('after-styles')
    <link rel="stylesheet" href="/vendor/fc9/auth/login.css"/>
@endsection

@section('after-scripts')
    <script src="/vendor/fc9/auth/login.js"></script>
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
                @lang('lang::auth.login.title')
            </h5>
            {{--<h5 class="heading text__web-subtitle grid-panel__subtitle" data-testid="panel-subtitle"></h5>--}}
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
                    <div class="grid grid-fill grid-direction__column">
                        <div class="field field--non-empty field--animate">
                            <div class="field__input field__input--animate">
                                <input type="text" minlength="5" maxlength="45" required="" autocomplete="off"
                                       name="username" placeholder="" spellcheck="false"
                                       class="field__form-input text__ignore-subset" value="{{ old('username') }}">
                                <label class="field__label">@lang('lang::validation.attributes.username')</label>
                                <span class="field__placeholder">@lang('lang::validation.attributes.username')</span>
                                @error('username')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>
                        <div class="field password-field field--non-empty field--animate"
                             style="animation-delay: 0.1s;">
                            <div class="field__input field__input--animate" style="animation-delay: 0.1s;">
                                <input type="password" minlength="8" maxlength="24" required="" autocomplete="off"
                                       name="password" placeholder=""
                                       class="field__form-input text__ignore-subset" value="">
                                <label class="field__label">@lang('lang::validation.attributes.password')</label>
                                <span class="field__placeholder">@lang('lang::validation.attributes.password')</span>
                                @error('password')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <button type="button" tabindex="-1" style="animation-delay: 0.1s;"
                                    class="password-field__password-visibility--hide password-field__password-visibility">
                            </button>
                        </div>
                        <div class="grid grid-justify-space-between grid-direction__row">
                            <div id="mobile-checkbox" class="mobile-checkbox signin-checkbox">
                                <label class="signin-checkbox mobile-checkbox__label" for="checkout-remember">
                                    <input type="checkbox" id="remember" name="remember">
                                    <span class="mobile-checkbox__image"></span>
                                    <span class="mobile-checkbox__text">@lang('lang::auth.login.Remember_me')</span>
                                </label>
                            </div>
                            <div class="grid grid-justify-center grid-direction__column"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" id="submit" class="mobile-button mobile-button__submit mobile-button__submit--disabled"
                disabled="disabled" title="@lang('lang::auth.LOGIN')"></button>
        <div class="grid grid-align-center grid-direction__column grid-panel__links grid-panel-web__links text__web-link">
            @if (Route::has('password.request'))
                <a href="{{ url('login-help') }}">@lang('lang::auth.login.Cant_sign_in')</a>
            @endif
            @if (Route::has('signup'))
                <a href="{{ url('register-1') }}" target="_blank">@lang('lang::auth.login.Create_account')</a>
            @endif
        </div>
    </form>
@endsection
