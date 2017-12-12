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
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

	<!-- ICONS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icons/fontawesome/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/icons/style.css">

	<!-- THEME / PLUGIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>


<body id="page-top">

<div class="body">

<!-- FAQ CONTENT -->
<section class="faq-content" id="faq">
	<div class="container">
		<div class="section-head text-center col-md-8 col-md-offset-2 space60">
			<h1>常见问题</h1>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1">

				<div id="1" class="faq-inner">
					<h2>Tune 旅游保险</h2>
					<p><?php echo APP_NAME; ?>- 关于 Tune 旅游保险</p>
				</div>

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-one">请问购买这旅游保险有年龄限制吗？
								</a>
							</h4>
						</div>
						<div id="accordion1-one" class="panel-collapse collapse">
							<div class="panel-body">
								投保年龄限于17至75岁。
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-two">倘若我已经从原地出发起飞，我还能购买此旅游保险吗？
								</a>
							</h4>
						</div>
						<div id="accordion1-two" class="panel-collapse collapse">
							<div class="panel-body">
								不能，此旅游保险必须在起飞行程之前购买。
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-three">我需要更改我的联络讯息或行程资料，该如何呈上？
								</a>
							</h4>
						</div>
						<div id="accordion1-three" class="panel-collapse collapse">
							<div class="panel-body">
								你可以直接邮电至<a href="mailto:hello@tuneprotect.com">hello@tuneprotect.com</a>
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-four">请问紧急事故，我能联络哪家公司？
								</a>
							</h4>
						</div>
						<div id="accordion1-four" class="panel-collapse collapse">
							<div class="panel-body">
								公司：Asia Assistance Network (M) Sdn Bhd AA One<br>
								地址：No 1, Block N, Jaya One, 72A, Jalan Universiti, 46200 Petaling Jaya, Malaysia.<br>
								联络电话: +603-7841 5788
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-five">我可怎样申请索赔呢？
								</a>
							</h4>
						</div>
						<div id="accordion1-five" class="panel-collapse collapse">
							<div class="panel-body">
								<ul>
									<li>请在这个网址下载并完成 表格，按传真号或电邮地址把完整的资料发送进行索赔：<a href="https://www.tuneprotect.com/claim/claim-now/" target="_blank">https://www.tuneprotect.com/claim/claim-now/</a></li>
									<li>若想要知道索赔成果：<a href="https://www.tuneprotect.com/claim/claim-status/" target="_blank">https://www.tuneprotect.com/claim/claim-status/</a></li>
									<li>所有索赔申请须于事件发生后三十日内，尽快向亚太财产保险有限公司提出申请：<a href="https://www.tuneprotect.com/corporate/malaysia/contact-us/" target="_blank">https://www.tuneprotect.com/corporate/malaysia/contact-us/</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-six">索赔时若没有个人财产的收据证明，能够索赔吗？
								</a>
							</h4>
						</div>
						<div id="accordion1-six" class="panel-collapse collapse">
							<div class="panel-body">
								您必须有资料或文件证明财产的拥有权，我们才能进行索赔程序。我们可以接受财产担保证明书为证据。
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-seven">孕妇购买旅游保险，是否保障所有关于怀孕的症状？
								</a>
							</h4>
						</div>
						<div id="accordion1-seven" class="panel-collapse collapse">
							<div class="panel-body">
								旅游保险不受报一切关于怀孕有关的疾病，除非因意外受伤流产，详情参阅保单内容。
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-eight">如果我的签证不被批准，是否能够取消旅游保险？
								</a>
							</h4>
						</div>
						<div id="accordion1-eight" class="panel-collapse collapse">
							<div class="panel-body">
								保单不投保任何有关政府，相关调理被拒入境／出境的理由。
							</div>
						</div>
					</div>
					<!-- /.panel -->

					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#accordion1-nine">若我的行李被偷窃，我必须怎样？
								</a>
							</h4>
						</div>
						<div id="accordion1-nine" class="panel-collapse collapse">
							<div class="panel-body">
								若在飞行期间行李被偷窃，必须立即通知相关单位负责人。若行行李在公共交通或酒店被偷窃，必须立即向警局报案，及在24小时内通知我们。必须呈交警局报告来获得因偷窃的赔偿。
							</div>
						</div>
					</div>
					<!-- /.panel -->
				</div>
			</div>
		</div>
	</div>
</section>

</div>

<!-- JAVASCRIPT =============================-->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>