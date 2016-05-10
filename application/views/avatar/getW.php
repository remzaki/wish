
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
				<span id="w" style="font-size:1.5em;">What I want this Christmas is:</span><br/><br/>
				<div id="detail_display" class="display">
					<p><strong>Wish Item:</strong> <?php echo $WishItem;?></p>
					<p style="white-space:nowrap;width:100%;overflow:hidden;text-overflow:ellipsis;color:green;"><strong style="color:black;">Link:</strong> <em><a href="<?php echo $Link;?>"><?php echo $Link;?></a></em></p>
					<p><?php if((isset($Upload)) AND ($Upload!='')):?><strong>To view your Uploaded Image <a href="#upimg">Click Here</a></strong><?php else:?><strong>Click Update button to upload an Image of your Wish Item</strong><?php endif;?></p>
					<p><strong>Comments/Description:</strong></p>
					<p><?php echo $WishDesc; ?></p><br/>
					<input type="button" onclick="window.location.href='./avatar?g=U'" value="Update" style="float:right;margin-right:1em;" />
					<input type="button" onclick="window.location.href='./avatar'" value="Close" style="float:right;margin-right:1em;" />
				</div>
			</div>
		</div>
	</div>
	<a href="#" id="upimg" class="overlay" title='Click on the gray background to exit'></a>
	<div class="popup" style="padding:1em;" title='Click on the gray background to exit'>
		<img src="<?php echo $Upload?>" alt="Uploaded Image">
	</div>
