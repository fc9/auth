<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PasswordReset extends Model
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'password_reset';

    public $primaryKey = 'email';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
    ];

    public static function cloudMail($email)
    {
        $rouse = strpos($email, '@');
        $dot = strpos($email, '.');
        return substr($email, 0, 3) .
            str_repeat('*', $rouse - 4) .
            substr($email, $rouse, 3) .
            str_repeat('*', $dot - ($rouse + 3)) .
            substr($email, $dot);
    }
}
