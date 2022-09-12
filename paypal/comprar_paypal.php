<?php
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use Paypal\Exception\PayPalConnectionException;

require __DIR__ . '/bootstrap.php';

$precio_item = $_POST['precio_item'];
//Me permite que metodos de pago 
$payer = new Payer();
$payer->setPaymentMethod('paypal');

//Detallar cuales van a ser los cobros que vamos a realizar al usuario 
$details = new Details();
$details->setShipping('0.00')
        ->setTax('0.00')  //Impuesto
        ->setSubtotal($precio_item);  //Subtotal

//Define los detalles del Cobro
$amount = new Amount();
$amount->setCurrency('USD') //Moneda de Cobro
        ->setTotal($precio_item) //Total a Cobrar
        ->setDetails($details);

//Nos permite realizar como o cuales van a ser las condiciones de nuestra transactions
$transaction = new Transaction();
$transaction->setAmount($amount)
        ->setDescription("50 litros de Nafta Super");

$payment = new Payment();
$payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions([ $transaction ]);


//paypal donde va redireccionar despues de realizar el, pago        
$redirectUrls = new RedirectUrls();
 $redirectUrls->setReturnUrl('http://localhost/Paypal/paypal/mensajes/compra_finalizada.php?aprobado=true')
        ->setCancelUrl('http://localhost/Paypal/paypal/mensajes/cancelado.php');
        
//Registrar estas URl que se ingresaron
$payment->setRedirectUrls( $redirectUrls);

try {
    $payment->create($apiContenido);
   // var_dump($payment);
   
} catch (Paypal\Exception\PayPalConnectionException $ex) {
    header("Location:paypal/mensajes/error.php");
}

foreach ($payment->getLinks()  as $value) {
    // var_dump($value);
  if ($value->getRel() == 'approval_url') {
     $redirectUrl = $value->getHref(); 
  }
 }
 header("Location:".$redirectUrl);

?>