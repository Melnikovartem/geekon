<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    public function user()
    {
        return $this->hasOne('App\User', 'user_id', 'id');
    }

    public function task()
    {
        return $this->hasOne('App\Task', 'task_id', 'id');
    }
}
