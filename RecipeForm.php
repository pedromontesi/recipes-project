

<?php

require_once 'StepsInterface.php';

class RecipeForm implements StepsInterface {
    private array $ingredient;

    public function __construct($ingredient) {
        $this->ingredient = $ingredient;

    }

    public function getIngredient() {
        return $this->ingredient;
    }

    public function getSteps(): array
    {
        return $this->steps = $steps = [];
    }
}