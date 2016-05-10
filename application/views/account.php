	<div id="register">
		<div id="form_title">
			<label>Account</label><br/>
		</div>
		<?php echo form_open("wish/account"); ?>
		
			<div class="din"><label>Username: </label><input type="text" value="<?php echo $username;?>" disabled style='cursor:not-allowed;' /></div>
			<div class="der"></div>
			<div class="din"><label>First Name: </label><input type="text" value="<?php echo $firstname;?>" disabled style='cursor:not-allowed;' /></div>
			<div class="der"></div>
			<div class="din"><label>Last Name: </label><input type="text" value="<?php echo $lastname;?>" disabled style='cursor:not-allowed;' /></div>
			<div class="der"></div>
			<div class="din"><label>Quicklook ID: </label><input type="text" value="<?php echo $qlid;?>" disabled style='cursor:not-allowed;' /></div>
			<div class="der"></div>
			<div class="din"><label>Old Password: </label><input type="password" name="opassword" placeholder="Old Password" tabindex="1" autofocus /></div>
			<div class="der"><?php echo form_error('opassword', '<span id="message">', '</span>'); if(isset($msg)):?><span id="message"><?php echo $msg;?></span><?php endif;?></div>
			<div class="din"><label>New Password: </label><input type="password" name="npassword" placeholder="New Password" tabindex="2" /></div>
			<div class="der"><?php echo form_error('npassword', '<span id="message">', '</span>'); ?></div>
			<div class="din"><label>Confirm Password: </label><input type="password" name="cpassword" placeholder="Confirm Password" tabindex="3" /></div>
			<div class="der"><?php echo form_error('cpassword', '<span id="message">', '</span>'); ?></div>
			<div class="der"></div>
			<input type="submit" value="Update"/>
			<input type="button" value="Cancel" onclick="window.location.href='./home'" />
		</form>
	</div>
	