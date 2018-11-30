<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $fillable = [
        'title',
        'status_id',
        'time',
        'description'
    ];

    public function status()
    {
        return $this->belongsTo(\App\Entities\Status::class);
    }

}
