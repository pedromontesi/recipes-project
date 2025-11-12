<?php

class RecipeApi {
    private $ingredient;
    private string $baseUrl = "https://www.themealdb.com/api/json/v1/1/filter.php?i=";

    public function search($ingredient) {
        $this->ingredient = $ingredient;
        $url = $this->baseUrl . urlencode($ingredient);

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['meals'] ?? [];
    }


}

