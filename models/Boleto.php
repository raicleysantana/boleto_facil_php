<?php

namespace models\boleto;

class Boleto
{
    public $sandbox = true;
    public $token = "84984203D83C83BC4CD0BFBB537310F0E23D5AE4C95663ADC850D9DC5B5DAAF5";
//    public $token = "3264A64D30D7B8086FAAD7AD54EAFDD3D29F5B4F399ABD9F6FB91D5C836D439A";
    public $nome = "Raicley Santana da silva";
    public $cpf = "03782105214";
    public $descricao = "Produto teste";
    public $preco = 10;
    public $dtVencimento = "25/01/2020";
}