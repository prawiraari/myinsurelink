<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="zh-Hans">
<head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8"> 

	<title><?php echo APP_NAME; ?> | 主页</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- FAVICON -->
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.ico">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">

	<!-- ICONS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/css/icons/fontawesome/css/style.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/icons/style.css">

	<!-- THEME / PLUGIN CSS -->
	<link rel="stylesheet" href="<?=base_url()?>assets/js/vendors/slick/slick.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/prettyphoto.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/style.css">
    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script>
	  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-102231692-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>


<body id="page-top">

<div class="body">
	<!-- HEADER -->
	<header>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="row hidden">
					<div class="nav-language">
						<ul>
							<li><a href="<?=base_url()?>zh-CN">中</a></li>
							<li><a href="<?=base_url()?>en">EN</a></li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="navbar-header">
						<a class="navbar-brand" href="<?php echo site_url(); ?>"><?php echo APP_NAME; ?></a>
					</div>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li><a class="page-scroll" href="#page-top">主页</a></li>
							<li><a class="page-scroll" href="#features">保障</a></li>
							<!-- <li><a class="page-scroll" href="#detail">Policy Detail</a></li> -->
							<li><a class="page-scroll" href="#services">援助</a></li>
							<li><a class="page-scroll" href="#faq">常见问题</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
	</header>