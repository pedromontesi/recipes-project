<?php

use chillerlan\QRCode\{QRCode};

class QrcodeFacade
{

    private string $data;


    public function __construct(string $data)
    {
        $this->data = $data;

    }


    public function getQrcode()
    {
        $qrcode = new QRCode();
        return $qrcode->render($this->data);
    }



}