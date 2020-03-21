<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserView extends Model
{
    /**
     * The database view table.
     *
     * @var string
     */
    protected $table = 'user_view';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'indicator_id', 'person_id', 'created_at', 'deleted_at'];

//    public function user(): BelongsTo
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function person(): BelongsTo
//    {
//        return $this->belongsTo(Person::class);
//    }
//
//    public function membership(): BelongsTo
//    {
//        return $this->belongsTo(Membership::class, 'person_id');
//    }

    public function person()
    {
        return $this->hasOne('App\Models\Person');
    }

    public function indicator()
    {
        return $this->hasOne('App\Models\User', 'indidator_id', 'id');
    }

    public function getAvatarAttribute($value)
    {
        return url('/' . config('auth.uploads.profile') . ($value ?? 'user.jpg'));
    }

//    public function getIndicatorIdAttribute($value)
//    {
//        return $value !== null ? User::find($value)->uuid : null;
//    }

}
