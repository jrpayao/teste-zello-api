<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public $relationships = [];

    /**
     * @var array
     */
    protected $appends = [
        'id'
    ];

    /**
     * @return int
     */
    public function getIdAttribute()
    {
        return $this->getKey();
    }
}
