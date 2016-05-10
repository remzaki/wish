

	<script>
		$(document).ready(function(){
			function search(q){
				$.ajax({
					type: "get", url: "<?php echo base_url("wish");?>/wishlist/search", cache: false, data: 'search='+q, dataType: 'json', success: function(response){
						$('#results').html("");
						var obj = response;
						if(obj.length!=0){
							try{
								var items=[];
								$.each(obj, function(i, val){
									var codename = encodeURI(val.Codename);
									var wishitem, wishdesc, attr_lnk, attr_img;
									if((val.WishDesc!='') || (val.WishItem!='') || (val.Link!='')){
										wishitem = "("+val.WishItem+")";
										wishdesc = val.WishDesc;
									}
									if(val.Upload !=''){
										attr_img = "avatar_pic";
									}
									if(val.Link !=''){
										attr_lnk = "avatar_link";
									}
									
									items.push($('<div/>').attr({"id":(codename), "class":"avatar"}).append	// <div class='avatar'>
										(
											$('<div/>').attr({"class":"avatar_pic"}).append		// <div class='avatar_pic'>
											(
												$('<a/>').attr({"href":"./wishlist/"+(codename)}).append(
													$('<img/>').attr({"src":"./resources/images/avatars/"+(val.Avatar)+".png", "height":"70", "width":"70"})
												)
											)
										).append
										(
											$('<div/>').attr({"class":"avatar_details"}).append
											(
												$('<div/>').attr({"class":"avatar_det_a"}).append
												(
													$('<div/>').attr({"id":"det_a_sub"}).append(
														$('<a/>').attr({"href":"./wishlist/"+(codename)}).text(val.Codename)
													).append
													(
														$('<span/>').attr({"id":"desc"}).text(wishitem)
													)
												)
											).append
											(
												$('<div/>').attr({"class":"avatar_det_b"}).append
												(
													$('<div/>').attr({"class":"avatar_desc"}).append
													(
														$('<span/>').text(wishdesc)
													)
												).append
												(
													$('<div/>').attr({"class":"avatar_act"}).append
													(
														$('<a/>').attr({"id":"avatar_comm", "href":"./comment/"+(codename)+"#latest", "title":"View "+(val.Comments)+" Comment(s)"})
													).append
													(
														$('<a/>').attr({"id":"avatar_view", "href":"./wishlist/"+(codename), "title":"View Details"})
													).append
													(
														$('<a/>').attr({"id":attr_lnk, "target":"_blank", "title":"Link is attached"})
													).append
													(
														$('<a/>').attr({"id":attr_img, "title":"Image is attached"})
													)
												)
											)
										)
									);	// </div> end of .avatar
									
								});
								
								$('#results').append.apply($("#results"), items);
								location.hash = location.hash;
								
							}catch(e){
								alert('01 Exception while request');
							}
						}else{
							var megusta = "&#x0CA0".toString();
							$('#results').html($('<div/>').attr({'class':'none', 'style':'margin-top:5%;font-size:200%;'}).text("Who are you looking for?"));
							$('#results').append($('<div/>').attr({'class':'none', 'style':'font-size:250%;'}).html(megusta+"_"+megusta));
							$('#results').append($('<div/>').attr('class', 'none').text("No results found, seriously..."));
						}
					},
					error: function(){
						alert('02 Error while request');
					}
				});
			}
			
			/* SPINNER */
			$('#wait').ajaxStart(function() {
				$(this).show();
			}).ajaxComplete(function() {
				$(this).hide();
			});
			/* SPINNER */
			
			var q = "";
			$("#cancel").hide();
			search(q);
			$("#search").keyup(function(){
				if($("#search").val().length>0){
					var q = $("#search").val();
					search(q);
					$("#cancel").show();
				}
				else{
					var q = "";
					search(q);
					$("#cancel").hide();
				}
			});
			
		});
	</script>
	
	<div id="container">
		<div id="menu">
			<div id="menu_btn" class="hme"><p>Home</p><div id="home_img" class="menu_img"><a href="./home"></a></div></div>
			<div id="menu_btn" class="ava"><p>Avatar</p><div id="ava_img" class="menu_img"><a href="./avatar"></a></div></div>
			<div id="menu_btn" class="wsh" style="background:#4DB870;"><p>Wishlist</p><div id="wsh_img" class="menu_img"><a href="./wishlist"></a></div></div>
			<div id="menu_btn" class="cns"><p>Codenames</p><div id="cns_img" class="menu_img"><a href="./codenames"></a></div></div>
		</div>		
		<div id="content">
			<div class="info">
				<img src="./resources/images/menu/1373904643_info_32.png">
				<span>Codenames and Wishlists are viewed here. You may also add comments.</span>
			</div>
			<div class="search" style="height:2.5em;margin-top:0.5em;">
				<div style="float:right;width:24em;line-height:2em;">
					<label style="float:left;padding-right:1em;">Search: </label>
					<input type="text" id="search" name="search" style="float:left;padding-right:2em;" placeholder="Codename" />
					<div style="height:16px;width:16px;float:right;margin-top:5px;"><a id="cancel" href="./wishlist" style="margin-left:-2em;"><img src='./resources/images/menu/1381511006_delete_32.png'></a></div>
				</div>
			</div>
			<div id="results">
				<!--ul id="results"></ul-->
			</div>
			<div id='wait' style=''></div>
		</div>
	</div>
