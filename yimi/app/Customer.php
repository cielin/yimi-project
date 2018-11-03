<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\ProductCollection;

class Customer extends Authenticatable
{
    use Notifiable;
    use \Dirape\Token\DirapeToken;

    protected $table = 'customers';
    protected $DT_Column = 'api_token';
    protected $DT_settings = ['type' => DT_Unique, 'size' => 60, 'special_chr' => false];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];

    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function collection()
    {
        return $this->hasMany('App\ProductCollection', 'customer_id');
    }

    public function addresses()
    {
        return $this->hasMany('App\CustomerAddress', 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'customer_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\CustomerComment', 'customer_id');
    }
}
