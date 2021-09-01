<?php

namespace App\Http\Controllers\Api;

use App\Models\Pessoa;
use App\Services\PessoaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PessoaController extends BaseController
{

    /**
     * @param PessoaService $service
     */
    public function __construct(PessoaService $service)
    {
        $this->model = Pessoa::class;
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json([$this->service->incluirPessoa($request)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        return response()->json(['msg' => 'Dados Atualizados com Sucesso',
            'data' => $this->service->atualizarPessoa($id, $request)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->service->excluirPessoa($id);
        return response()->json(['msg' => 'Dados Excluidos com Sucesso']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function removerVinculoAplicativo($id): JsonResponse
    {
        $this->service->removerVinculoAplicativo($id);
        return response()->json(['msg' => 'Vinculo Excluido com Sucesso']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function inserirVinculoAplicativo(Request $request): JsonResponse
    {
        $data = $this->service->inserirVinculoAplicativo($request->all());
        return response()->json(['msg' => 'Vinculo realizado com sucesso!!', 'data' => $data]);
    }
}
