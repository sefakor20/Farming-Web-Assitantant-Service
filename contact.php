<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Contact</title>
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
		 </div>  
<!--contact-->
<div class="contact">
	<div class="container"> 
		<h2>Contact</h2>
		 <div class="contact-content">
       							<form method="POST" action="../Methods/contact_us.php">
							    	<input type="text" class="textbox" value=" Your Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Name';}" name="name" required>
							    	<input type="text" class="textbox" value="Your E-Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your E-Mail';}" name="email" required>
							    	<input type="text" class="textbox" value="Message Title / Caption" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message Title / Caption';}" name="message_title" required>
										<div class="clear"> </div>
										<div class="clear"> </div>

										<?php
                  if (isset($_SESSION['success'])) {
                    ?>
                    <span class="btn btn-success"><?php echo $_SESSION['success']; ?></span>
                    <?php
                    $_SESSION['success'] = null;
                  }
                ?>
								    <div>
								    	<textarea value="Message:" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Message ';}" name="message_content">Your Message</textarea required>
								    </div>	
								   <div class="submit"> 
								    	<input type="submit" value="SEND " name="submit" />
					              </div>
								</form>
								
							</div>
							<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1578265.0941403757!2d-98.9828708842255!3d39.41170802696131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1407515822047"> </iframe>-->
 						</div>	
 					</div>	        	
<!--/contact-->	 

<!-- footer -->
		<?php include 'pages/footer.php'; ?>
	<!-- //footer -->
	
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
</body>
</html>