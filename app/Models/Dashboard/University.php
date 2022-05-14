<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class University extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['alpha_two_code', 'country', 'domains', 'name', 'web_pages', 'status_id'];
    protected $hidden = ['pivot', 'status_id', 'created_at', 'updated_at', 'deleted_at'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_university', 'university_id', 'user_id');
    }

    public function setDomainsAttribute(array $value)
    {
        $this->attributes['domains'] = json_encode($value);
    }

    
    public function setWebPagesAttribute(array $value)
    {
        $this->attributes['web_pages'] = json_encode($value);
    }

    public function status()
    {
        return $this->belongsTo(UniversityStatus::class, 'status_id');
    }
}
