<!DOCTYPE html>
<!--
    Copyright (c) 2012-2016 Adobe Systems Incorporated. All rights reserved.

    Licensed to the Apache Software Foundation (ASF) under one
    or more contributor license agreements.  See the NOTICE file
    distributed with this work for additional information
    regarding copyright ownership.  The ASF licenses this file
    to you under the Apache License, Version 2.0 (the
    "License"); you may not use this file except in compliance
    with the License.  You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing,
    software distributed under the License is distributed on an
    "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
     KIND, either express or implied.  See the License for the
    specific language governing permissions and limitations
    under the License.
-->
<html>

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width" />
    <!-- This is a wide open CSP declaration. To lock this down for production, see below. -->
    <meta http-equiv="Content-Security-Policy" content="default-src * 'unsafe-inline'; style-src 'self' 'unsafe-inline'; media-src *" />
    <!-- Good default declaration:
    * gap: is required only on iOS (when using UIWebView) and is needed for JS->native communication
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of eval() and inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
        * Enable inline JS: add 'unsafe-inline' to default-src
        * Enable eval(): add 'unsafe-eval' to default-src
    * Create your own at http://cspisawesome.com
    -->
    <!-- <meta http-equiv="Content-Security-Policy" content="default-src 'self' data: gap: 'unsafe-inline' https://ssl.gstatic.com; style-src 'self' 'unsafe-inline'; media-src *" /> -->

    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <body>
	<form id="form1" name="form1" method="post" action="thanks.php" onSubmit="return checkForm(this)">
  <table width="95%">
    <tr>
		<td colspan="2"><p><?php echo( $_REQUEST['fmanufacturer'] ); ?> <?php echo( $_REQUEST['fmodel'] ); ?>
        <?php
print '<input type="hidden" name="manufacturer" value="' . $_POST['fmanufacturer'] . '">';
?>
      <?php
print '<input type="hidden" name="model" value="' . $_POST['fmodel'] . '">';
?><?php
print '<input type="hidden" name="imei" value="' . $_POST['imei'] . '">';
?>
<?php
print '<input type="hidden" name="colour" value="' . $_POST['colour'] . '">';
?><?php
print '<input type="hidden" name="network" value="' . $_POST['network'] . '">';
?></td></tr>
<tr>
      
      <td height="22" colspan="2"><p><?php /*echo( $_REQUEST['frepair'] );*/
				foreach($_REQUEST["frepair"] as $k => $v) {
					echo "$v</br>";
				}
			  ?>
      <?php
			  $re = "";
			  foreach($_POST['frepair'] as $k => $v)
				$re .= "$v,";
print '<input type="hidden" name="repair" value="' . $re . '">';
?></td>
    </tr>
    <tr>
      <td colspan="2"><p><?php if($_REQUEST['pricegood'] == "no")
    echo "We are unable to estimate a price for your repair. We will need to examine your phone and call you regarding possible repairs and prices. There is a small &pound;10 charge for this. If we can repair your phone and you agree to the repair cost, you will not be charged the &pound;10 diagnostic fee.";
else
    echo "Estimated Cost: &pound;" . $_REQUEST['pricevalue']; ?>
      <?php
print '<input type="hidden" name="price" value="' . $_POST['pricevalue'] . '">';

?></td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr>
      <td>Network: <?php echo( $_REQUEST['network'] ); ?> </td>
    </tr>
    <tr><td colspan="2">
      
<?php
print '<input type="hidden" name="boxed" value="' . $_POST['fboxed'] . '">';
?>
 <?php
print '<input type="hidden" name="rapid" value="' . $_POST['rapid'] . '">';
?></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Your Name.<br />
	  <input TYPE="text" NAME="name" size="25" id="name"></td>
    </tr>
    <tr>
      <td>Your Email Address.<br />
      <input TYPE="text" NAME="email" size="25" id="email"></td>
    </tr>
    <tr>
      <td>Your Address<br />
      <input TYPE="text" NAME="address1" size="25" id="address1"></td>
    </tr>
    <tr>
      <td>Town<br />
      <input TYPE="text" NAME="address2" size="25" id="address2"></td>
    </tr>
    <tr>
      <td>County<br />
      <input TYPE="text" NAME="address3" size="25" id="address3"></td>
    </tr>
    <tr>
      <td>Your Post Code.<br />
      <input TYPE="text" NAME="address4" size="25" id="address4"></td>
    </tr>
    <tr>
      <td>This service is only available in the UK and Ireland</td>
      
    </tr>
    <tr><td>&nbsp;</td></tr>
    
    <tr>
      <td>Please enter a contact number<br />
      <input TYPE="text" NAME="contact" size="25" id="contact"></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
       
  
    <tr>
      <td>Return delivery type<br /><?php $fnextday = $_REQUEST['fnextday'];
if ( $fnextday == "on" )
    echo "Next Day Special delivery (insured by Royal Mail up to &pound;500, delivered by 1pm)";
else
    echo "Royal Mail First Class Recorded Delivery (Royal Mail offer no insurance with 1st class recorded post. If you require Royal Mail insurance please opt for special delivery return and see their terms and conditions)"; ?>
      <?php
print '<input type="hidden" name="fnextday" value="' . $_POST['fnextday'] . '">';
?></td></tr>
<tr><td>&nbsp;</td><td><?php $international = $_REQUEST['international'];
if ( $international == "on" )
    echo "Your phone will be returned using a recorded postal method. and charged at Royal Mail delivery cost plus £1 handling fee.";
else
    echo " "; ?>
      <?php
print '<input type="hidden" name="international" value="' . $_POST['international'] . '">';
?></td></tr>
   
       <tr>
      <td>Please enter a short description of your fault<br />
      <textarea name="description" cols="25" rows="3"></textarea></td>
    </tr>

    <tr>
		<td>Please enter any passwords for your phone<br />
    <input TYPE="text" NAME="security" size="25" id="security"></td></tr>
   
  </table>
  <p>
	<input type="checkbox" name="terms">I confirm the information provided is correct and i agree to the <a href="http://www.thephonedoctor.co.uk/terms.htm" target="_blank" onClick="wopen('http://www.thephonedoctor.co.uk/terms.htm', 'popup', 640, 480); return false;">terms and conditions</a> of repair <br />
    <input type="submit" name="Submit" value="Next">
  </p>
</form>
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
        app.initialize();
    </script>
</body>

</html>