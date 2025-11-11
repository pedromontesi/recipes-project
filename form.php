<?php

require_once "RecipeForm.php";
require_once "RecipeApi.php";

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
</body>
</html>
