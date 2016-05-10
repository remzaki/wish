
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="./home"></a></div></div>
			<div id="menu_btn" class="ava" style="background:#FF7F7F;"><p>Avatar</p><div id="ava_img" class="menu_img"></div></div>
			<div id="menu_btn" class="wsh"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="./codenames"></a></div></div>
		</div>
		<div id="content">
			<div class="avmenu">
				<li><div title="Change your Avatar pic. You can choose plenty of Avatars that will suit you."><a href="./avatar?g=A">Avatar</a></div></li>
				<li><div title="Update your wishlist so that your Manito/Manita would know what to wrap up."><a href="./avatar?g=W">Wishlist</a></div></li>
				<!--li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="./avatar?g=M">Manito/Manita</a></div></li-->
				<li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="">Manito/Manita</a></div></li>
				<li><div title="Change your Avatar PassCode for your convenience."><a href="./avatar?g=P" style="border-bottom:2px solid #4082E6;color: #474747;font-weight:bold;">Passcode</a></div></li>
				<li><div title="Exit Avatar page. You will be redirected to the Home page."><a href="./home">Exit</a></div></li>
			</div>
			<div class="avclose">
				<a href="avatar">Click Here to Clear Display</a>
			</div>
			<div class="detail">
				<div style="width:45%;margin:0 auto;">
					<?php echo form_open("wish/avatar?g=P");?>
					
						<div class="der"></div><div class="der"></div>
						<div class="din"><label>New Passcode:</label><input type="password" name="npasscode" placeholder="Passcode" tabindex="1" /></div>
						<div class="der"><?php echo form_error('npasscode', '<span id="message">', '</span>');?></div>
						<div class="din"><label>Confirm Passcode:</label><input type="password" name="ncpasscode" placeholder="Confirm Passcode" tabindex="2" /></div>
						<div class="der"><?php echo form_error('ncpasscode', '<span id="message">', '</span>');?></div><div class="der"></div>
						<input type="submit" value="Change" tabindex="3" />
						<input type="button" onclick="window.location.href='./avatar'" value="Cancel" tabindex="4" />
					</form>
				</div>
			</div>
		</div>
	</div>
