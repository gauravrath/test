<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkerProject extends Model
{
    protected $fillable = [
        'project_id','worker_id'
    ];

    
}
