<!DOCTYPE HTML>
<html>
<head>
	<title>Farin Jakada</title>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Personal Blog Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!----webfonts---->
	<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
	<!----//webfonts---->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<!--end slider -->
	<!--script-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<!--/script-->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 900);
			});
		});
	</script>
	<!---->

</head>

<body>
	<!---header---->
	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.html"><img src="images/farin_jakada.png" title="" /></a>
			</div>
			<!---start-top-nav---->
			<div class="top-menu">
				<div class="search">
					<form>
						<input type="text" placeholder="" required="">
						<input type="submit" value="" />
					</form>
				</div>
				<span class="menu"> </span>
				<ul>
					<li class="active"><a href="index.html">HOME</a></li>
					<li><a href="about.html">ABOUT</a></li>
					<li><a href="contact.html">CONTACT</a></li>
					<div class="clearfix"> </div>
				</ul>
			</div>
			<div class="clearfix"></div>
			<script>
				$("span.menu").click(function() {
					$(".top-menu ul").slideToggle("slow", function() {});
				});
			</script>
			<!---//End-top-nav---->
		</div>
	</div>
	<!--/header-->