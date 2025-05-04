<?php

namespace App\Services;

use Epayco\Epayco;

class EpaycoService
{

    protected $epayco;

    public function __construct()
    {
        $this->epayco = new Epayco(array(
            "apiKey" => config('epayco.public_key'),
            "privateKey" => config('epayco.private_key'),
            "lenguage" => "ES",
            "test" => config('epayco.test')
        ));
    }

    public function getBanks()
    {
        $test = config('epayco.test');
        $pseBanks = $this->epayco->bank->pseBank($test);

        return $pseBanks;
    }

    public function createPSE($orderData)
    {
        $pse = $this->epayco->bank->create($orderData);

        return $pse;
    }
}
