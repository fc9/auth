<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use YourAppRocks\EloquentUuid\Traits\HasUuid;

class User extends Authenticatable
{
    use HasApiTokens, HasUuid, Notifiable;

    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * Attributes that can be assigned in bulk.,
     *
     * @var array
     */
    protected $fillable = [
        'indicator_id',
        'username',
        'email',
        'email_verified_at',
        'password',
        'status',
        //'access_profile',
        'active_at',
        'created_at',
        'updated_at',
    ];

    public $incrementing = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['id', 'password', 'remember_token', 'created_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['email_verified_at' => 'datetime',];

    /**
     * @param $username
     * @return mixed
     */
    public function findForPassport($username)
    {
        $attribute = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $this->where($attribute, $username)->first;
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function getIndicatorIdAttribute($value)
    {
        return $value !== null ? self::find($value)->uuid : null;
    }

    /**
     * Get the person record associated with the user.
     */
    public function person()
    {
        return $this->hasOne('App\Models\Person');
    }

    /**
     * Get the indicator user record associated with the user.
     */
    public function indicator()
    {
        return $this->hasOne('App\Models\User', 'indidator_id', 'id');
    }

//    /**
//     * Get User by scope query.
//     */
//    public function show($uuid)
//    {
//        $user = User::findByUuid($uuid);
//
//        return $user;
//    }

//    public static function usernameIsRouteorURI(string $username)
//    {
//        # Do not match a laravel's reserved route or URI.
//        $routeList = Route::getRoutes();
//        foreach ($routeList as $value) {
//            if ($value->uri() == $username) {
//                return false;
//            }
//        }
//    }

}
