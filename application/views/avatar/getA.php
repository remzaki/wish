
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="./home"></a></div></div>
			<div id="menu_btn" class="ava" style="background:#FF7F7F;"><p>Avatar</p><div id="ava_img" class="menu_img"></div></div>
			<div id="menu_btn" class="wsh"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="./codenames"></a></div></div>
		</div>
		<div id="content">
			<div class="avmenu">
				<li><div title="Change your Avatar pic. You can choose plenty of Avatars that will suit you."><a href="./avatar?g=A" style="border-bottom:2px solid #4082E6;color:#474747;font-weight:bold;">Avatar</a></div></li>
				<li><div title="Update your wishlist so that your Manito/Manita would know what to wrap up."><a href="./avatar?g=W">Wishlist</a></div></li>
				<!--li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="./avatar?g=M">Manito/Manita</a></div></li-->
				<li><div title="See whos your lucky Manito/Manita. Be conscious no other than you will see it!"><a href="">Manito/Manita</a></div></li>
				<li><div title="Change your Avatar PassCode for your convenience."><a href="./avatar?g=P">Passcode</a></div></li>
				<li><div title="Exit Avatar page. You will be redirected to the Home page."><a href="./home">Exit</a></div></li>
			</div>
			<div class="avclose">
				<a href="avatar">Click Here to Clear Display</a>
			</div>
			<div>
				<div class="av_select"><!-- start .av_select -->
					<script>function avapick(e){var tava = (e.target.getAttribute('id'));document.getElementById('avainp').value=tava;for (var avafile=1281001; avafile<1281069; avafile++){document.getElementById(avafile).style.background='white';}var hylyt = document.getElementById('avainp').value;onmouseup = document.getElementById(hylyt).style.background='#9F9F9F';}function hylyt(u){u.target.style.border='1px solid #4082E6';}function dhylyt(d){d.target.style.border='1px solid #A3A3A3';}</script>
					<div class="av_list" onclick="avapick(event)" ><!-- start .av_list --><?php for($avafile=1281001; $avafile<=1281068; $avafile++):?> 
						<li><img id="<?php echo $avafile?>" src="./resources/images/avatars/<?php echo $avafile?>.png" height="45px" width="45px" onmouseover="hylyt(event)" onmouseout="dhylyt(event)"></li><?php endfor;?> 
					</div>
					<!-- end .av_list -->
					<div class="av_control">
						<div class="av_btns">
							<?php echo form_open('wish/avatar?g=A');?>
								<input id="avainp" type="hidden" value="" name="avatar" />
								<input type="submit" value="Save" />
								<input type="button" value="Cancel" onclick="window.location.href='./avatar';" />
								<?php echo form_error('avatar', '<span id="message">', '</span>');?>
							</form>
						</div>
						<!--div class="av_current">
							<div class="avc_display"><img class="avc_display" src="./resources/images/avatars/<?php echo $Avatar;?>.png" alt="Avatar Pic" height="45px" width="45px" /></div>
							<div class="avc_label">Current Avatar Picture</div>
						</div-->
					</div>
					<!-- end of .av_control-->
				</div>
				<!-- end of .av_select -->
				
			</div>
		</div>
	</div>
