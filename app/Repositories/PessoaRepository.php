<?php

namespace App\Repositories;

use App\Models\Pessoa;

class PessoaRepository extends BaseRepository
{
    /** @var Pessoa */
    protected $model;

    /**
     * @param Pessoa $model
     */
    public function __construct(Pessoa $model)
    {
        $this->model = $model;
    }
}
