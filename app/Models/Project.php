<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'repo_url',
        'type_id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
