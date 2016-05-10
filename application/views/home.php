
		<div id="container">
			<div id="menu">
				<div id="menu_btn" class="hme" style="background:#FF9980;"><p>Home</p><div id="home_img" class="menu_img"></div></div>
				<div id="menu_btn" class="ava"><p>Avatar</p><div id="ava_img" class="menu_img"><a href="./avatar"></a></div></div>
				<div id="menu_btn" class="wsh"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
				<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="./codenames"></a></div></div>
			</div>
			
			<div id="content">
				<div class="content_bg"></div>
				<script>
					$('#footer').onmousedown(function(){
						$('#content').hide();
					});
				</script>
				<div class='snow'>
					<div class='flake_1'></div><div class='flake_2'></div><div class='flake_3'></div><div class='flake_4'></div><div class='flake_5'></div><div class='flake_6'></div><div class='flake_7'></div><div class='flake_8'></div><div class='flake_9'></div><div class='flake_10'></div><div class='flake_11'></div><div class='flake_1_1'></div><div class='flake_1_2'></div><div class='flake_1_3'></div><div class='flake_1_4'></div>
				</div>
				<div class='content_detail'>
					<h1>Welcome to Wishlist!</h1>
					<p>To Start, please access the Avatar page and set your Avatar PassCode. First time users will need to setup thier desired Codename otherwise other Features will not be accessible.</p>
					<p>You can select an Avatar, enter/modify your Wish Items, view your Manito/Manita or change your PassCode in the Avatar page.</p>
					<br/>
					<p>Wishlist page is where you can view all the Codenames as well as thier Wish Items.</p>
					<!--p>Adding some comments are also available! Care to add some smilies? :D</p-->
					<p><?php $str="Adding some comments are also available! Care to add some smilies? :D";$str = parse_smileys($str, "http://wphrc185173-212/wish/resources/images/smilies/"); echo $str; ?></p>
					<br/>
					<p>View the Codename pairings or the Manito/Manita lists in the Codename page.</p>
					<p>Note that this pairing is machine generated and is random.</p>
					<p>Enjoy! :)</p>
					<br/>
					<p class='end' style="text-align:right;color:black;">Happy Holidays Everyone!</p>
				</div>
			</div><!-- end of #content -->
		</div><!--	end of #container	-->
