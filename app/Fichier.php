<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    /**
     * @var mixed|string
     */
   // private $name;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
