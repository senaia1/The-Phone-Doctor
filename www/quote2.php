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
    <title>The Phone Doctor</title>
	<script type="text/javascript" src="http://thephonedoctor.co.uk/quote/jquery-1.2.6.min.js"></script>
<script type="text/javascript">
var database;
function dbCallback(data, statusText) {
	if(statusText != "success") {
		alert("Error loading database.");
		return;
	}
	database = data;
	loadManufacturers();
}

function loadManufacturers() {
	var opts = "";
	$('manufacturer', database).each(function(i) {
		var n = $(this).attr("name");
		opts += '<option value="' + n + '">' + n + '</option>';
	});
	$('select#fmanufacturer').html(opts);
	selectManufacturer();
	selectModel();
}

function selectManufacturer() {
	var opts = "";
	var s = $('select#fmanufacturer').children("[@selected]").text();
	$('manufacturer', database).each(function(i) {
		if($(this).attr("name") == s) {
			var man = $(this);
			$('phone', man).each(function(i) {
				var phone = $(this);
				var n = $(phone).attr("name");
				opts += '<option value="' + n + '">' + n + '</option>';
			});
		}
	});
	$('select#fmodel').html(opts);
	selectModel();
}

function selectModel() {
	var ropts = "";
	var sopts = "";
	var s = $('select#fmanufacturer').children("[@selected]").text();
	var p = $('select#fmodel').children("[@selected]").text();
	$('manufacturer', database).each(function(i) {
		if($(this).attr("name") == s) {
			var man = $(this);
			$('phone', man).each(function(i) {
				if($(this).attr("name") == p) {
					var phone = $(this);
					$('repair', phone).each(function(i) {
						var x = $(this);
						var n = $(x).attr("name");
						var p = $(x).attr("price").toString();
						ropts += '<option value="repair_' + n + '|' + p + '">' + n + '</option>';
					});
					$('service', phone).each(function(i) {
						var x = $(this);
						var n = $(x).attr("name");
						var p = $(x).attr("price").toString();
						sopts += '<option value="service_' + n + '|' + p + '">' + n + '</option>';
					});
				}
			});
		}
	});
	$('select#frepairJ').html(ropts+sopts);
}
//*******************************************************************
//********************postage prices changed here********************
//*******************************************************************
function selectRepair() {
	var n = $('input#fnextday:checked').val();
	n = n != null ? 7.75 : 0;
	var m = $('input#fboxed:checked').val();
	n += m != null ? 0 : 0;
	var s = $('select#frepairJ').children("[@selected]");
	var t = n;
	var u = false;
	var l = s.length;
	$(s).each(function(i) {
		var v = $(this).val().split('|');
		v = v[v.length - 1];
		if(isNaN(v))
			u = true;
		else
			t += parseFloat(v);
	});
	$('div#fdetail').html(
		l > 1 ?	
			u ?
				"There is a &pound;10 diagnostic fee to check your phone for faults which is deducted from the final bill (excluding return delivery). We will request this once we receive your phone before we start work. <br>Your minimum charge for the repair woud be: "
				+ "&pound;" + t.toString()
				:
				"The total cost to you will be: "
				+ "&pound;" + t.toString()
			:
			u ?
				"There is a &pound;10 diagnostic fee to check your phone for faults which is deducted from the final bill (excluding return delivery). We will request this once we receive your phone before we start work. <br>"
				+ "We would need to examine your handset before we can give you a price."
				:
				"The cost of your repair will be: "
				+ "&pound;" + t.toString()
	);
	$('div#fdetail2').html(
		l > 1 ?	
			u ?
				"There is a &pound;10 diagnostic fee to check your phone for faults which is deducted from the final bill (excluding return delivery). We will request this once we receive your phone before we start work. <br>Your minimum charge for the repair woud be: "
				+ "&pound;" + t.toString()
				:
				"The total cost to you will be: "
				+ "&pound;" + t.toString()
			:
			u ?
				"There is a &pound;10 diagnostic fee to check your phone for faults which is deducted from the final bill (excluding return delivery). We will request this once we receive your phone before we start work. <br>"
				+ "we would need to examine your handset before we can give you a price."
				:
				"The cost of your repair will be: "
				+ "&pound;" + t.toString()
	);
	$("input[@name^='pricegood']").val(u ? "no" : "£");
	$("input[@name^='pricevalue']").val(t);
}

$(document).ready(function() {
	$('select#fmanufacturer').change(function() {
		selectManufacturer();
	});
	$('select#fmodel').change(function() {
		selectModel();
	});
	$('select#frepairJ').change(function() {
		selectRepair();
	});
	$('input#fnextday').change(function() {
		selectRepair();
	});
	$('input#fboxed').change(function() {
		selectRepair();
	});
	
	$.get("http://thephonedoctor.co.uk/quote/phonedb.xml", { cache:Math.random().toString() }, dbCallback, "xml");
	$('div#fdetail').html("");
	
	$.get("http://thphonedoctor.co.uk/quote/phonedb.xml", { cache:Math.random().toString() }, dbCallback, "xml");
	$('div#fdetail2').html("");
 // Quote system provided by Summerfield Web Solutions
  
});
</script>
</head>

<body>
	
	<form id="form1" name="form1" method="post" action="address.php" onSubmit="return checkForm(this)">
<input type="hidden" name="pricegood" value="no">
<input type="hidden" name="pricevalue" id="pricevalue" value="0">
	<p align="left">Phone manufacturer<br />
	<select name="fmanufacturer" id="fmanufacturer" style="width:40%; "></select></p>
	<p align="left">Model of phone<br />
	<select name="fmodel" id="fmodel" style="width:40%; "></select></p>
	<p><select name="frepair[]" size="1" multiple id="frepairJ" style="width:90%; "></select>
</p>
 
<table width="95%" border="0" cellspacing="0" cellpadding="0">
	
	<tr>
		<td><div id="fdetail">Loading price list, please wait</div>
		<p><b>Return Delivery:</b>Next day special delivery &pound;7.75 <input type="checkbox" name="fnextday" id="fnextday"></p>
		</td>
	</tr>
	<tr>
		<td>&nbsp;
		</td>
	</tr>
	<tr>
		<td><p>This service is only available for the UK and Ireland</p>
		</td>
	</tr>
	<tr>
		<td>Please enter the IMEI number of your phone<br />
		<input TYPE="text" NAME="imei" size="30" id="imei">
		</td>
    </tr>
    <tr>
      <td><font size="-1" color="#999999">The IMEI number is located on a label under the battery, or by dialing *#06#</font></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
		<td><p>Which network is your phone on?<br />
		<input TYPE="text" NAME="network" size="30" id="network"></td>
    </tr>
	<tr>
		<td><p>What is the glass screen colour?<br />
		<input TYPE="text" NAME="colour" size="30" id="colour">
		</td>
    </tr>
	<tr>
		<td><font size="-1" color="#999999">This is so we can order the correct colour part if required</font></td></tr>
    <tr>
		<td>&nbsp;</td></tr>
       
    <tr>
		<td><input type="submit" name="Submit" value="Next">
		</td>
    </tr>
    
        </table>
        </form>
	</center>
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
        app.initialize();
    </script>
</body>

</html>