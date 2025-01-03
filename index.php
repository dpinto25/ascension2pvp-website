<?php
	@ob_start();
	include 'include/functions/header.php';
?>
<!DOCTYPE html>
<html lang="<?php print $language_code; ?>"<?php if(in_array($language_code, $rtl)) print ' dir="rtl"'; ?>>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8" />

    <title><?php print $site_title.' - '.$title; if($offline) print ' - '.$lang['server-offline']; ?></title>

	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="<?php print $site_url; ?>theme1/css/bootstrap.css?v=1.1">
	<link href="<?php print $site_url; ?>theme1/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php print $site_url; ?>theme1/css/normalize.css" rel="stylesheet">
	<link href="<?php print $site_url; ?>theme1/css/main.css?v=1.1" rel="stylesheet">
	<?php if($page=="admin" && $a_page=="player_edit") { ?>
    <link rel='stylesheet' href='<?php print $site_url; ?>css/bootstrap-select.css'/>
	<?php } ?>
	<link rel="shortcut icon" href="<?php print $site_url; ?>images/favicon.ico?v=" />
</head>

<body>
	<div id="mt2cms">
		<div class="mt2cms_logo_bg"><a href="<?php print $site_url; ?>"></a></div>
		<?php
			if($item_shop!="")
				$shop_url = $item_shop;
			else if(is_dir('shop')) 
				$shop_url = $site_url.'shop'; 
			else $shop_url = ''; 
		?>
		<div class="mt2cms_menu">
			<ul class="mt2cms_menu_content">
				<li><a href="https://ascension2pvp.com/ishop">Itemshop</a></li>
				<?php if(!$database->is_loggedin()) { ?>
				<li><a href="<?php print $site_url; ?>download"><?php print $lang['download']; ?></a></li>
				<li><a href="<?php print $site_url; ?>users/login"><?php print $lang['login']; ?></a></li>
				<?php } else { ?>
				<li><a href="<?php print $shop_url; ?>" target="_blank"><?php print $lang['item-shop']; ?></a></li>
				<li><a href="<?php print $forum; ?>" target="_blank">Forum</a></li>
				<?php } ?>
				<li class="btn-download">
				<?php if(!$database->is_loggedin()) { ?>
					<a href="<?php print $site_url; ?>users/register"><?php print $lang['register']; ?></a>
				<?php } else { ?>
					<a href="<?php print $site_url; ?>download"><?php print $lang['download']; ?></a>
				<?php } ?>
				</li>
				<li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php print $lang['ranking']; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php print $site_url; ?>ranking/players"><?php print $lang['players']; ?></a></li></br>
                            <li><a href="<?php print $site_url; ?>ranking/guilds"><?php print $lang['guilds']; ?></a></li></br>
                        </ul>
                    </li>
				</li>
				<li>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php print $json_languages['languages'][$language_code]; ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
							<?php
								foreach($json_languages['languages'] as $key => $value)
									print '<li><a href="'.$site_url.'?lang='.$key.'">'.$value.'</a></li></br>';
							?>
                        </ul>
                    </li>
				</li>
			</ul>
		</div>

		<div class="padding-menu">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php print $site_url; ?>"><?php print $site_title; ?></a>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="https://ascension2pvp.com/ishop">Itemshop</a></li>
							<?php if(!$database->is_loggedin()) { ?>
							<li><a href="<?php print $site_url; ?>download"><?php print $lang['download']; ?></a></li>
							<li><a href="<?php print $site_url; ?>users/login"><?php print $lang['login']; ?></a></li>
							<?php } else { ?>
							<li><a href="<?php print $shop_url; ?>" target="_blank"><?php print $lang['item-shop']; ?></a></li>
							<li><a href="<?php print $forum; ?>" target="_blank">Forum</a></li>
							<?php } ?>
							<li class="btn-download">
							<?php if(!$database->is_loggedin()) { ?>
								<a href="<?php print $site_url; ?>users/register"><?php print $lang['register']; ?></a>
							<?php } else { ?>
								<a href="<?php print $site_url; ?>download"><?php print $lang['download']; ?></a>
							<?php } ?>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $lang['ranking']; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="<?php print $site_url; ?>ranking/players"><?php print $lang['players']; ?></a></li>
									<li><a href="<?php print $site_url; ?>ranking/guilds"><?php print $lang['guilds']; ?></a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php print $json_languages['languages'][$language_code]; ?> <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<?php
										foreach($json_languages['languages'] as $key => $value)
											print '<li><a href="'.$site_url.'?lang='.$key.'">'.$value.'</a></li>';
									?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="mt2cms_main clearfix">
			<div class="mt2cms_main_left col-md-3">
				<?php include 'include/sidebar/ranking.php'; ?>
			</div>
			
			<!-- Middle -->
			<div class="mt2cms_main_middle col-md-6">
				<div class="mt2cms_main_box_middle">
							
					<div class="panel panel-default">
						<?php
							include 'pages/'.$page.'.php';
						?>
					</div>
				</div>				
			</div>
			
			<div class="mt2cms_main_right col-md-3">
				<?php
					include 'include/sidebar/user.php'; 
					if(!$offline && $statistics)
						include 'include/sidebar/statistics.php';
				?>
			</div>
		</div>
	</div>
	
	<div id="footer">
		<div id="footer_navigator_items_list" class="noselect">
			<div class="footer_navigator_item"><a href="<?php print $forum; ?>" target='_blank'>Forum</a>
			</div>
			<div class="footer_navigator_item"><a href="<?php print $support; ?>" target='_blank'><?php print $lang['support']; ?></a>
			</div>
			<div class="footer_navigator_item" style="margin-right:0px;"><a href="<?php print $shop_url; ?>" target='_blank'><?php print $lang['item-shop']; ?></a>
			</div>
		</div>
		<div id="social_networks">
			<div class="footer-nav">
				<div class="social">
					<?php print $social_links; ?>
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="<?php print $site_url; ?>js/jquery-2.2.4.min.js"></script>
	<?php include 'include/functions/footer.php'; ?>
	<script src="<?php print $site_url; ?>js/tether.min.js"></script>
    <script src="<?php print $site_url; ?>js/bootstrap.min.js"></script>
</body>

</html>