@extends('templates.fc9.auth')

@section('title', __('app.shortname'))

@section('after-styles')
    {{--<link rel="stylesheet" href="/vendor/fc9/auth/register.css"/>--}}
@endsection

@section('after-scripts')
    <script src="/vendor/fc9/auth/register.js"></script>
@endsection

{{--
@section('logo')
@endsection
--}}

@section('content')
    <form method="post" action="#" id="sign_up-step3-form">
        <div class="grid-panel-web__header">
            <h5 class="heading text__web-h5 grid-panel-web__title">
                @lang('lang::auth.register.confirm_email.title')
            </h5>
            <h5 class="heading text__web-subtitle grid-panel__subtitle">
                @lang('lang::auth.register.confirm_email.subtitle', ['email' => $email])
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
                <div class="text__web-code mfafield">
                    <div class="mfafield__code mfafield--empty">
                        <div class="mfafield__wrapper">
                            <input type="text" minlength="1" maxlength="1" required="" autocomplete="off" name="type1"
                                   placeholder="?" class="text__web-code mfafield__input" value="{{ old('type1') }}">
                        </div>
                    </div>
                    <div class="mfafield__code mfafield--empty">
                        <div class="mfafield__wrapper">
                            <input type="text" minlength="1" maxlength="1" required="" autocomplete="off" name="type2"
                                   placeholder="?" class="text__web-code mfafield__input" value="{{ old('type2') }}">
                        </div>
                    </div>
                    <div class="mfafield__code mfafield--empty">
                        <div class="mfafield__wrapper">
                            <input type="text" minlength="1" maxlength="1" required="" autocomplete="off" name="type3"
                                   placeholder="?" class="text__web-code mfafield__input" value="{{ old('type3') }}">
                        </div>
                    </div>
                    <div class="mfafield__code mfafield--empty">
                        <div class="mfafield__wrapper">
                            <input type="text" minlength="1" maxlength="1" required="" autocomplete="off" name="type4"
                                   placeholder="?" class="text__web-code mfafield__input" value="{{ old('type4') }}">
                        </div>
                    </div>
                    <div class="mfafield__code mfafield--empty">
                        <div class="mfafield__wrapper">
                            <input type="text" minlength="1" maxlength="1" required="" autocomplete="off" name="type5"
                                   placeholder="?" class="text__web-code mfafield__input" value="{{ old('type5') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" id="submit" class="mobile-button mobile-button__submit mobile-button__submit--disabled"
                disabled="disabled" title="@lang('lang::auth.VERIFY')"></button>
        <div class="grid grid-align-center grid-direction__column grid-panel__links grid-panel-web__links text__web-link">
            @if (Route::has('register-3'))
                <a href="{{ url('register-3') }}">@lang('lang::auth.register.confirm_email.resend_code')</a>
            @endif
            @if (Route::has('forgot-email'))
                <a href="{{ url('forgot-email') }}" target="_blank">@lang('lang::auth.help.cant_access_email')</a>
            @endif
        </div>
    </form>
@endsection
