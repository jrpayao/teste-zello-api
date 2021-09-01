<?php

namespace App\Services;

use App\Repositories\AplicativoRepository;

class AplicativoService extends BaseService
{
    public function __construct(AplicativoRepository $repository){
        $this->repository = $repository;
    }
}
