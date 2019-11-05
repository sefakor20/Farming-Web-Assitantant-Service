
<!DOCTYPE html>
<html>
<head>
<title>Login | Register</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--/css-->
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seed Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->		
<!-- js -->
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.js"></script>
<script src="js/modernizr.custom.js"></script>

<!-- /js -->
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>
<!--/fonts-->

<!-- logo -->
<link rel="icon" type="image/png" href="logo-1.png">
<!--/logo -->

<!--script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!--/script-->
</head>
<body>

	<?php include 'pages/navbar.php'; ?>

<div class="banner banner5">
			     <div class="logo1">
				<a href="index.php"><img src="images/logo-1.jpg" /></a>
			</div>
	<div class="clearfix"> </div>
		 </div> <br>


		 <div class="container">
		 	<div class="row">
		 		<div class="col-md-4">
		 			<img src="images/farmer.jpg">
		 			<a href="farmer/login.php" class="btn btn-success" target="_blank" style=" margin-left: 70px;">Farmer </a>
		 		</div>
		 		<div class="col-md-4 ">
		 			<img src="images/buying_organization.jpg">
		 			<span style=" margin-left: 70px;"><a href="Organization/login.php" class="btn btn-success" target="_blank">Buyer</a></span>
		 		</div>
		 		<div class="col-md-4">
		 			<img src="images/images.png">
		 			<span style=" margin-left: 70px;"><a href="extension_officer/login.php" class="btn btn-success" target="_blank">Extension Officer</a></span>
		 		</div>
		 	</div>
		 </div>
		 <br><br><br><br><br>






	<!-- //footer -->
		<?php include 'pages/footer.php'; ?>
		 <!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 

		</div>
		<!-- //container -->
	</div>

	<script src="js/bootstrap.min.js"></script>
	<script>
		$('#myModal').on('shown.bs.modal' function(){
			$('#myInput').focus()
		})
	</script>
</body>
</html>