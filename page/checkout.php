<?php

use BoletoFacil\BoletoFacil;
use models\boleto\Boleto;

require '../boletofacil-php/boletofacil.php';
require '../models/Boleto.php';

?>


<html>
<head>
    <script type="text/javascript"
            src="https://sandbox.boletobancario.com/boletofacil/wro/direct-checkout.min.js"></script>
    <script type="text/javascript">
        var checkout = new DirectCheckout('6DCF10A7CB9DE9E49A468FFBB4F087786F28F13404D63AF3A48FF9EF428A2BEC',false); /* Em sandbox utilizar o construtor new DirectCheckout('SEU TOKEN PUBLICO', false); */

        var hash;

        var cardData = {
            cardNumber: '5239585639721390',
            holderName: 'Nome do Titular do Cartão',
            securityCode: '374',
            expirationMonth: '05',
            expirationYear: '2021'
        };


        /* isValidSecurityCode: Valida número do cartão de crédito (retorna true se for válido) */
        console.log(checkout.isValidCardNumber(cardData.cardNumber));

        /* isValidSecurityCode: Valida código de segurança do cartão de crédito (retorna true se for válido) */
        console.log(checkout.isValidSecurityCode(cardData.cardNumber, cardData.securityCode));

        /* isValidExpireDate: Valida data de expiração do cartão de crédito (retorna true se for válido) */
        console.log(checkout.isValidExpireDate(cardData.expirationMonth, cardData.expirationYear));

        /* getCardType: Obtem o tipo de cartão de crédito (bandeira) */
        console.log(checkout.getCardType(cardData.cardNumber));

        /* isValidCardData: Validação dos dados do cartão de crédito(retorna true se for válido) */
        checkout.isValidCardData(cardData, function (error) {
            console.log(error);
            /* Erro - A variável error conterá o erro ocorrido durante a validação dos dados do cartão de crédito */
        });

        checkout.getCardHash(cardData, function (cardHash) {
            /* Sucesso - A variável cardHash conterá o hash do cartão de crédito */
            document.getElementById('hash').innerText = cardHash;

        }, function (error) {
            console.log(error);
            /* Erro - A variável error conterá o erro ocorrido ao obter o hash */
        });

    </script>
</head>
<body>
<h2>Hash</h2>
<div id="hash"></div>

</body>
</html>
