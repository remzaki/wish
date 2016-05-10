<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Wishlist</title>
	<link rel="shortcut icon" href="<?php echo base_url("wish");?>/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("wish");?>/resources/css/global.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("wish");?>/resources/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("wish");?>/resources/css/modal.css" />
	<script type="text/javascript" src="<?php echo base_url("wish");?>/resources/js/main.js"></script>
</head>
<body>
	<div id="header">
		<div class="header_title"><span id="title">Wishlist</span><span id="tmenu"><?php if(isset($_SESSION['LOGIN_FLAG'])):?><a href="./account"><?php echo ucwords($firstname." ".$lastname);?></a> | <a href="<?php echo base_url("wish");?>/logout">Logout</a><?php endif;?></span></div>
	</div>
	<div id="coat">
