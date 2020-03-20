<?php


use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token, $boleto->sandbox);

?>

    <form method="post" action="gerar_cobranca_cartao.php">
        <button type="submit">Gerar Boleto</button>
    </form>

<?php
$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'POST') {
    $boletoFacil->payerCpfCnpj = '03782105214';
    $boletoFacil->description = '320923092 venda com cartao de credito';
    $boletoFacil->amount = '11.00';
    $boletoFacil->payerName = 'Testando 32453';
    $boletoFacil->reference = 1;


    $boletoFacil->payerEmail = 'raicleysantana1@gmail.com';
    $boletoFacil->billingAddressCity = 'Manaus';
    $boletoFacil->billingAddressPostcode = '69084623';
    $boletoFacil->billingAddressState = 'AM';
    $boletoFacil->billingAddressCity = 'Manaus';
    $boletoFacil->billingAddressNeighborhood = 'Zumbi 2';
    $boletoFacil->billingAddressStreet = 'rua padre ramin';
    $boletoFacil->billingAddressNumber = '136';
    $boletoFacil->billingAddressComplement = 'Drogaria Anne';
    $boletoFacil->creditCardStore = true;
    $boletoFacil->creditCardHash = '4db25709-0a1c-4fee-87ec-0f97bf1b09f0';
    $request = $boletoFacil->issueCharge2();
    $resposta = json_decode($request);
    var_dump($resposta);
    die;
}