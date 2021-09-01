<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\BaseModel;


class BaseRepository implements RepositoryInterface
{
    /** @var BaseModel */
    protected $model;

    /**
     * @return BaseModel
     */
    public function getModel()
    {
        return $this->model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
}
