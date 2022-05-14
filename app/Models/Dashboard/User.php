<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'created_at', 'updated_at', 'deleted_at'];

    public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function setAccessTokenAttribute($value)
	{
		$this->attributes['access_token'] = hash('sha256', $value);
	}

    public function universities()
    {
        return $this->belongsToMany(University::class, 'user_university', 'user_id', 'university_id');
    }
}
