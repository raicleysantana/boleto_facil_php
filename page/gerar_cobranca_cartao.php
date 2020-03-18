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
    $boletoFacil->payerCpfCnpj = '89231736060';
    $boletoFacil->description = 'Primeira venda com cartao de credito';
    $boletoFacil->amount = '10.00';
    $boletoFacil->payerName = $boleto->nome;
    $boletoFacil->reference = 1;

    //$boletoFacil->creditCardHash = '466c6244-1147-4e4f-9bdf-01ecc78bae07';
    $boletoFacil->payerEmail = 'raicleysantana1@gmail.com';
    $boletoFacil->billingAddressCity = 'Manaus';
    $boletoFacil->billingAddressPostcode = '69084623';
    $boletoFacil->billingAddressState = 'AM';
    $boletoFacil->billingAddressCity = 'Manaus';
    $boletoFacil->billingAddressNeighborhood = 'Zumbi 2';
    $boletoFacil->billingAddressStreet = 'rua padre ramin';
    $boletoFacil->billingAddressNumber = '136';
    $boletoFacil->billingAddressComplement = 'Drogaria Anne';

    $boletoFacil->creditCardNumber = '5449135507339978';
    $boletoFacil->creditCardSecurityCode = '673';
    $boletoFacil->creditCardHolderName = 'TESTE';
    $boletoFacil->creditCardExpirationMonth = '01';
    $boletoFacil->creditCardExpirationYear = '2022';

    $request = $boletoFacil->issueCharge2();
    $resposta = json_decode($request);
    var_dump($resposta);
    die;
}