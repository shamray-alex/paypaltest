<?php require('PaypalIPN.php');
 
use PaypalIPN;

$ipn = new PayPalIPN();

// Use the sandbox endpoint during testing.
$ipn->useSandbox();
$verified = $ipn->verifyIPN();
if ($verified) {
	/*
     * Process IPN
     * A list of variables is available here:
     * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
     */
 $link = mysqli_connect('localhost', 'username', 'password', 'basename');
    mysqli_query($link, "INSERT INTO `transactions`(`id`, `txn_id`, `txn_type`, `mc_gross`, `mc_fee`, `mc_currency`, `quantity`, `payment_date`, `payment_status`, `business`, `receiver_email`, `payer_id`, `payer_email`, `custom`, `created_date`) VALUES (null,'".$_POST['txn_id']."','".$_POST['txn_type']."','".$_POST['mc_gross']."','".$_POST['mc_fee']."','".$_POST['mc_currency']."','".$_POST['quantity']."','".$_POST['payment_date']."','".$_POST['payment_status']."','".$_POST['business']."','".$_POST['receiver_email']."','".$_POST['payer_id']."','".$_POST['payer_email']."','".$_POST['custom']."','".$_POST['created_date']."')");
    mysqli_close($link);

}

// Reply with an empty 200 response to indicate to paypal the IPN was received correctly.
header("HTTP/1.1 200 OK");
