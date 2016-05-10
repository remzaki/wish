
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="../home"></a></div></div>
			<div id="menu_btn" class="ava"><p>Avatar</p><div id="ava_img" class="menu_img"><a href="../avatar"></a></div></div>
			<div id="menu_btn" class="wsh" style="background:#4DB870;"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="../wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="../codenames"></a></div></div>
		</div>		
		<div id="content">
			<script>
				$(document).ready(function(){
					location.hash = 'latest';
				});
			</script>
			<div class="info">
				<img src="../resources/images/menu/1373904643_info_32.png">
				<span>Codenames and Wishlists are viewed here. You may also add comments.</span>
			</div>
			<div class="part">
				<div id='comment'>
					<div class='c_details'>
						<div class='c_det_pic'>
							<a href='<?php echo base_url('wish/wishlist/'.$codename);?>'><img src='../resources/images/avatars/<?php echo $avatar;?>.png' height='50' width='50'></a>
						</div>
						<div class='c_det_inf'>
							<div id='' class='' style='margin-left:0;'></div>
							<div class='c_det_inf_coat'>
								<p><a href='<?php echo base_url('wish/wishlist/'.$codename);?>'><strong><?php echo $codename;?></strong></a> wishes a <em><?php echo $wishitem;?></em></p>
								<p style='margin-top:-5px;' title='<?php echo $wishdesc;?>'><?php echo $wishdesc;?></p>
							</div>
						</div>
						<div class='c_det_act'>
							<!--input type='button' value='Back to List' onclick="window.location.href='/wish/wishlist'" /-->
							<input type='button' value='Back to List' onclick="window.location.href='<?php echo base_url('wish/wishlist')."#".$codename;?>'" />
						</div>
					</div>
					<div class='c_list'>
					
						<div class='comment_list'>
							<!-- Displaying Comments -->
					<?php if(count((array)$comments)!=0): ?>
						<?php $bool = TRUE; foreach ($comments as $row): ?>
							<?php
								if($bool){
									$color = 'x';
									$arrow = 'right';
								}
								else{
									$color = 'y';
									$arrow = 'left';
								}
								$bool = !$bool;
							?>
							
							<div id='converse' class='<?php echo $arrow; ?>'></div>
							<div id='<?php echo $color; ?>' class='bubble'>
								<div class='bubble_str'>
									<?php $str=$row->Comment;$str = parse_smileys($str, "http://wphrc185173-212/wish/resources/images/smilies/"); echo $str; ?>
									
								</div>
								<div class='bubble_date'>
									<?php echo "<span style='padding-right:1em;'>(User ID: <strong>".strtoupper(hash('crc32', $row->User))."</strong>)</span> ".$row->DateStamp;?>
									
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
							<div class='none'>
									<p>Awww, No Comments :( </p>
									<p>Why don't you add some comments for this guy? Just type it below.</p>
							</div>
					<?php endif; ?>
						
							<div id='latest'></div>
						</div>
						<!-- End Displaying Comments -->
						<div class='comment_form'>
							<div class='form_display'>
								<?php echo form_open('wish/comment/'.$codename); ?>
									<!--textarea name='comment' cols='62' rows='1' placeholder='Add your comment here...' autofocus></textarea-->
									<input id='textarea' name='comment' placeholder='Add your comment here...' autofocus />
									<input id='input' type='submit' value='Comment' style='float:right;' />
								</form>
							</div>
						</div>
					
					</div>
					
				</div>
			</div>
		</div>
	</div>
