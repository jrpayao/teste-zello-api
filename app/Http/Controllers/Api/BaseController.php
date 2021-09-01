<?php

namespace App\Http\Controllers\Api;

use App\Services\BaseService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * @var BaseService
     */
    protected $service;

    /**
     * @var string
     */
    protected $model;

    /**
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(['data' => $this->service->buscarTodos()]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json(['data' => $this->service->find($id)]);
    }

}
