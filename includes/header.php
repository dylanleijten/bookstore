<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>BookStore</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="layout/css/bootstrap.min.css">
        <link rel="stylesheet" href="layout/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="layout/css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="layout/css/main.css">

        <script src="js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<li class="shopping-cart-items"><i class="glyphicon glyphicon-shopping-cart icon-white"></i> <a href="<?= url('shopping-cart') ?>"><b><?= User::get()->cart->count() ?> product(en)</b></a></li>
							<li>
								<div class="dropdown choose-country">
							<div id="google_translate_element"></div><script type="text/javascript">
                            function googleTranslateElementInit() {
                              new google.translate.TranslateElement({pageLanguage: 'nl', includedLanguages: 'de,en,fr,nl', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                            }
                            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
								</div>
							</li>
			        		<li>
								<?php if(!User::auth()): ?>
									<a href="<?= url('login') ?>">Inloggen</a>
								<?php else: ?>
									<a href="<?= url('uitloggen') ?>">Uitloggen</a>
								<?php endif; ?>
							</li>
			        	</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="<?= url('products') ?>"><h3>BookStore</h3></li>
						<li class="<?= active('index') ?>">
							<a href="<?= url('index') ?>">Home</a>
						</li>
						<li class="<?= active('products') ?>">
							<a href="<?= url('products') ?>">Producten</a>
						</li>
                        <?php if(User::auth()): ?>
                        <li class="<?= active('mijnbestellingen') ?>">
                            <a href="<?= url('mijnbestellingen') ?>">Mijn bestellingen</a>
                        </li>
                        <?php endif; ?>
						<li class="has-submenu">
							<a href="#">Pagina's</a>
							<div class="mainmenu-submenu">
								<div class="mainmenu-submenu-inner"> 
									<div>
										<h4>Homepage</h4>
										<ul>
											<li><a href="<?= url('index') ?>">Homepage</a></li>
										</ul>
									</div>
									<div>
										<h4>Algemene Pagina's</h4>
										<ul>
											<li><a href="<?= url('contact') ?>">Contact Us</a></li>
											<li><a href="<?= url('register') ?>">Login</a></li>
											<li><a href="<?= url('register') ?>">Register</a></li>
											<li><a href="<?=url('privacy_verzend')?>">Privacy & Verzendvoorwaarden</a></li>
										</ul>
									</div>
								</div><!-- /mainmenu-submenu-inner -->
							</div><!-- /mainmenu-submenu -->
						</li>
					</ul>
				</nav>
			</div>
		</div>