
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="./home"></a></div></div>
			<div id="menu_btn" class="ava" style="background:#FF7F7F;"><p>Avatar</p><div id="ava_img" class="menu_img"></div></div>
			<div id="menu_btn" class="wsh"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="./codenames"></a></div></div>
		</div>
		<div id="content">
			<div class="info">
				<img src="./resources/images/menu/1373904643_info_32.png">
				<span>The Avatar Page lets you modify your Avatar, CodeName and Wishlist Item. BE CAREFUL NOT TO LET ANYONE SEE!</span>
			</div>
			<br/>
			<div>
				Before proceeding in Avatar, first you need to set your Avatar Passcode. Do not to use your current Password.
				<div class="pcsetup">
					<?php echo form_open("wish/avatar");?>
						<div class="der"></div><div class="der"></div>
						<div class="din"><label>Passcode:</label><input type="password" name="passcode" placeholder="Passcode" tabindex="1" /></div>
						<div class="der"><?php echo form_error('passcode', '<span id="message">', '</span>');?></div>
						<div class="din"><label>Confirm Passcode:</label><input type="password" name="cpasscode" placeholder="Confirm Passcode" tabindex="2" /></div>
						<div class="der"><?php echo form_error('cpasscode', '<span id="message">', '</span>');?></div><div class="der"></div>
						<input type="submit" value="Next" tabindex="3" />
					</form>
				</div>
			</div>
		</div>
	</div>
