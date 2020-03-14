<?php


use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token,$boleto->sandbox);

?>

    <form method="post" action="gerar_cobranca.php">
        <button type="submit">Gerar Boleto</button>
    </form>

<?php
$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'POST') {
    $boletoFacil->payerCpfCnpj = '03782105214';
    $boletoFacil->description = 'Produto teste';
    $boletoFacil->amount = '12.00';
    $boletoFacil->payerName = $boleto->nome;
    $boletoFacil->reference = 1;
    $boletoFacil->notificationUrl = 'http://pagamento.atwebpages.com/pagamento.php';
    $request = $boletoFacil->issueCharge();
    $resposta = json_decode($request);
    var_dump($resposta);die;
    foreach ($resposta->data->charges as $charge) {
      //  echo $charge->checkoutUrl;
    }
}