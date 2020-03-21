<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.ico">

    <!-- Template CSS -->
    <link rel="stylesheet" href="/vendor/fc9/auth/main.css"/>
    <link rel="stylesheet" href="/vendor/fc9/auth/alert.css"/>
    @yield('after-styles')

    <script type="application/json" id="config">{
            "recaptcha": "6LcGEv8SAAAAAPUTwLPaiMfnJNfedmGj4oww8ITT",
            "theme": "",
            "country": "@lang('app.country')",
            "lang": "@lang('app.lang')"
        }
    </script>
</head>
<body class="@yield('body-classes')">

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader" style="display:none">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>

<!-- ============================================================== -->
<!-- Content -->
<!-- ============================================================== -->
<div class="grid grid-direction__column">
    <div class="grid grid-direction__column grid-page grid-page-web theme-base theme__display-page theme__section-signin
        multifactor-rso-login-page">

        <div class="grid grid-direction__row grid-page-web__header">
            @section('logo')
                <svg class="base-logo grid-page-web__logo" viewBox="0 0 56 56" fill="none"
                     aria-labelledby="base-logo-id-0-title">
                    <title id="base-logo-id-0-title">@lang('app.fullname')</title>
                    <circle cx="28" cy="28" r="28" class="base-logo__fist"></circle>
                    <path clip-path="url(#base-logo-id-0-clip)" class="base-logo__fill" fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M56 28C56 43.464 43.464 56 28 56C12.536 56 0 43.464 0 28C0 12.536 12.536 0 28 0C43.464 0 56 12.536 56 28ZM30.6443 12.8494L12.0087 21.6539L14.9021 34.9072H18.6976L18.0443 25.4183L18.6354 25.2316L20.9065 34.9072H24.8576L24.7021 23.365L25.2932 23.1783L27.2843 34.9072H31.4843L32.4487 20.9383L33.0398 20.7828L34.0665 34.9072H39.6043L41.5332 15.4939L30.6443 12.8494ZM27.4711 40.3516L26.0711 36.805L39.3556 37.4583L38.7956 43.1516L27.4711 40.3516Z">
                    </path>
                    <defs>
                        <clipPath id="base-logo-id-0-clip">
                            <path d="M0 0H56V56H0V0Z"></path>
                        </clipPath>
                    </defs>
                </svg>
            @show
            <div class="grid-page-web__language" data-testid="language-selector-mobile">
                <div class="language-selector text__web-button3">
                    @include('auth::layouts.components.language-selector')
                </div>
            </div>
        </div>

        <div class="grid grid-direction__row grid-page-web__content">
            <div class="grid grid-direction__column grid-page-web__wrapper">
                <div class="grid grid-direction__column grid-size-17 grid-panel-web grid-panel grid-panel-web-has-links">
                    @yield('content')
                </div>
            </div>
            <div class="text__web-caption grid-page-web__content-footer">
                @lang('lang::auth.captcha_legal', [
                'link1' => '<a href="https://policies.google.com/privacy?hl=pt_BR" target="_blank" rel="noopener noreferrer">' . __('lang::auth.Privacy_Policy') . '</a>',
                'link2' => '<a href="https://policies.google.com/terms?hl=pt_BR" target="_blank" rel="noopener noreferrer">' . __('lang::auth.Service_Terms') . '</a>'
                ])
            </div>
        </div>

        <div class="grid grid-direction__row grid-page-web__footer-wrapper">
            <div class="grid-page-web__language" data-testid="language-selector-web">
                <div class="language-selector text__web-button3">
                    @include('auth::layouts.components.language-selector')
                </div>
            </div>
            <div class="grid grid-direction__row grid-page-web__footer">
                <footer class="footer-menu">
                    <nav class="footer-menu-links text__web-link">
                        <span>
                            <a href="/support" target="_blank" class="footer-menu__link text__web-link" target="_blank"
                               rel="noopener noreferrer">
                                @lang('lang::auth.Support')
                            </a>
                            <span class="footer-menu-links__dot">•</span>
                        </span>
                        <span>
                            <a href="/privacy-notice" target="_blank" class="footer-menu__link text__web-link"
                               rel="noopener noreferrer">
                                @lang('lang::auth.Privacy_Policy')
                            </a>
                            <span class="footer-menu-links__dot">•</span>
                        </span>
                        <span>
                            <a href="/terms-of-service" target="_blank" class="footer-menu__link text__web-link"
                               target="_blank" rel="noopener noreferrer">
                                @lang('lang::auth.Terms_of_Service')
                            </a>
                        </span>
                    </nav>
                    <p class="text__web-caption">@lang('app.copyright', ['year' => date('Y'), 'company'=> __('app.fullname')])</p>
                </footer>
            </div>
        </div>

    </div>
</div>

<!-- ============================================================== -->
<!-- All Scripts -->
<!-- ============================================================== -->
{{--<script src="/vendor/jquery/jquery.min.js"></script>--}}
@yield('after-scripts')

</body>
</html>
