<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCase extends Model
{
    public function ProjectCase(){
        return $this->belongsTo('App\Models\ProjectCase');
    }

}
