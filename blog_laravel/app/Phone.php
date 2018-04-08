<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    // https://laravel.com/docs/5.6/eloquent-relationships
    public function contact()
    {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }
}
