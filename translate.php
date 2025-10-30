<?php

use Stichoza\GoogleTranslate\GoogleTranslate;
class TranslateFacade {
    protected $tr;

    public function __construct($translator) {
        $this->tr = new GoogleTranslate('pt-br');
        $this->tr->setCurrency( $translator );
    }
}