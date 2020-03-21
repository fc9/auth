<?php

namespace App\Models;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

class PersonalAccessClient extends PassportPersonalAccessClient
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'personal_access_client';
}