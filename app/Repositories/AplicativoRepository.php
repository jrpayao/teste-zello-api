<?php

namespace App\Repositories;

use App\Models\Aplicativo;

class AplicativoRepository extends BaseRepository
{
    protected $model;

    public function __construct(Aplicativo $model)
    {
        $this->model = $model;
    }
}
