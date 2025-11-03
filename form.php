<?php

require_once "RecipeForm.php";

$html = "
  <!doctype html>
   <html lang=\"pt-br\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>Any Recipe - Find Your Recipe!</title>
    </head>
    <body>
    
    <div>
        <form method=\"GET\">
            <label for=\"ingredients\" >Ingredientes</label>
            <input id=\"ingredients\"
                   type=\"text\"
                   placeholder=\"Ex.: Ovos, Leite, Manteiga.\">
        </form>
        <div>
            <button>Buscar</button>
        </div>
    </div>
   </body>
  </html>
";

return $html;