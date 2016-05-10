
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
				<li><div title="Update your wishlist so that your Manito/Manita would know what to wrap up."><a href="./avatar?g=W" style="border-bottom:2px solid #4082E6;color: #474747;font-weight:bold;">Wishlist</a></div></li>
				<!--li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="./avatar?g=M">Manito/Manita</a></div></li-->
				<li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="">Manito/Manita</a></div></li>
				<li><div title="Change your Avatar PassCode for your convenience."><a href="./avatar?g=P">Passcode</a></div></li>
				<li><div title="Exit Avatar page. You will be redirected to the Home page."><a href="./home">Exit</a></div></li>
			</div>
			<div class="avclose">
				<a href="avatar">Click Here to Clear Display</a>
			</div>
			<div class="detail">
				<span id="w" style="font-size:1.5em;">What I want this Christmas is:</span>
				<div class="display">
					<div class="wish_form">
						<?php echo form_open_multipart('wish/avatar/do_upload');?>
							
							<div class="din"><label style="font-weight:bold;">Item *: </label><input type="text" name="item" placeholder="The thing inside the Gift Wrap" value="<?php if(isset($_SESSION["PREV_ITEM_VAL"])){echo $_SESSION["PREV_ITEM_VAL"];}else{echo $WishItem;} unset($_SESSION["PREV_ITEM_VAL"]);?>" /></div>
							<div class="der"><?php if(isset($_SESSION["ITEM_REQ"])){echo $_SESSION["ITEM_REQ"];} unset($_SESSION["ITEM_REQ"]); ?></div>
							<div class="din"><label>Image: </label><input type="file" name="userfile" /></div>
							<div class="der"><span id="message">File should be GIF, JPG, PNG, BMP format and below 2MB of size.</span></div>
							<div class="der"><span id="message">Invalid format and size will be ignored.</span></div>
							<!--div class="der"><input type="checkbox" name="remove_upimg" /><label style="float:right;line-height:5px;">Remove current image</label></div-->
							<div class="din"><label>Link: </label><input type="text" name="link" placeholder="An online store perhaps" value="<?php echo $Link;?>" /></div>
							<div class="der"><?php if(isset($_SESSION["INVALID_LINK"])){echo $_SESSION["INVALID_LINK"];} unset($_SESSION["INVALID_LINK"]); ?></div>
							<div class="din"><label>Comments / Description: </label></div><br/>
							<textarea rows="2" cols="51" name="desc" placeholder="What's on your mind?"><?php echo $WishDesc;?></textarea>
							<div class="der"></div>
							<input type="submit" value="Save" />
							<input type="reset" value="Clear" />
							<input type="button" value="Cancel" onclick="window.location.href='./avatar?g=W'" style="margin-right:15px;" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
