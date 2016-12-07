<h1>Hello <?php echo $name;?> </h1>
<?= "Привет,".$tak //$_GET['name']." !"
?>
<?php
use yii\helpers\Url;

?>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="webfix-facilitator@ukr.net">
  <input type="hidden" name="item_name" value="Site Zip">
  <input type="hidden" name="amount" value="300">
  <input type="hidden" name="tax" value="15">
  <input type="hidden" name="quantity" value="1">
  <input type="hidden" name="no_note" value="1">
  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="custom" value="<?=$tak?>">
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/ru_RU/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
</form>
<hr>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name="business" value="webfix-facilitator@ukr.net">
  <input type="hidden" name="item_name" value="hat">
  <input type="hidden" name="item_number" value="123">
  <input type="hidden" name="amount" value="15.00">
  <input type="hidden" name="first_name" value="John">
  <input type="hidden" name="last_name" value="Doe">
  <input type="hidden" name="address1" value="9 Elm Street">
  <input type="hidden" name="address2" value="Apt 5">
  <input type="hidden" name="city" value="Berwyn">
  <input type="hidden" name="state" value="PA">
  <input type="hidden" name="zip" value="19312">
  <input type="hidden" name="night_phone_a" value="610">
  <input type="hidden" name="night_phone_b" value="555">
  <input type="hidden" name="night_phone_c" value="1234">
  <input type="hidden" name="email" value="jdoe@zyzzyu.com">

  <input type="image" name="submit"
         src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
         alt="PayPal - The safer, easier way to pay online">
</form>

<hr><hr>

<?php
$payNowButtonUrl = 'https://www.sandbox.paypal.com/cgi-bin/websc';
$userId = 315; // id текущего пользователя

$receiverEmail = 'webfix-facilitator@ukr.net'; //email получателя платежа(на него зарегестрирован paypal аккаунт)

$productId = 1;
$itemName = 'Product 1'; // название продукта
$amount = '1.0'; // цена продукта(за 1 шт.)
$quantity = 3; // количество

$returnUrl = 'http://ipn.webfix.com.ua/PaypalIpnOrig.php';
$customData = ['user_id' => $userId, 'product_id' => $productId];
?>

<form action="<?php echo $payNowButtonUrl; ?>" method="post">
  <input type="hidden" name="cmd" value="_xclick">
  <input type="hidden" name="business" value="<?php echo $receiverEmail; ?>">
  <input id="paypalItemName" type="hidden" name="item_name" value="<?php echo $itemName; ?>">
  <input id="paypalQuantity" type="hidden" name="quantity" value="<?php echo $quantity; ?>">
  <input id="paypalAmmount" type="hidden" name="amount" value="<?php echo $amount; ?>">
  <input type="hidden" name="no_shipping" value="1">
  <input type="hidden" name="return" value="<?php echo $returnUrl; ?>">
  <input type="hidden" name="notify_url" value="<?php echo $returnUrl; ?>">

  <input type="hidden" name="custom" value="<?php echo json_encode($customData);?>">

  <input type="hidden" name="currency_code" value="USD">
  <input type="hidden" name="lc" value="RU">
  <input type="hidden" name="bn" value="PP-BuyNowBF">

  <button type="submit">
    Pay Now
  </button>
</form>

