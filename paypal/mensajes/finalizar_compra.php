<?php
use PayPal\Api\ApiContext;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

require __DIR__. './../bootstrap.php';

if (isset($_GET['aprobado']) && $_GET['aprobado'] == 'true') {
    $paymenId = $_GET['paymentId'];
    $payment = Payment::get($paymenId, $apiContenido);

    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
    $payment->execute($execution, $apiContenido);

    //Actualizar la BD 

    header("Location:../mensajes/compra_finalizada.php");
}else{
    header("Location:../mensajes/cancelado.php");
}