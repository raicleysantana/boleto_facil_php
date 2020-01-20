<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token, $boleto->sandbox);

$boletoFacil->beginDueDate = '18/01/2020';
$boletoFacil->endDueDate = '26/01/2020';
$response = $boletoFacil->listCharges();
$response = json_decode($response);
//var_dump($response->data->charges);


foreach ($response->data->charges as $charge) {
    ?>
    <table style="border: 1px solid;">
        <thead>
        <tr>
            <td>Codigo</td>
            <td>Referencia</td>
            <td>Data de Vencimento</td>
            <td>Status</td>
            <td>Id</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?= $charge->code; ?></td>
            <td><?= $charge->reference; ?></td>
            <td><?= $charge->dueDate; ?></td>
            <?php foreach ($charge->payments as $payment) { ?>
                <td><?= $payment->status ?></td>
                <td><?= $payment->id ?></td>
            <?php } ?>
        </tr>
        </tbody>
    </table>

    <?php
}