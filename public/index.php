<?php

//Apenas para teste

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Facades/TranslateFacade.php';



$tr = new TranslateFacade('pt');

print_r($tr->translate('For the carrot cake, preheat the oven to 160C/325F/Gas 3. Grease and line a 26cm/10in springform cake tin.\r\nMix all of the ingredients for the carrot cake, except the carrots and walnuts, together in a bowl until well combined. Stir in the carrots and walnuts'));

