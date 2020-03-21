@extends('templates.fc9.auth')

@section('title', __('app.shortname'))

@section('after-styles')
    {{--<link rel="stylesheet" href="/vendor/fc9/auth/login.css"/>--}}
@endsection

@section('after-scripts')
    {{--<script src="/vendor/fc9/auth/login.js"></script>--}}
@endsection

{{--
@section('logo')
@endsection
--}}

@section('content')
    <div class="grid-panel-web__header">
        <h5 class="heading text__web-h5 grid-panel-web__title">
            @lang('lang::auth.login.disabled.title')
        </h5>
    </div>
    <div class="grid grid-align-center grid-justify-space-between grid-fill grid-direction__column grid-panel-web__content grid-panel__content">
        <div class="grid grid-fill grid-direction__column text__web-body2">
            <p class="text__web-error">
                @lang('lang::auth.login.disabled.text', ['link' => url('service-status')])
            </p>
        </div>
    </div>
    <div class="grid grid-align-center grid-direction__column grid-panel__links grid-panel-web__links text__web-link">
        @if (Route::has('home'))
            <a href="{{ route('home') }}" target="_blank">@lang('lang::auth.BACK')</a>
        @endif
    </div>
@endsection
