<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';

    public $primaryKey = 'person_id';

    protected $fillable = [
        'company_id',
        'person_id',
        'contract_read',
        'graduate',
        'status',
        'created_at',
        'updated_at',
    ];
}
