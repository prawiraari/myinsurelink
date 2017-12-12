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

<!-- TAB SECTION -->
<section class="features-section" id="features" style="background-color: #fff;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="pricing-table-grid">
			        <thead>
			            <tr class="plan">
			                <th class="plan-info">
			                    <strong>保障</strong>
			                </th>

			                <th class="plan-info">
			                    
			                </th>

			                <th class="plan-info">
			                    <strong>基本保障</strong>
			                </th>

			                <!-- <th class="plan-info">
			                    <strong>白金保障</strong>
			                </th> -->
			            </tr>
			        </thead>
			        <tbody>
			            <tr>
			                <td rowspan="2">意外死亡或永久性残疾</td>
			                <td>每名成人</td>
			                <td>75,000</td>
			                <!-- <td>200,000</td> -->
			            </tr>

			            <tr>
			                <td>每名儿童</td>
			                <td>15,000</td>
			                <!-- <td>30,000</td> -->
			            </tr>

			            <tr>
			            	<td>意外受伤医疗费用<br><small>（按收据支付的费用）</small></td>
			            	<td rowspan="2">每名成人/儿童</td>
			                <td>10,000</td>
			                <!-- <td>20,000</td> -->
			            </tr>

			            <tr>
			                <td>包金额</td>
			                <td>不包括</td>
			                <!-- <td>1,500</td> -->
			            </tr>

			            <tr>
			                <td>负责</td>
			                <td>每名成人/儿童</td>
			                <td>50,000</td>
			                <!-- <td>50,000</td> -->
			            </tr>

			            <tr>
			                <td>旅行取消</td>
			                <td rowspan="5">每名成人/儿童</td>
			                <td>1,000</td>
			                <!-- <td>2,500</td> -->
			            </tr>

			            <tr>
			                <td>旅行削减行程</td>
			                <td>不包括</td>
			                <!-- <td>5,000</td> -->
			            </tr>

			            <tr>
			                <td>错失起飞</td>
			                <td>不包括</td>
			                <!-- <td>高达600<br>（每6小时RM200）</td> -->
			            </tr>

			            <tr>
			                <td>旅行延误<br><small>*每连续延误6小时支付RM100</small></td>
			                <td>400</td>
			                <!-- <td>800</td> -->
			            </tr>

			            <tr>
			                <td>旅行重路／绕路<br><small>*每6小时的延误连续支付RM150</small></td>
			                <td>150</td>
			                <!-- <td>300</td> -->
			            </tr>

			            <tr>
			                <td>空中公共行李箱行李损坏<br><small>*每个损坏的托运行李支付RM100和/或RM200每个丢失的托运行李</small></td>
			                <td rowspan="3">每名成人/儿童</td>
			                <td>500</td>
			                <!-- <td>1,000</td> -->
			            </tr>

			            <tr>
			                <td>行李延迟<br><small>*从预定航班的到达时间到您收到行李的时间，每6小时连续（6小时支付RM100）</small></td>
			                <td>高达RM300</td>
			                <!-- <td>高达RM500</td> -->
			            </tr>

			            <tr>
			            	<td>以下盗窃（仅限地面）：<br>1)个人金钱损失<br>2) 旅行证件丢失<br>3) 个人影响的丧失</td>
			            	<td>500</td>
			                <!-- <td>1,000</td> -->
			            </tr>

			            <tr>
			                <td>24小时全球旅行援助热线</td>
			                <td>每名成人/儿童</td>
			                <td>包括在内</td>
			                <!-- <td>包括在内</td> -->
			            </tr>

			            <!-- <tr class="highlight">
			                <td>PREMIUM PER PAX FOR 1-15 DAYS</td>
			                <td>Exclude 6% GST</td>
			                <td>RM 15</td>
			                <td>RM 25</td>
			            </tr>

			            <tr class="highlight">
			                <td>PREMIUM PER PAX FOR 16-30 DAYS</td>
			                <td>Exclude 6% GST</td>
			                <td>RM 25</td>
			                <td>RM 45</td>
			            </tr> -->
			        </tbody>
			    </table>
			</div>
			<!-- <div class="board">
				<div class="board-inner">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active">
							<a href="#tabc1" data-toggle="tab" title="welcome">
							<span>
							<i class="icon-telescope"></i> Personal Accident
							</span> 
							</a>
						</li>
						<li><a href="#tabc2" data-toggle="tab" title="profile">
							<span>
							<i class="icon-globe4"></i> Medical
							</span> 
							</a>
						</li>
						<li><a href="#tabc3" data-toggle="tab" title="bootsnipp goodies">
							<span>
							<i class="icon-hotairballoon"></i> Liability
							</span> </a>
						</li>
						<li><a href="#tabc4" data-toggle="tab" title="blah blah">
							<span>
							<i class=" icon-target3"></i> Inconve<br>niences
							</span> 
							</a>
						</li>
						<li><a href="#tabc5" data-toggle="tab" title="completed">
							<span>
							<i class="icon-strategy"></i> Losses
							</span> </a>
						</li>
						<li><a href="#tabc6" data-toggle="tab" title="completed">
							<span>
							<i class="icon-strategy"></i> Emergency Services
							</span> </a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tabc1">
						<h3 class="text-center">Attract your visitors with Helium</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabc2">
						<h3 class="text-center">We provide support 24x7 for helium</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabc3">
						<h3 class="text-center">Freedom to create unlimited pages</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabc4">
						<h3 class="text-center">Target the right people with ease</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabc5">
						<h3 class="text-center">Strategy is key role of success</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tabc6">
						<h3 class="text-center">Strategy is key role of success</h3>
						<div class="row">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet consectetur elit dolor sit amet consectetur adipisicing elit voluptate nihil eum consectetur similique? quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.</p>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div> -->
		</div>
	</div>
</section>

</div>

<!-- JAVASCRIPT =============================-->
<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

</body>
</html>