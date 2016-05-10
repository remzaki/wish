
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="./home"></a></div></div>
			<div id="menu_btn" class="ava"><p>Avatar</p><div id="ava_img" class="menu_img"><a href="./avatar"></a></div></div>
			<div id="menu_btn" class="wsh"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
			<div id="menu_btn" class="cns" style="background:#66A3FF;"><p>Codenames</p><div id="cns_img" class="menu_img"></div></div>
		</div>
		<div id="content">
			<div class="info">
				<img src="./resources/images/menu/1373904643_info_32.png">
				<span>All CodeNames will be displayed here as well as the pairings.</span>
			</div>
			<br/>
			<?php if(!$result):	// IF NOT ALL USERS HAS AVATAR?>
				<p id='message'>There are still Users who has <strong>NO CodeName</strong> entered!</p>
				<p id='message'>Until everyone has, the page will not display the Manito/Manita pairings.</p>
			<?php else: // IF ALL USERS HAS AVATAR ?>
				<div class='pairs'>
					<div class='col1'>
						<table border='1' style='float:right;'>
							<th>Codenames</th>
							<?php foreach($result1 as $a1):?>
								<tr><td><a href='./wishlist/<?php echo $a1->Codename; ?>'><?php echo $a1->Codename; ?></a></td></tr>
							<?php endforeach; ?>
						</table>
					</div>
					<div class='col2'>
						<table border='1'>
							<th>Manito/Manita</th>
				<?php foreach($result2 as $a2): ?>
							<tr><td><a href='./wishlist/<?php echo $a2->Codename; ?>'><?php echo $a2->Codename; ?></a></td></tr>
				<?php endforeach; ?>
						</table>
					</div>
				</div>
			<?php endif; ?>
			
			<!--div class='pairs'>
				<div class='col1'>
					<table border='1' style='float:right;'>
						<th>Codenames</th>
						<tr><td><a href=''>asdf</a></td></tr>
						<tr><td><a href=''>asdf</a></td></tr>
						<tr><td><a href=''>asdf</a></td></tr>
					</table>
				</div>
				<div class='col2'>
					<table border='1'>
						<th>Manito/Manita</th>
						<tr><td><a href=''>asdf</a></td></tr>
						<tr><td><a href=''>asdf</a></td></tr>
						<tr><td><a href=''>asdf</a></td></tr>
					</table>
				</div>
			</div-->
			
		</div>
	</div>
