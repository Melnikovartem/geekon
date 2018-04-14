<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'websites';

    // https://laravel.com/docs/5.6/eloquent-relationships
    public function contact()
    {
        return $this->hasOne('App\Contact', 'id', 'contact_id');
    }

}
