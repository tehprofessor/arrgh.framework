<?php /* Smarty version Smarty-3.0.8, created on 2011-08-29 07:19:50
         compiled from "/Users/seve/Sites/sockdreams/views/layouts/default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14763655064e5b2f8695b410-31381244%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0df60dac95e6b0708b57e57faa91ff688d3830f9' => 
    array (
      0 => '/Users/seve/Sites/sockdreams/views/layouts/default.tpl',
      1 => 1314598789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14763655064e5b2f8695b410-31381244',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<html>
	<head>
		
		<script src="<?php echo $_smarty_tpl->getVariable('js')->value;?>
jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('js')->value;?>
jquery-ui.js" type="text/javascript" charset="utf-8"></script>
		<script src="<?php echo $_smarty_tpl->getVariable('js')->value;?>
application.js" type="text/javascript" charset="utf-8"></script>
		
		<style type="text/css" media="screen">
			body {
				margin:0 0 0 0;
				padding:0 0 0 0;
			}
			a:link,a:hover,a:link,a:visited {
				text-decoration:none;
			}
			#page-wrapper {
				width:976px;
				padding:0px;
				height:auto;
				margin:0px auto 0px auto;
			}
			#background-image {
				position: relative;
				background-image: url("/images/bg-edges-main.gif");
				background-repeat: no-repeat;
				background-position: center 0px;				
				width: 100%;
				font-size: 80%;
				min-height:1700px;
			}
			#header {
				position: relative;
				margin: 0px;
				padding: 0px;
				background-image:url('/images/mainheader.jpg');
				background-repeat: no-repeat;
				background-position: 223px 0px;
				text-align: left;
				height: 392px;
				width: 976px;
				float: none;
			}
			#banner-cart-link {
				position: absolute;width: 165px;left: 0px;height: 100px;top: 140px;
			}
			#banner-cart-status {
				font-family: Georgia, "Times New Roman", Times, serif; 
				color: #FFFFFF;
				font-size:12px; 
				font-weight: bold;
				position: absolute;
				top: 242px;
				left: 37px;
			}
			#header-navigation {
				float:left;
				list-style-type:none;
				width:600px;
			}
			/* This hover method causes flash while an image is loaded could be and should be corrected through using sprites */
			/* It would also alleviate a lot of the JS preloading on the production version */
			#header-navigation li.socks a {
				width: 110px;
				height: 32px;
				background-image: url('/images/menu1-socks.gif');
				position: absolute;
				top: 157px;
				left: 285px;
			}
			#header-navigation li.socks a:hover {
				background-image:url('/images/menu1-socks-sel.gif');
			}
			#header-navigation li.accessories a {
				position: absolute;
				top: 185px;
				left: 303px;
				width: 212px;
				height: 40px;
				background-image: url('/images/menu1-accessories.gif');
			}
			#header-navigation li.accessories a:hover {
				background-image:url('/images/menu1-accessories-sel.gif');
			}
			#header-navigation li.giftcards a {
				position: absolute;
				top: 229px;
				left: 500px;
				width: 197px;
				height: 32px;
				background-image: url('/images/menu1-giftcards.gif');
			}
			#header-navigation li.giftcards a:hover {
				background-image:url('/images/menu1-giftcards-sel.gif');
			}
			#header-navigation li.sale-items a {
				position: absolute;
				top: 187px;
				left: 530px;
				width: 160px;
				height: 25px;
				background-image: url('/images/menu1-sale-items.gif');
			}
			#header-navigation li.sale-items a:hover {
				background-image:url('/images/menu1-sale-items-sel.gif');
			}
			#header-navigation li.whatsnew a {
				position: absolute;
				top: 125px;
				left: 465px;
				width:214px;
				height:49px;
				background-image:url('/images/menu1-whatsnew.gif');
			}
			#header-navigation li.whatsnew a:hover {
				background-image:url('/images/menu1-whatsnew-sel.gif');
			}
			div#body {
				position: absolute;
				margin: 0px;
				padding: 0px;
				height: auto;
				width: 924px;
				z-index: 10;
				top: 292px;
			}
			#right {
				float:right;
				width:679px;
				height:355px;
				background-image:url("/images/page-header.jpg");
			}
			#compass {
				float: left;
				width: 244px;
				height: 244px;
				background-image: url('/images/compass-placeholder.jpg');
				margin-left: 44.3px;
				margin-top: 22.5px;
			}
			#flash_compass {
				margin-left: 0px;
				margin-top: -0.4px;
				float: left;
			}
			h2.greeting {
				float: left;
				margin-left: -30px;
				margin-top: 12px;
				width: 385px;
			}
			#intro-copy {
				float: right;
				width: 375px;
				margin: 8px 14px 0 0;
			}
			#intro-copy p {
				float: left;
				margin-top: 4px;
				font-family: Georgia, "Times New Roman", Times, serif;
				line-height: 140%;
			}
			
			#right a {
				color: #277772;
			}
			.journal-title {
				color: #277772 !important;
				font-size: 20px;
				font-family: "Courier New", Courier, monospace;
			}
			.journal-text {
				font-family: Georgia, "Times New Roman", Times, serif;
				color: #333;
			}
			.left .journal-text {
				margin-top:-10px;
			}
			.left .journal-title,.right .journal-title {
				font-size: 18px;
				line-height: 140%;
			}
			.right .journal-title {
				font-size: 18px;
				margin-top: 56px;
				margin-left: 1px;
			}
			.right .journal-text {
				position: absolute;
				height: 75px;
				z-index: 5;
				top: 77px;
				margin-left: 1px;
			}
			#journal-wrapper {
				float: left;
				width: 678px;
				height: 405px;
				background-image: url('/images/paper-tile.jpg');
				background-position: 0px 155px;
				background-repeat: no-repeat;
				margin-top: -66px;
			}
			#journal-container {
				float:left;
				width:665px;
				height:230px;
				background-image:url('/images/journal-top.png');
				background-repeat:no-repeat;
			}
			#journal {
				float: left;
				width: 100%;
				margin-top: 230px;
				height: 145px;
				background-image: url('/images/journal-bg.png');
			}
			#journal-bottom {
				width: 665px;
				height: 93px;
				background-image: url('/images/journal-bottom-2.gif');
				position: absolute;
				top: 492px;
			}
			#journal-body .left {
				position: absolute;
				top: 329px;
				margin-left: 64px;
				width: 230px;
			}
			#journal-body .right {
				position: absolute;
				top: 376px;
				margin-left: 385px;
				width: 220px;
				height: 235px;
			}
			a#sock-journal {
				width: 100px;
				height: 46px;
				position: absolute;
			}
			#content {
				float: left;
				background-image: url('/images/paper-tile.jpg');
				background-position: 0px 105px;
				font-family: Georgia, "Times New Roman", Times, serif;
				line-height: 140%;
			}
			#content .left {
				width: 299px;
				float: left;
				margin-left: 30px;
				margin-top: -7px;
			}
			#content .right {
				float: right;
				width: 350px;
			}
			#content .title {
				color: #48383E !important;
			}
			#acceptedcards {
				background-image: url('/images/card-logos-strip.png');
				width: 275px;
				height: 33px;
				float: left;
				margin: 25px 0 0 24px;
			}
			#content .right .text-padding {
				width: 293px;
				float: left;
				margin-top: 19px;
				margin-left: 24px;
			}
			#content .right .text-padding p.text {
				margin: 0px;
				line-height: normal;
			}
			#content .right .text-padding p.text.rust {
				float: left;
				margin-top: 12px;
				line-height: 18px;
				margin-bottom: 12px;
			}
			.more {
				font-weight:bold;
				color: #348F2F;
			}
			.hidden {
				display:none;
			}
			.bold {
				font-weight:bold;
			}
			.red {
				color: #AE3572;
			}
			.rust {
				color: #9E5218;
			}
			.horizontal-seperator {
				float: left;
				width: 100%;
				height: 24px;
				background-position: center top;
				background-repeat: no-repeat;
				background-image: url('/images/center-divider-1.gif');
			}
			#left {
				float:left;
				width:245px;
				height:802px;
				background-image:url('/images/lhs-bg-long.jpg');
			}
			#search-form {
				float: left;
				margin-top: 94px;
				margin-left: 50px;
			}
			#search {
				width: 99px;
				background: transparent;
				border: none;
				height: 24px;
				outline: none;
				margin-left: 6px;
			}
			#search_submit {
				margin-left: 8px;
				height: 28px !important;
				float: left;
				width: 68px;
				border: none;
				outline: none;
			}
		</style>
		<script type="text/javascript" charset="utf-8">
			
		</script>
	</head>
	<body>
		<div id="background-image">
			<div id="page-wrapper">
				<div id="header">
					<a title="view your shopping cart" id="banner-cart-link" href="/cart"></a>
					<a id="banner-cart-status" href="/cart" title="view your shopping cart">
					<span>empty</span>
					</a>
					<a title="Sock Dreams Main Page" style="float:right;margin-top: 60px;height: 230px;width: 305px;" href="/">

					</a>
					
					<ul id="header-navigation"  class="name">
						<li class="socks">
							<a href=""></a>
						</li>
						<li class="accessories">
							<a href=""></a>
						</li>
						<li class="giftcards">
							<a href=""></a>
						</li>
						<li class="sale-items">
							<a href=""></a>
						</li>
						<li class="whatsnew">
							<a href=""></a>
						</li>
					</ul>
				</div>
				<div id="body">
					<div id="left">
						<form id="search-form" action="/search">
						<input type="text" name="search" id="search" value="sock search..."/>
						<input type="hidden" value="authenticity_token" />
						<input type="image" src="/images/clear.gif" id="search_submit" value="go">
						</form>
					</div>
					<div id="right">
						<div id="compass">
							<object id="flash_compass" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="244" height="244" id="sdcompass" wmode="transparent">
											<param name="movie" value="/flash/compass.swf?r=428">
											<param name="play" value="true">
											<param name="loop" value="true">
											<param name="menu" value="false">
											<param name="quality" value="high">
											<param name="wmode" value="transparent">
											<param name="devicefont" value="true">
											<param name="swliveconnect" value="false">
											<param name="allowfullscreen" value="false">
											<param name="flashvars" value="samplevar=test">
											<!--[if !IE]>-->
											<object type="application/x-shockwave-flash" data="/flash/compass.swf?r=836" width="244" height="244" wmode="transparent">
												<param name="play" value="true">
												<param name="loop" value="true">
												<param name="menu" value="false">
												<param name="quality" value="high">
												<param name="wmode" value="transparent">
												<param name="devicefont" value="true">
												<param name="swliveconnect" value="false">
												<param name="allowfullscreen" value="false">
												<param name="flashvars" value="samplevar=test">
											<!--<![endif]-->

											<!--[if !IE]>-->
											</object>
											<!--<![endif]-->
							 </object>
						</div>
						<div id="intro-copy">
							<h2 class="greeting journal-title">Welcome Sock Dreamers!</h2>
							<p>Regardless of the weather, or season...<br>
							 we have <a href="http://www.sockdreams.com/products/socks/">lots of socks</a> (&amp; <a href="http://www.sockdreams.com/products/accessories/">more</a>) in many styles, colors &amp; sizes with <a href="http://www.sockdreams.com/products/whats-new">new stuff</a> &amp; restocks arriving all the time.<br>
							<br>Even on our busiest days our highly experienced crew of Sock Dreamers can get your order out the door and on its way within a day and if you have any questions or concerns we're only an email or a phone call away.<br>
							<br></p>
						</div>
						<div id="journal-wrapper">
								<div id="journal-container">
									<div id="journal">
										
									</div>
									<div id="journal-body">
											<div class="left">
											<p class="journal-title"><a class="bold" href="http://blog.sockdreams.com/automatic-magic?sc=0B684E1D5439C38F18876&amp;o=12209859">Automatic Magic</a></p>
											<p class="journal-text">Sometimes we're surprised to find out that a style we thought was going to be restocked is actually gone forever.  It's always a bummer and it's even worse if you're waiting for something to come back and you don't know...<a href="http://blog.sockdreams.com/automatic-magic?sc=0B684E1D5439C38F18876&amp;o=12209859" class="more">more &raquo;</a>
											</p>
											</div>
											<div class="right">
												<div class="journal-link">
													<a id="sock-journal" href="http://blog.sockdreams.com/category/sock-journal/?sc=0B684E1D5439C38F18876&amp;o=12209859">
														<span class="hidden">Sock Journal:</span>
													</a>
												</div>
                             				<p class="journal-title"><a class="bold" href="http://blog.sockdreams.com/socks-for-sandals?sc=0B684E1D5439C38F18876&amp;o=12209859">Socks for Sandals</a></p>
											<p class="journal-text">
															Fall may be around the corner, but it's still warm enough for sandals. 
															Before that weather goes away, here are some socky options for flip-flops and slides.... 
															<a href="http://blog.sockdreams.com/socks-for-sandals?sc=0B684E1D5439C38F18876&amp;o=12209859" class="more">more &raquo;</a>
											</p>
											</div>
									</div>
									<div id="journal-bottom">
										
									</div>
								</div>
						</div>
						<div id="content">
							<div class="left">
								  <p class="title"><strong>Top reasons to shop at Sock Dreams:</strong></p>
							<ul>
								<li><span class="red">Free Shipping</span> within the US</li>
								<li>Shop early or late, no crowds, ever</li>
								<li>No driving or parking required</li>
								<li>You can never have too many socks!</li>
							</ul>
							<p class="title"><strong>Need more reasons?</strong></p>
							<ul>
								<li>We ship most orders within <span class="red">24 hours</span></li>
								<li>We personally test everything we sell</li>
								<li>We love what we do</li>
							</ul>

							</div>
							<div class="right">
								<div id="acceptedcards">
									<p class="hidden">We accept payment via MasterCard, VISA, American Express, Discover or PayPal.</p>
								</div>
								<div class="text-padding">
								<p style="margin:0px;">Order securely online 24 hours a day</p>
								<p class="text" style="margin: -2px 0 0 0;"> or <a href="http://www.sockdreams.com/store/location-and-hours/">shop in person in Portland</a>, please note that our shop is not located in our warehouse and does not always contain the same stock.</p>
								<p class="text rust"><em>Selling socks online for over 10 years...  <br>we know our socks, inside &amp; out and we frequently add <a href="/products/whats-new/">fresh new items</a> while replenishing customer favorites so if we happen to be out of what you're looking for check back soon... it, or something even better, is sure to arrive!</em></p>
								</div>
							</div>
							<div class="horizontal-seperator"></div>
						</div>
					</div>
					<?php $_template = new Smarty_Internal_Template(($_smarty_tpl->getVariable('yield')->value), $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
				</div>
			</div>
		</div>
	</body>
</html>
