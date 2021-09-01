<?php

namespace App\Http\Controllers\Api;

use App\Models\Perfil;
use App\Services\PerfilService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PerfilController extends BaseController
{

    public function __construct(PerfilService $perfilService)
    {
        $this->model = Perfil::class;
        $this->service = $perfilService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = Perfil::all();
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
    public function destroy($id)
    {
        $this->service->excluir($id);
        return response()->json(['msg' => 'Dados Excluidos com Sucesso']);
    }
}
