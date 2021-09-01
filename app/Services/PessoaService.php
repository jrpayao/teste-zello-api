<?php

namespace App\Services;

use App\Models\AplicativoPessoa;
use App\Models\BaseModel;
use App\Repositories\PessoaRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PessoaService extends BaseService
{
    public function __construct(PessoaRepository $repository,
                                AplicativoPessoa $vinculoAppModel)
    {
        $this->repository = $repository;
        $this->vinculoAppModel = $vinculoAppModel;
    }


    public function removerVinculoAplicativo($id)
    {
        AplicativoPessoa::destroy($id);
    }

    public function inserirVinculoAplicativo($request)
    {
        try {
            $pessoaId = $request['pessoaId'];
            $aplicativos = $request['aplicativoId'];

            $vinculosAntigos = $this->vinculoAppModel->where('pessoa_id', $pessoaId);
            $vinculosAntigos->delete();

            foreach ($aplicativos as $app) {
                $data = ['pessoa_id' => $pessoaId, 'aplicativo_id' => $app];
                $data = $this->vinculoAppModel->create($data);
            }
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }

    /**
     * @param Request $request
     * @return BaseModel | Exception
     */
    public function incluirPessoa(Request $request)
    {
        $post = $request->all();

        return DB::transaction(function () use ($post) {
            try {

                $pessoa = $this->repository->create($post);
                foreach ($post['aplicativos'] as $app) {
                    $data = ['pessoa_id' => $pessoa->id, 'aplicativo_id' => $app];
                    $vinculo = $this->vinculoAppModel->create($data);
                }
                return $vinculo;
            } catch (Exception $exception) {
                return $exception;
            }
        });
    }

    public function excluirPessoa($id){
        DB::transaction(function () use ($id) {
            $vinculosAntigos = $this->vinculoAppModel->where('pessoa_id', $id);
            $vinculosAntigos->delete();

            $modelObj = $this->find($id);
            $modelObj->delete();
        });
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function atualizarPessoa($id, Request $request)
    {
        $post = $request->all();
        ;
        return DB::transaction(function () use ($id, $post) {
            try {
                $vinculosAntigos = $this->vinculoAppModel->where('pessoa_id', $id);
                $vinculosAntigos->delete();
                 $modelObj = $this->find($id);
                $modelObj->update($post);
                foreach ($post['aplicativos'] as $app) {
                    $data = ['pessoa_id' => $id, 'aplicativo_id' => $app];
                    $vinculo = $this->vinculoAppModel->create($data);
                }
                return $this->find($id);
            } catch (Exception $exception) {
                return $exception;
            }
        });
    }
}
