<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
require __DIR__ .'/vendor/autoload.php'; 

$apiContenido = new ApiContext(
    new OAuthTokenCredential(
        'AY9LOzb0f1aU_5Xz7NkW-Bwz5JRrDdPV_6ossVtqzbPrqvjb3jAZc8jEp-lsv17Q0FlQfGqpLKs4GCkO',
        'EK7kO4IROSK_WR16ND6QH7QqAxf8OjIpIcIMjbCuGheMHFwvLn8873L247bYXpZo5o6G-qIimkgCPlSK'
        )
    );

    $apiContenido ->setConfig(
        array(
            'mode'=> 'sandbox',
            'http.ConnectionTimeOut'=> 30,
            'log.LogEnabled' => true,
            'log.FileName'=> 'Paypal.log',
            'log.LogLevel'=> 'DEBUG',
            )
        );

?>