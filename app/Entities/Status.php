<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use \Lookitsatravis\Listify\Listify;

    public $timestamps = false;

    public $fillable = [
        'title'
    ];

    public function __construct(array $attributes = array(), $exists = false) {

        parent::__construct($attributes, $exists);

        $this->initListify([
            'column' => 'sort'
        ]);
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
}
