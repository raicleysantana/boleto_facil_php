<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

$boleto = new Boleto();
$boletoFacil = new BoletoFacil($boleto->token, $boleto->sandbox);


?>

    <form method="post" action="cancelar_cobranca.php">
        <input type="number" name="charge_id">
        <br>
        <button type="submit">Cancelar Boleto</button>
    </form>

<?php

$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'POST') {
    $id = $_POST['charge_id'];
    $response = $boletoFacil->cancelCharge($id);

    var_dump($response);
}