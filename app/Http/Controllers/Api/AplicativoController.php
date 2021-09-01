<?php

namespace App\Http\Controllers\Api;

use App\Models\Aplicativo;
use App\Services\AplicativoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AplicativoController extends BaseController
{

    public function __construct(AplicativoService $service)
    {
        $this->model = Aplicativo::class;
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
        return response()->json([$this->service->incluir($request)]);
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
            'data' => $this->service->atualizar($id, $request)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->service->excluir($id);
        return response()->json(['msg' => 'Dados Excluidos com Sucesso']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function removerVinculoPerfil($id): JsonResponse
    {
        $this->service->removerVinculoPerfil($id);
        return response()->json(['msg' => 'Vinculo Excluido com Sucesso']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function inserirVinculoPerfil(Request $request): JsonResponse
    {
        $data = $this->service->inserirVinculoPerfil($request->all());
        return response()->json(['msg' => 'Vinculo realizado com sucesso!!', 'data' => $data]);
    }
}
