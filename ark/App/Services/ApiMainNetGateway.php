<?php


namespace Ark\App\Services;


class ApiMainNetGateway extends ApiGateway
{
    protected const API_URL = "https://explorer.ark.io/api/";

    public function getUrl(){
        $this->call('/test');
    }
}
