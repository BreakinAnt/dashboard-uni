<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserUniversity extends Pivot
{
    use HasFactory;

    protected $fillable = ['university_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}