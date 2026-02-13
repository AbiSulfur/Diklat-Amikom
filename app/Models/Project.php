<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre',
        'description',
        'platform',
        'status',
    ];
    public function developers()
    {
        return $this->belongsToMany(Developer::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }

    public function bugs()
    {
        return $this->hasMany(Bug::class);
    }
}
