<?php

namespace App\Models;

use Laravel\Passport\Client as PassportClient;

class Client extends PassportClient
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'client';
}