<?php

class RecipeApi
{

    private $search;

    private $baseUrl = "www.themealdb.com/api/json/v1/1/";

    private $response;


    public function __construct($search)
    {
        if ($search) {
            $this->search = $search;
            $this->makeRequest();
        }
    }

    private function makeRequest() {
        $url = $this->baseUrl . "filter.php?i=" . urlencode($this->search);

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_USERAGENT => 'RecipeAPI/1.0'
        ]);

        $this->response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


    }

}