<?php $base_url = BASEURL; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Shopper</title>
    <link href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css" rel="stylesheet" >
    <link href="<?php echo $base_url; ?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo $base_url; ?>/assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>/assets/css/main.css" rel="stylesheet">
	<link href="<?php echo $base_url; ?>/assets/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo $base_url; ?>/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $base_url; ?>/assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $base_url; ?>/assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $base_url; ?>/assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $base_url; ?>/assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +55 31 3899-1792</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> contato@pickashoe.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?php echo $base_url; ?>home"><img src="<?php echo $base_url; ?>/assets/images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
                        <li>Bem Vindo <?php echo (isset($_SESSION['nome'])) ? $_SESSION['nome'] : "Visitante"; ?></li>
								<!--li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li-->
								<li><a href="<?php echo $base_url; ?>home/carrinho"><i class="fa fa-shopping-cart"></i> Carrinho</a></li>
								<?php 
                        if(isset($_SESSION['email'])) { ?>
                           <li><a href="<?php echo $base_url; ?>perfil"><i class="fa fa-lock"></i> Minha Conta</a></li>
                           <li><a href="<?php echo $base_url; ?>logout"><i class="fa fa-lock"></i> Logout</a></li>
                        <?php 
                        }
                        else { ?>
                           <li><a href="<?php echo $base_url; ?>login"><i class="fa fa-lock"></i> Login</a></li>
                        <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	</header><!--/header-->