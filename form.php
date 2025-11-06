<?php

require_once "RecipeForm.php";
require_once "RecipeApi.php"; // importante incluir

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Any Recipe - Find Your Recipe!</title>
</head>
<body>
<div>
    <form method="GET">
        <label for="ingredients">Ingredientes</label>
        <input id="ingredients"
               name="ingredients"
               type="text"
               placeholder="Ex.: Ovos, Leite, Manteiga."
               value="<?= htmlspecialchars($_GET['ingredients'] ?? '') ?>">
        <button type="submit">Buscar</button>
    </form>
</div>

<?php
if (!empty($_GET['ingredients'])) {
    try {
        $ingredient = trim($_GET['ingredients']);
        $recipeApi = new RecipeApi($ingredient);
        $meals = $recipeApi->getMeals();

        if (!empty($meals)) {
            echo "<h2>Receitas encontradas para: " . htmlspecialchars($ingredient) . "</h2>";
            echo "<ul>";
            foreach ($meals as $meal) {
                echo "<li>";
                echo "<strong>" . htmlspecialchars($meal['strMeal']) . "</strong><br>";
                echo "<img src='" . htmlspecialchars($meal['strMealThumb']) . "' width='120'><br>";
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhuma receita encontrada para '" . htmlspecialchars($ingredient) . "'.</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color:red;'>Erro: " . htmlspecialchars($e->getMessage()) . "</p>";
    }
}
?>
</body>
</html>
