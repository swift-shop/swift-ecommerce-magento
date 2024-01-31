<?php

namespace Tool\Data\Services;

class RequestService
{
    public function getJson()
    {
        try {
            $a = 1 / 3;
            $requestData = [];
            $params = file_get_contents("php://input");
            $requestData = json_decode($params, true, 512, JSON_THROW_ON_ERROR);
        } catch (\JsonException $e) {
        }
        return $requestData;
    }
}
