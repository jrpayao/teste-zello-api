<?php

namespace App\Services;

use App\Models\BaseModel;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BaseService
{
    protected $repository;

    /**
     * @param $id
     * @return BaseModel|Builder|Builder[]|Collection|Model
     */
    public function find($id, $columns = ['*'])
    {
        return $this->repository->getModel()->findOrFail($id, $columns);
    }

    /**
     * @param Request $request
     * @return BaseModel | Exception
     */
    public function incluir(Request $request)
    {
        $post = $request->all();
        return DB::transaction(function () use ($post) {
            try {
                return $this->repository->create($post);
            } catch (Exception $exception) {
                return $exception;
            }
        });
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function atualizar($id, Request $request)
    {
        $post = $request->all();

        return DB::transaction(function () use ($id, $post) {
            try {
                $modelObj = $this->find($id);
                $modelObj->update($post);
                return $this->find($id);
            } catch (Exception $exception) {
                return $exception;
            }
        });
    }

    /**
     * @param $id
     */
    public function excluir($id): void
    {
        DB::transaction(function () use ($id) {
            $modelObj = $this->find($id);
            $modelObj->delete();
        });
    }

    /**
     * @return object
     */
    public function buscarTodos(): object
    {
        return $this->repository->getModel()->get();
    }
}
