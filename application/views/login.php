		<div id="login">
			<div id="form_title">
				<label>Login</label>
			</div>
			
			<?php echo form_open("wish/login");?>
			
				<div class="din"><label>Username:</label><input type="text" name="username" placeholder="Username" tabindex="1" autocomplete="off" value="<?php echo set_value('username');?>" /></div>
				<div class="der"><?php echo form_error('username', '<span id="message">', '</span>');?></div>
				<div class="din"><label>Password:</label><input type="password" name="password" placeholder="Password" tabindex="2" /></div>
				<div class="der"><?php echo form_error('password', '<span id="message">', '</span>');?></div>
				<div class="der" style="text-align:left;"><a href='#help'>Forgot Password?</a></div>
				<input type="submit" value="Login" tabindex="3" />
				<input type="button" value="Register" onclick="window.location.href='./register'" tabindex="4" />
				<div class="der"></div>
				<div class="der"><?php if(isset($msg)):?><div id="message"><?php echo $msg;?></div><?php endif;?></div>
			</form>
		</div>
		<a href="#" id="help" class="overlay"></a>
		<div class="popup">
			<h2>Forgot Password?</h2>
			<p>I forgot it also...rather I don't know your password in the first place! And the only person who knows it, is <strong>YOU</strong>.</p>
			<p>Yes, there should be a Password Reset available but NO I can't use email. Mcafee doesn't allow me to send. Still trying to figure out how to do a reset without doing it manually.</p>
			<p>If you really forgot it, ask the developer to <strong>reset</strong> it.</p>
			<p>Email: <a href='mailto:reimark.cogonon@gmail.com'>reimark.cogonon@gmail.com</a></p>
		</div>
