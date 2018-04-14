<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    // https://laravel.com/docs/5.6/eloquent-relationships
    public function phones()
    {
        return $this->hasMany('App\Phone', 'contact_id', 'id');
    }

    public function websites()
    {
        return $this->hasMany('App\Website', 'contact_id', 'id');
    }


}
