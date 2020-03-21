<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'login' => [
        'header' => 'Sign in',
        'verify' => 'VERIFY',
        'remember-me' => 'Keep login',
        'cant-sign-in' => 'Can\'t login?',
        'create-account' => 'Create account',
        'create-an-account' => 'Create an account',
        'switch-account' => 'Isn\'t it you? Exchange accounts. ',
        'unavailable-body' => 'We were unable to authenticate at this time',
        'unavailable-header' => 'Couldn\'t authenticate',
        'archived-account' => 'Your account has been disabled for more than a year and, by law, it has been archived. To restore your account, go to :here. ',
        'unavailable-more-info' => 'We were unable to authenticate at this time',
        'rate-limited' => 'We have received your request. Wait some minutes and try again.',
        'captcha-subhead' => 'You tried to log in too many times. Complete the captcha below. ',
        'error' => 'An error has occurred. Try again later.',
        'error-help' => 'Go back to your client application and try again or contact the owner and ask for support.',
        'reauth-current-account' => 'You are logged in as :username',
    ],

    'sign_up' => [
        'signup' => 'CREATE AN ACCOUNT',
        'heading' => 'But first, we need some information.',
        'disabled-body' => 'We are working to resolve the issue. Try again later.',
        'disabled-retry' => 'Try again.',
        'disabled-status' => 'View Service Status',
        'disabled-subtitle' => 'We let too many Pores in here!',
        'disabled-title' => 'Account creation is unavailable.',
        'requirements-not-met-body' => 'You do not meet the minimum requirements to create an account.',
        'requirements-not-met-subtitle' => 'Oops',
        'requirements-not-met-title' => 'Requirements not met',
        'rebranded-last-step-heading' => 'Last step!',
        'rebranded-last-step-subheading' => 'We\'re almost there.',
        'check-body' => 'For your security, enter the code we sent to :email.',
        'check-email_sent' => 'The email has been resent.',
        'please-enter-your-username-and-password-to-proceed' => 'Enter your username and password to proceed.',
        'password-strength-great' => 'Great',
        'rebranded-password-strength-okay' => 'OK',
        'password-strength-requirements' => 'The password strength must be "OK" or greater.',
        'password-strength-too-weak' => 'Very weak.',
        'password-subheading' => 'Choose a good password!',
        'passwords-must-match' => 'Passwords must be identical.',
        'please-select-a-region' => 'Select a region.',
        'username-or-email' => 'Username or email',
        'login-server-down' => 'Sorry, login servers are temporarily unavailable. Try again later. Check the :link-service-status page for more information. ',
        'error' => 'We are unable to access the Subscription Service at this time. Try again later.',
        'success' => ' Success! Your account was created. We will redirect you soon. ',
        'to-login' => 'Already have an account?',
    ],

    'logout' => [
        'redirect-button' => 'Redirect now',
        'success-heading' => 'Your session has ended.',
        'success-subheading' => 'Your redirection will be automatic.',
        'logout-loading-description' => 'This shouldn\'t take too long. Hold tight.',
        'logout-loading-heading' => 'Ending your session',
        'logout-redirect-button' => 'Redirect now',
        'logout-success-deadend' => 'You can safely close this window.',
        'logout-success-heading' => 'Your session has ended.',
        'logout-success-redirect' => ':click-here if automatic redirection doesn\'t work.',
        'logout-success-subheading' => 'Your redirection will be automatic.',
    ],

    'reauth' => [
        'current-account' => 'You are logged in as :username',
        'heading' => 'Confirm your password',
        'switch-account' => 'Isn\'t it you? Exchange accounts',
    ],

    'multifactor' => [
        'check-body' => 'For your security, enter the code we sent to :email.',
        'resend-code' => 'Resend code.',
        'check-email-sent' => 'The email has been resent.',
        'attempt-failed' => 'Incorrect code. Try again.',
        'add-to-trusted-devices-with-link' => 'Add this device to my trusted devices. Know more',
    ],

    'help' => [
        'support' => 'Support',
        'support-site' => '/support',
        'need-help' => 'Need help?',
        'language' => 'Language',
        'forgot-password' => 'Recover password',
        'forgot-username' => 'Retrieve username',
        'invalid-request' => 'Invalid request.',
        'resend-code' => 'Resend code.',
    ],

    'confirm' => [
        'please-confirm' => 'Confirm',
    ],

    'terms' => 'Legal',
    'terms-of-service' => 'Terms of Use',
    'privacy' => 'Privacy',
    'privacy-policy' => 'Privacy Policy',
    'service-Terms' => 'Terms of Service',
    'to-agree' => 'I agree with the Terms of Service and I have read and accept the Privacy Policy.',
    'rebranded-captcha-legal' => 'This site is protected by reCAPTCHA as well as by :privacy-policy and Google\'s :service-terms.',

];
