<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project'
    ];

    
    public function workerproject()
    {
        return $this->belongsToMany('App\User','worker_projects','project_id','worker_id');
    }
}
