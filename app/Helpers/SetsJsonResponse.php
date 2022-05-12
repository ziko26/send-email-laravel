<?php

namespace App\Helpers;


trait SetsJsonResponse
{
    /**
     * Sets `success` key along with data and returns json response.
     */
    public function setSuccessResponse($data = [], $statusCode = 200)
    {
        return $this->setJsonResponse(array_merge($data, ['success' => true]), $statusCode);
    }

    /**
     * Sets json response with given data and status code.
     */
    public function setJsonResponse($data, $statusCode = 200)
    {
        return response($data, $statusCode, ['Content-Type', 'application/json']);
    }
}