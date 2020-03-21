<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'person';

    /**
     * Attributes that can be assigned in bulk.,
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'first_name',
        'last_name',
        'avatar',
        'birth_date',
        'type',
        'created_at',
        'updated_at',
    ];

    public function getAvatarAttribute($value)
    {
        return url('/' . config('auth.uploads.profile') . ($value ?? 'user.jpg'));
    }

    /**
     * Get the address record associated with the person.
     */
    public function address() #TODO: noTest
    {
        return $this->hasOne('App\Models\Address');
    }

    /**
     * Get the membership record associated with the person.
     */
    public function membership() #TODO: noTest
    {
        return $this->hasOne('App\Models\Membership');
    }

}
