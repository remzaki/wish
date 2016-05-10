
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
				Please enter your Passcode before accessing Avatar:
				<div class="pcsetup" style="width:21em;">
					<?php echo form_open("wish/avatar");?>
						<div class="der"></div><div class="der"></div>
						<div class="din"><input type="password" name="passcode" placeholder="Avatar Passcode" tabindex="1" style="width:18em;" autofocus /></div>
						<div class="der"><?php echo form_error('passcode', '<span id="message">', '</span>'); if(isset($msg)){} ?><?php if(isset($msg)):?><span id="message"><?php echo $msg;?></span><?php endif;?></div>
						<div class="der"></div>
						<input type="submit" value="Continue" tabindex="2" style="margin-right:5.5em;" />
					</form>
				</div>
			</div>
		</div>
	</div>
