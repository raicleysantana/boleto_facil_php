<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token,$boleto->sandbox);

$data = $boletoFacil->fetchPaymentDetails('A8058125A14C5DC339A2817BA4311CE5');

var_dump($data);