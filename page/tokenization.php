<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token,true);


$boletoFacil->creditCardHash = '71ccbdec-7589-4ca8-a92d-c8793515c485';
$data = $boletoFacil->cardTokenization();

var_dump($data);