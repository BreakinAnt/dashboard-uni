<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversitySuggestion extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['alpha_two_code', 'country', 'domains', 'name', 'web_pages', 'user_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
