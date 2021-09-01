<?php

namespace App\Interfaces;

use App\Models\BaseModel;

interface RepositoryInterface
{
    public function getModel();

    public function create($data);
}
