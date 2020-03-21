<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\AuthCode;
use App\Models\PersonalAccessClient;
use App\Models\AccessToken;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $this->configPassportTokens();
        $this->configApi();
    }

    protected function configPassportTokens()
    {
        Passport::routes(/*function ($router) {
            $router->forAccessTokens();
            $router->forPersonalAccessTokens();
            $router->forTransientTokens();*/
        );

        // Configuration Token Lifetimes
        Passport::tokensExpireIn(now()->addMinutes(10));
        Passport::refreshTokensExpireIn(now()->addDays(30));
        Passport::personalAccessTokensExpireIn(now()->addMonths(6));

        // Overriding Default Models
        Passport::useTokenModel(AccessToken::class);
        Passport::useClientModel(Client::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }

    public function configApi()
    {
        \Fc9\Api\Http\Response::addFormatter('json', new  \Fc9\Api\Http\Response\Format\Jsonp);

        app('Fc9\Api\Http\RateLimit\Handler')->extend('authenticated', function ($app) {
            return new \Fc9\Api\Http\RateLimit\Throttle\Authenticated;
        });

        app('Fc9\Api\Transformer\Factory')->setAdapter(function ($app) {
            $fractal = new \League\Fractal\Manager;
            $fractal->setSerializer(new \League\Fractal\Serializer\JsonApiSerializer);
            return new \Fc9\Api\Transformer\Adapter\Fractal($fractal);
        });

        app('Fc9\Api\Exception\Handler')->setErrorFormat([
            'error' => [
                'message' => ':message',
                'errors' => ':errors',
                'code' => ':code',
                'status_code' => ':status_code',
                'debug' => ':debug'
            ]
        ]);
    }
}
