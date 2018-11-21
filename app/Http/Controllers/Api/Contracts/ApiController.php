<?php

namespace App\Http\Controllers\Api\Contracts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    protected $statusCode;

    public function respondNoFound($message)
    {
        return $this
            ->setStatusCode(Response::HTTP_NOT_FOUND)
            ->respondWithError($message);
    }

    public function respondInvalidParams($message)
    {
        return $this
            ->setStatusCode(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->respondWithError($message);
    }

    public function respondInternalError($message)
    {
        return $this
            ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)
            ->respondWithError($message);
    }

    public function respondItemCreated($message)
    {
        return $this
            ->setStatusCode(Response::HTTP_CREATED)
            ->respondWithSuccess($message);
    }

    /**
     * @return mixed
     */
    private function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param mixed $statusCode
     */
    private function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    private function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode()
            ]
        ]);
    }

    private function respondWithSuccess($message)
    {
        return $this->respond([
            'success' => true,
            'message' => $message
        ]);
    }

    private function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

}
