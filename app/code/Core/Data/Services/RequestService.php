<?php

namespace Core\Data\Services;

class RequestService
{
    public function getJson()
    {
        try {
            $requestData = [];
            $params = file_get_contents("php://input");
            $requestData = json_decode($params, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
        }
        return $requestData;
    }
}
