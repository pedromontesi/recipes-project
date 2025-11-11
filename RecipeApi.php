<?php

class RecipeApi {
    private $search;
    private $baseUrl = "https://www.themealdb.com/api/json/v1/1/search.php?s=";

    public function search($search) {
        $this->search = $search;
        $url = $this->baseUrl . urlencode($search);

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['ingredient'] ?? [];
    }


}
$recipeApi = new RecipeApi();
print_r($recipeApi->search('milk'));