<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    public function answers()
    {
        return $this->hasMany('App\Answer', 'id', 'task_id');
    }
}
