<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title>Wishlist</title>
	</head>
	<body>
		<div>
			<?php echo form_open("wish/account/reset");?>
			<label>QLID: </label><input type='text' name='qlid' />
			<label>Admin Password: </label><input type='password' name='password' />
			<input type='submit' value='Reset Password' />
			</form>
			</br>
			<span style="color:red;"><?php echo validation_errors(); echo $msg; ?></span>
		</div>
	</body>
</html>