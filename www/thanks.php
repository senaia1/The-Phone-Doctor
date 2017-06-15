<html>

<head>
<style>

p{font-family:"Arial", Helvetica, sans-serif;}

</style>
<title>Quote sevice supplied by The Phone Doctor</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<center><img src="banners3.jpg" /></center>
<font face="Arial, Helvetica, sans-serif">
<?php

$to = "thephonedoctor4@googlemail.com";

$message .= "Repair type: ";

if ( $_POST['rapid'] == "on" )

{

$subject .= "Rapid Repair, Request funds";

$message .= "rapid repair.";

echo "<p>Thanks<br>You can use the Paypal button below to pay for your repair in advance. Once payment is received we can order any parts that may be required for your repair ready for when your phone arrives with us</p>";

}

else

{

$subject .= "Mail Repair.";

$message .= "normal repair.";

echo "<p>Thanks<br>You can use the Paypal button below to pay for your repair in advance. Once payment is received we can order any parts that may be required for your repair ready for when your phone arrives with us which will improve the speed of yoiur repair. Alternatively we can request the payment from you when your repair is complete</p>";

}

$message = "manufacturer: " . $_POST["manufacturer"];

$message .= "<br>model: " . $_POST["model"];

$message .= "<br>repair: " . str_replace(",", "<br>", $_POST['repair']);

$message .= "<br>Network: " . $_POST["network"];

$message .= "<br>Colour: " . $_POST["colour"];

$message .= "<br> IMEI: " . $_POST["imei"];

$message .= "<br>Sending in box: ";

if ( $_POST['boxed'] == "on" )

{

$message .= "yes.";

echo "";

}

else

{

$message .= "no.";

print "";

}

$message .= "<br>Delivery Type: ";

if ( $_POST['fnextday'] == "on" )

{

$message .= "Next Day Special Delivery.";

echo "<p>You have chosen to use Royal Mail Next Day Special delivery as your method of return delivery, this method is insured by Royal Mail for up for &pound;500 should your phone be lost or damaged in the post.<br>";

}

else

{

$message .= "First Class Recorded.";

print "<p>You have chosen to use Royal Mail First Class Recorded Delivery as your method of return delivery. There is no insurance offered by Royal Mail for this delivery type.<br>";

}

$message .= "<br><br> Name: " . $_POST["name"];

$message .= "<br> Email: " . $_POST["email"];

$message .= "<br><br>Address: " . $_POST["address1"] . "<br>" . $_POST["address2"];

$message .= "<br>" . $_POST["address3"] . "<br>" . $_POST["address4"];

$message .= "<br> Country if not UK mainland: " . $_POST["country"];

$message .= "<br> Contact number: " . $_POST["contact"];



$message .= "<br><br>Description: " . $_POST["description"];

$message .= "<br><br>Price Quoted: " . $_POST["price"];

$message .= "<br><br>Password required: " . $_POST["security"];

$headers = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

ini_set('sendmail_from', $_POST['email']); //forces sender email

$headers .= "From: " . $_POST['name'] . "<" . $_POST['email'] . ">\r\n";

echo "<!--\r\n$headers\r\n-->";

$send = mail($to, $subject, $message, $headers);

#echo $message;

#$send = true;

if ($send)

{

print "<p>We will call or email you once we have received your phone safely. We will also email you upon repair of your phone. Please follow the instructions below to send your phone to us.";

}

else

{

print "<p>Sorry, there has been a problem processing your information. Please try again in a short while.";

}

?>
<p>

<form id="form1" name="form1" method="post" action="printer.php" target="_blank"><?php
print '<input type="hidden" name="manufacturer" value="' . $_POST['manufacturer'] . '">';
?>
<?php
print '<input type="hidden" name="model" value="' . $_POST['model'] . '">';
?>
<?php
print '<input type="hidden" name="repair" value="' . $_POST['repair'] . '">';
?>
<?php
print '<input type="hidden" name="realname" value="' . $_POST['name'] . '">';
?>
<?php
print '<input type="hidden" name="email" value="' . $_POST['email'] . '">';
?>
<?php
print '<input type="hidden" name="address1" value="' . $_POST['address1'] . '">';
?>
<?php
print '<input type="hidden" name="address2" value="' . $_POST['address2'] . '">';
?>
<?php
print '<input type="hidden" name="address3" value="' . $_POST['address3'] . '">';
?>
<?php
print '<input type="hidden" name="address4" value="' . $_POST['address4'] . '">';
?>
<?php
print '<input type="hidden" name="contact" value="' . $_POST['contact'] . '">';
?>
<?php
print '<input type="hidden" name="IMEI" value="' . $_POST['imei'] . '">';
?>
<?php
print '<input type="hidden" name="description" value="' . $_POST['description'] . '">';
?>
<?php
print '<input type="hidden" name="alternatecb" value="' . $_POST['alternatecb'] . '">';
?>
<?php
print '<input type="hidden" name="alternate" value="' . $_POST['alternate'] . '">';
?>
<?php
print '<input type="hidden" name="post" value="' . $_POST['post'] . '">';
?>
<?php
print '<input type="hidden" name="price" value="' . $_POST['price'] . '">';
?>
<?php
print '<input type="hidden" name="network" value="' . $_POST['network'] . '">';
?>
<?php
print '<input type="hidden" name="colour" value="' . $_POST['colour'] . '">';
?>
<?php
print '<input type="hidden" name="international" value="' . $_POST['international'] . '">';
?>
<?php
print '<input type="hidden" name="boxed" value="' . $_POST['boxed'] . '">';
?>
<?php
print '<input type="hidden" name="country" value="' . $_POST['country'] . '">';
?>
<?php
print '<input type="hidden" name="security" value="' . $_POST['security'] . '">';
?>
<input type="submit" value="Print" target="_blank"></form>
<p>Click Buy Now to be redirected to Paypal to pay for your repair<br>
<!-- PayPal Code -->
<?php $repair = str_replace("repair_", " ", $_POST['repair']); ?>
<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="thephonedoctor4@googlemail.com">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="item_name" value="<?php echo $_POST['manufacturer'] . " " . $_POST['model'] . " " . $repair ?>">
<input type="hidden" name="amount" value="<?php echo $_POST['price']; ?>">
<input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!">
</form>
<!-- End of Paypal -->
</p>
</font>
<p>Please send the phone to our repair centre. The address is:</p>
<p><strong>The Phone Doctor<br />Unit 1 Market Hall<br />Pontefract<br />West Yorkshire<br />WF8 1AU</strong></p>
<p>When sending your phone, use a padded envelope to help prevent further damage to your phone. Where possible, remove the SIM card and any memory card and keep those safe. If possible, remove the battery from the phone and send it with the phone.<br />If a padded envelope is not available, try to protect the phone using bubblewrap or place the phone in a box with scrunched up news paper. Anything that will help prevent the phone from being damaged in the post is OK.</p>
<p>Once we have received your phone we will inform you of safe arrival by email and let you know as your repair progresses. We may need to get in touch we during your repair or will let you know as completed and provide tracking details prior to returning.</p>
</body>
</html>
