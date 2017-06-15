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
    <title>The Phone Doctor - About us</title>
	
</head>

<body>
	<center><a href="menu.php"><img src="img/header.png" width="90%"></a></center>
	<a href="tel:+441977695763"><h2>01977 695763</h2></a>
	<p>Welcome to the Phone Doctor Repair Service. We are a UK based mobile phone repair specialist. Using this app, you can find the most recent price for your phone repair. If you can't see the repair you need, you can send us a message from within the app.</p>
	<p>How to use our service<br />
	<ul>
		<li>Select your phone and repair from our quote section</li>
		<li>Fill in your contact details and return address</li>
		<li>Send your phone to the address below</li>
		<li>We will repair the phone and request the agreed payment through Paypal</li>
		<li>Once paid, we will return your phone to you using your chosen recorded delivery method</li>
	</ul>
	<p>If you would like to visit us in store, You can find us at the address below</p>
	<p>Unit 1 Market Hall<br />
	Pontefract<br />
	West Yorkshire<br />
	WF8 1AU</p>
	
	
	
    <script type="text/javascript" src="cordova.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <script type="text/javascript">
        app.initialize();
    </script>
</body>

</html>