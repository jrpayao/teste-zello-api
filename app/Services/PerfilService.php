<?php

namespace App\Services;

use App\Repositories\PerfilRepository;

class PerfilService extends BaseService
{
    public function __construct(PerfilRepository $repository){
        $this->repository = $repository;
    }
}
