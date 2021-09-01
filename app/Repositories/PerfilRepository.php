<?php

namespace App\Repositories;

use App\Models\Perfil;

class PerfilRepository extends BaseRepository
{
    protected $model;

    public function __construct(Perfil $model)
    {
        $this->model = $model;
    }
}
