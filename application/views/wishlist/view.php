<?php
foreach ($result as $row)
{
	$ID = $row->ID;
	$avatar = $row->Avatar;
	$codename = $row->Codename;
	$wishitem = $row->WishItem;
	$wishdesc = $row->WishDesc;
	$link = $row->Link;
	$upload = $row->Upload;
}
if($upload!="" || $upload!=NULL){
	$html = " style='background:url(.$upload) no-repeat center;background-size:60% 100%;height:100%;width:100%;min-height:325px;'>";
}else{
	$html = " style='width:100%;min-height:325px;text-align:center;color:gray;'>NO IMAGE UPLOADED";
}
?>
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="../home"></a></div></div>
			<div id="menu_btn" class="ava"><p>Avatar</p><div id="ava_img" class="menu_img"><a href="../avatar"></a></div></div>
			<div id="menu_btn" class="wsh" style="background:#4DB870;"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="../wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="../codenames"></a></div></div>
		</div>		
		<div id="content">
			<div class="info">
				<img src="../resources/images/menu/1373904643_info_32.png">
				<span>Codenames and Wishlists are viewed here. You may also add comments.</span>
			</div>
			<div class="part">
				<div id='view'>
					<div class='avatar_head'>
						<div class='avatar_img'><img src='../resources/images/avatars/<?php echo $avatar;?>.png'></div>
						<div class='avatar_stat'>
							<div class='avatar_inf'>
								<p id='avatar_cn'><?php echo $codename;?></p>
								<p><?php echo $wishitem;?></p>
								<p title='<?php echo $wishdesc;?>'><?php echo $wishdesc;?></p>
								<p><a href='<?php echo $link;?>' target='_blank'><?php echo $link;?></a></p>
							</div>
							<div class='avatar_usr'>
								<div class='avatar_usr_a'>
									<img src='../resources/images/menu/1382709762_eye.png'>
									<p><label><?php echo $count_views;?></label> <span>Views</span></p>
								</div>
								<div class='avatar_usr_b'>
									<img src='../resources/images/menu/1382710714_bubble.png'>
									<p><label><?php echo $count_comment;?></label> <span>Comments</span></p>
								</div>
							</div>
						</div>
					</div>
					<div class='avatar_cp'>
						<div class='avatar_upl'>
							<div class='uploaded'<?php echo $html;?></div>
						</div>
						<div class='avatar_lbtn'>
							<a href='<?php echo base_url('wish/wishlist')."#".$codename;?>' title='Go Back to Lists'>
								<div class='img'></div>
							</a>
						</div>
						<div class='avatar_rbtn'>
							<a href='<?php echo base_url('wish/comment/'.$codename)."#latest";?>' title='Proceed to Comments'>
								<div class='img'></div>
							</a>
						</div>
					</div>
				</div>
				
				<div id='comment'>
					<div class='c_details'>
						<div class='c_det_pic'>
							<img src='../resources/images/avatars/<?php echo $avatar;?>.png' height='50' width='50'>
						</div>
						<div class='c_det_inf'>
							<div class='converse-l'></div>
							<div class='c_det_inf_coat'>
								<p><strong style='color:green;'><?php echo $codename;?></strong> wishes a <em><?php echo $wishitem;?></em></p>
								<p><?php echo $wishdesc;?></p>
							</div>
						</div>
						<div class='c_det_act'>
							<input type='button' value='See All' onclick="window.location.href='/wish/wishlist'" />
						</div>
					</div>
					<div class='c_list'>
					
						<?php
						foreach ($comments as $row)
						{
							// echo $row->Comment."<br/>";
							echo $comments[0];
						}
						?>
						
						<div class='comment_list'>
							<?php $x=1; while($x<='5'):?>
							<!--div id='<?php echo $x;?>' class='bubble'>
								<div class='bubble_str'>
									The quick brown fox jumps over the lazy dog.
								</div>
							</div-->
							<?php $x++; endwhile;?>
							
							<?php
							// foreach ($comments as $row)
							// {
								// echo "<div class='bubble'>";
								// echo "<div class='bubble_str'>";
								// echo $sample = $row->Comment."<br/>";
								// echo "</div>";
								// echo "</div>";
							// }
							?>
						</div>
						
						<div class='comment_form'>
							comment form
						</div>
					
					</div>
					
				</div>
			</div>
		</div>
	</div>
