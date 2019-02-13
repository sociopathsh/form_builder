<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    const LIST_STATUS = [
        self::STATUS_ACTIVE => self::STATUS_ACTIVE,
        self::STATUS_INACTIVE => self::STATUS_INACTIVE,
    ];

    const TYPE_ADMIN = 'admin';
    const TYPE_USER = 'user';

    const LIST_TYPE = [
        self::TYPE_ADMIN => self::TYPE_ADMIN,
        self::TYPE_USER => self::TYPE_USER,
    ];

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->getAttribute('status');
    }
}
