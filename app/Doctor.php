<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public function profile()
    {
        $this->hasOne(Profile::class);
    }
}
