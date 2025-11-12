<?php

use Stichoza\GoogleTranslate\GoogleTranslate;


class TranslateFacade
{
    private $tr;

    public function __construct($target = 'en', $source = 'auto')
    {
        $this->tr = new GoogleTranslate();
        $this->tr->setTarget($target);
        $this->tr->setSource($source);
    }

    public function translate($text)
    {
        return $this->tr->translate($text);
    }
}