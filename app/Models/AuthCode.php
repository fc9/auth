<?php

namespace App\Models;

use Laravel\Passport\AuthCode as PassportAuthCode;

class AuthCode extends PassportAuthCode
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'auth_code';
}