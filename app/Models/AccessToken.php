<?php

namespace App\Models;

use Laravel\Passport\Token as PassportToken;

class AccessToken extends PassportToken
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'access_token';
}