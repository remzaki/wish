	<div id="register">
		<div id="form_title">
			<label>Register</label><br/>
		</div>
		<div class="info" style="border-bottom:none;">
			<img src="./resources/images/menu/1373904643_info_32.png">
			<span>Do not to use your NCR corp account details.</span>
		</div>
		<?php echo form_open("wish/register"); ?>
		
			<div class="din"><label>Username: </label><input type="text" name="username" placeholder="Username" value="<?php echo set_value('username');?>" /></div>
			<div class="der"><?php echo form_error('username', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>Password: </label><input type="password" name="password" placeholder="Password" /></div>
			<div class="der"><?php echo form_error('password', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>Confirm Password: </label><input type="password" name="cpassword" placeholder="Confirm Password" /></div>
			<div class="der"><?php echo form_error('cpassword', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>First Name: </label><input type="text" name="firstname" placeholder="First Name" value="<?php echo set_value('firstname');?>" /></div>
			<div class="der"><?php echo form_error('firstname', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>Last Name: </label><input type="text" name="lastname" placeholder="Last Name" value="<?php echo set_value('lastname');?>" /></div>
			<div class="der"><?php echo form_error('lastname', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>Quicklook ID: </label><input type="text" name="qlid" placeholder="Quicklook ID" maxlength="8" value="<?php echo set_value('qlid');?>" /></div>
			<div class="der"><?php if(isset($msg)){echo "<span id='message'>$msg</span>";}else{echo form_error('qlid', '<span id="message">', '</span>');} ?></div><div class="der"></div>
			<input type="submit" value="Register"/>
			<input type="reset" value="Clear"/>
			<input type="button" value="Back" onclick="window.location.href='./login'" />
		</form>
	</div>
	