<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmailConfirm extends Model
{
    /**
     * The database table.
     *
     * @var string
     */
    protected $table = 'email_confirm';

    public $primaryKey = 'email';

    public $timestamps = false;

    protected $fillable = [
        'email',
        'token',
    ];

    public function sendLink($email)
    {
        $data['email'] = $email;
        $data['token'] = Str::upper(Str::random(60));

        self::destroy($email);
        self::create($data);

        dispatch(new \Fc9\Auth\Jobs\ConfirmEmailJob($data));
    }

    public static function fogUp($email)
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
