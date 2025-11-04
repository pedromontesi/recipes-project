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

    private function makeRequest()
    {
        $url = $this->baseUrl . "filter.php?i=" . urlencode($this->search);


        // create a new cURL resource
        $ch = curl_init();


        // Set multiple options for a cURL transfer
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_USERAGENT => 'RecipeAPI/1.0'
        ]);

        // Executa uma sessão cURL
        $this->response = curl_exec($ch);

        //Get information regarding a specific transfer, neste caso, The last response code
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // Se curl_error = True,retorna uma string contendo o último erro da sessão atual
        if (curl_error($ch)) {
            throw new Exception("Erro na requisição: " . curl_error($ch));
        }
        curl_close($ch);

        if ($httpCode !== 200) {
            throw new Exception("HTTP Error: " . $httpCode);
        }

        $this->data = json_decode($this->response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("Erro ao decodificar JSON: " . json_last_error_msg());
        }
    }

    public function search($search)
    {
        $this->search = $search;
        $this->makeRequest();
        return $this;
    }

    public function getSearch()
    {
        return $this->search;
    }

    public function getMeals()
    {
        return $this->data['meals'] ?? [];
    }

    public function getFirstMeal()
    {
        $meals = $this->getMeals();
        return $meals[0] ?? null;
    }

    public function getMealNames()
    {
        $meals = $this->getMeals();
        $names = [];

        foreach ($meals as $meal) {
            $names[] = $meal['strMeal'] ?? 'Nome não disponível';
        }

        return $names;
    }

    public function getMealById($id)
    {
        $url = $this->baseUrl . "lookup.php?i=" . urlencode($id);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        return $data['meals'][0] ?? null;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function getData()
    {
        return $this->data;
    }

    public function hasResults()
    {
        return !empty($this->data['meals']);
    }

}

$recipeApi = new RecipeApi("milk");
$meals = $recipeApi->getMeals();
print_r($meals);



