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
        'header' => 'Iniciar sessão',
        'verify' => 'VERIFICAR',
        'remember-me' => 'Manter login',
        'cant-sign-in' => 'Não consegue fazer login?',
        'create-account' => 'Criar conta',
        'create-an-account' => 'Criar uma conta',
        'switch-account' => 'Não é você? Trocar contas.',
        'unavailable-body' => 'Não foi possível fazer sua autenticação no momento',
        'unavailable-header' => 'Não foi possível autenticar',
        'archived-account' => 'Sua conta ficou desabilitada por mais de um ano e, por lei, ela foi arquivada. Para restaurar sua conta, acesse :here.',
        'unavailable-more-info' => 'Não foi possível fazer sua autenticação no momento',
        'rate-limited' => 'Recebemos sua solicitação. Aguarde alguns minutos e tente novamente.',
        'captcha-subhead' => 'Você tentou iniciar a sessão vezes demais. Complete o captcha abaixo.',
        'error' => 'Ocorreu um erro. Tente novamente mais tarde.',
        'error-help' => 'Volte ao seu aplicativo do cliente e tente novamente ou entre em contato com o proprietário e peça suporte.',
        'reauth-current-account' => 'Você está conectado(a) como :username',
    ],

    'sign-up' => [
        'signup' => 'CRIAR UMA CONTA',
        'heading' => 'Mas, primeiro, precisamos de algumas informações.',
        'disabled-body' => 'Estamos trabalhando para resolver o problema. Tente novamente mais tarde.',
        'disabled-retry' => 'Tente novamente.',
        'disabled-status' => 'Ver Status do Serviço',
        'disabled-subtitle' => 'Deixamos Poros demais entrarem aqui!',
        'disabled-title' => 'A criação de conta está indisponível.',
        'requirements-not-met-body' => 'Você não atende aos requisitos mínimos para criar uma conta.',
        'requirements-not-met-subtitle' => 'Ops',
        'requirements-not-met-title' => 'Requisitos não atendidos',
        'rebranded-last-step-heading' => 'Último passo!',
        'rebranded-last-step-subheading' => 'Estamos quase lá.',
        'check-body' => 'Para sua segurança, insira o código que enviamos para :email.',
        'check-email-sent' => 'O e-mail foi reenviado.',
        'please-enter-your-username-and-password-to-proceed' => 'Insira seu nome de usuário e senha para prosseguir.',
        'password-strength-great' => 'Ótima',
        'rebranded-password-strength-okay' => 'OK',
        'password-strength-requirements' => 'A força da senha deve ser "OK" ou superior.',
        'password-strength-too-weak' => 'Muito fraca.',
        'password-subheading' => 'Escolha uma boa senha!',
        'passwords-must-match' => 'As senhas devem ser idênticas.',
        'please-select-a-region' => 'Selecione uma região.',
        'username-or-email' => 'Nome de usuário ou email',
        'login-server-down' => 'Lamentamos, os servidores de login estão temporariamente indisponíveis. Tente novamente mais tarde. Verifique a página de :link-service-status para mais informações.' ,
        'error' => 'Não conseguimos acessar o Serviço de Inscrição no momento. Tente novamente mais tarde.',
        'success' => 'Sucesso! Sua conta foi criada. Redirecionaremos você em breve.',
        'to-login' => 'Já possui uma conta?',
    ],

    'logout' => [
        'redirect-button' => 'Redirecionar agora',
        'success-heading' => 'Sua sessão foi encerrada.',
        'success-subheading' => 'Seu redirecionamento será automático.',
        'logout-loading-description' => 'Isto não deve levar muito tempo. Aguente firme.',
        'logout-loading-heading' => 'Encerrando sua sessão',
        'logout-redirect-button' => 'Redirecionar agora',
        'logout-success-deadend' => 'Você pode fechar esta janela com segurança.',
        'logout-success-heading' => 'Sua sessão foi encerrada.',
        'logout-success-redirect' => ':click-here caso o redirecionamento automático não funcione.',
        'logout-success-subheading' => 'Seu redirecionamento será automático.',
    ],

    'reauth' => [
        'current-account' => 'Você está conectado(a) como :username',
        'heading' => 'Confirme sua senha',
        'switch-account' => 'Não é você? Trocar contas',
    ],

    'multifactor' => [
        'check-body' => 'Para sua segurança, insira o código que enviamos para :email.',
        'resend-code' => 'Reenviar código.',
        'check-email-sent' => 'O e-mail foi reenviado.',
        'attempt-failed' => 'Código incorreto. Tente novamente.',
        'add-to-trusted-devices-with-link' => 'Adicionar este dispositivo aos meus dispositivos confiáveis. Saiba mais',
    ],

    'help' => [
        'support' => 'Suporte',
        'support-site' => '/support',
        'need-help' => 'Precisa de ajuda?',
        'language' => 'Idioma',
        'forgot-password' => 'Recuperar senha',
        'forgot-username' => 'Recuperar nome de usuário',
        'invalid-request' => 'Solicitação inválida.',
        'resend-code' => 'Reenviar código.',
    ],

    'confirm' => [
        'please-confirm' => 'Confirme',
    ],

    'terms' => 'Jurídico',
    'terms-of-service' => 'Termos de Uso',
    'privacy' => 'Privacidade',
    'privacy-policy' => 'Política de Privacidade',
    'service-Terms' => 'Termos de Serviço',
    'to-agree' => 'Concordo com os Termos de Serviço e li e aceito a Política de Privacidade.',
    'rebranded-captcha-legal' => 'Este site é protegido por reCAPTCHA, bem como pela :privacy-policy e pelos :service-terms do Google.',

];
