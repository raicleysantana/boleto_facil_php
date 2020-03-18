<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token,true);


$boletoFacil->creditCardHash = '3d0f1186-95f9-4006-912a-4d0f61593c54';
$data = $boletoFacil->cardTokenization();

var_dump($boletoFacil->cardTokenization());