<?php

namespace App\traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Trait ResponseTrait
 * @package App\traits
 */
trait ResponseTrait
{
    /**
     * Return a new JSON response from the application.
     *
     * @param mixed  $result
     * @param string $successMessage
     * @param int    $status                 Status code
     * @param bool   $sendWithArrayStructure true to makeResponseArray
     * @param string $resultCallableMethod   method name to $result execute
     *
     * @return JsonResponse
     */
    public function sendResponse(
        $result,
        $successMessage = '',
        $status = Response::HTTP_OK,
        $sendWithArrayStructure = true,
        $resultCallableMethod = ''
    ) {
        if ($result instanceof Exception) {
            $body = $this->makeResponseArray(false, '', $result->getMessage(), $result->getCode());

            return response()->json($body, Response::HTTP_BAD_REQUEST);
        }

        $result = !empty($resultCallableMethod) ? $result->{$resultCallableMethod}() : $result;

        $body = ($sendWithArrayStructure && !($result instanceof LengthAwarePaginator)) ?
            $this->makeResponseArray(true, $result, $successMessage) : $result;

        return response()->json($body, $status);
    }

    /**
     * Make the response array to be used in a JSON response
     *
     * @param bool   $success
     * @param array  $data
     * @param string $message
     * @param string $code
     *
     * @return array
     */
    public function makeResponseArray($success = true, $data = [], $message = '', $code = '')
    {
        $response = [
            'success' => $success,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        if (!empty($code)) {
            $response['code'] = $code;
        }

        return $response;
    }
}
