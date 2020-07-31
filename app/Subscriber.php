<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $fillable = [
        'email', 'name', 'project_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
