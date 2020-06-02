<?php
function currencyConverter($from_Currency,$to_Currency,$amount) {
$from_Currency = urlencode($from_Currency);
$to_Currency = urlencode($to_Currency);
$encode_amount = 1;
$get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
$get = explode("<span class=bld>",$get);
$get = explode("</span>",$get[1]);
$converted_currency = preg_replace("/[^0-9.]/", null, $get[0]);
return $converted_currency;
}
?>
<?php
// change amount according to your needs
$amount =10;
// change From Currency according to your needs
$from_Curr =“INR”;
// change To Currency according to your needs
$to_Curr =“USD”;
$converted_currency=currencyConverter($from_Curr, $to_Curr, $amount);
// Print outout
echo $converted_currency;
?>