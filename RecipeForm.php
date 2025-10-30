

<?php

class RecipeForm implements StepsInterface {
    protected string $name;
    protected array $ingredients;

    public function __construct($name, $ingredients) {
        $this->name = $name;
        $this->ingredients = $ingredients;

    }

    public function getName() {
        return $this->name;
    }

    public function getIngredients() {
        return $this->ingredients;
    }

    public function getSteps(array $steps):array {
        return $this->steps[] = $steps;

    }
}