<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'password', 'access_token'];

    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function setAccessTokenAttribute($value)
	{
		$this->attributes['access_token'] = hash('sha256', $value);
	}
}
