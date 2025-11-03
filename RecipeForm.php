

<?php

class RecipeForm implements StepsInterface {
    protected array $ingredient;

    public function __construct($ingredient) {
        $this->ingredient = $ingredient;

    }

    public function getIngredient() {
        return $this->ingredient;
    }

    public function getSteps(array $steps):array {
        return $this->steps[] = $steps;

    }
}