<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UniversityStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function universities()
    {
        return $this->hasMany(University::class, 'status_id');
    }
}
