<!DOCTYPE HTML>
<html>
	<head>
		<title>AlanBeam.net</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,600,700" rel="stylesheet" />
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$(".form-button-submit").click(function() {
				$("#contact_form").submit();
				return false;
			});
			
			$(".form-button-reset").click(function() {
				$("#contact_form").reset();
				return false;
			});
			
			$("#contact_form").submit(function() { 
				var user_name       = $('#name').val(); 
				var user_email      = $('input[name=email]').val();
				var user_subject    = $('input[name=subject]').val();
				var user_message    = $('textarea[name=message]').val();
		
				var proceed = true;
				if(user_name==""){ 
					$('#name').css('border','solid red 1px'); 
					proceed = false;
				}
				if(user_email==""){ 
					$('input[name=email]').css('border','solid red 1px'); 
					proceed = false;
				}
				if(user_subject=="") {    
					$('input[name=subject]').css('border','solid red 1px'); 
					proceed = false;
				}
				if(user_message=="") {  
					$('textarea[name=message]').css('border','solid red 1px'); 
					proceed = false;
				}

				if(proceed) {
					post_data = {'userName':user_name, 'userEmail':user_email, 'userSubject':user_subject, 'userMessage':user_message};
			
					$.post('contact.php', post_data, function(response) {  
						if(response.type == 'error') {
							output = '<div class="error">'+response.text+'</div>';
						} else {
							output = '<div class="success">'+response.text+'</div>';
							$('#contact_form input').val(''); 
							$('#contact_form textarea').val(''); 
						}				
						$("#result").hide().html(output).slideDown();
					}, 'json');
				}
				
				return false;
			});
	
			$("#contact_form input, #contact_form textarea").keyup(function() { 
				$("#contact_form input, #contact_form textarea").css('border','none'); 
				$("#result").slideUp();
			});
	
		});
		</script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
	<body>
		<!-- Nav -->
		<nav id="nav">
			<ul class="container">
				<li><a href="#top">Top</a></li>
				<li><a href="#portfolio">Portfolio</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
		</nav>

		<!-- Home -->
		<div class="wrapper wrapper-style1 wrapper-first">
			<article class="container" id="top">
				<div class="row">
					<div class="4u">
						<span class="me image image-full"><img src="images/me.jpg" alt="" /></span>
					</div>
					<div class="8u">
						<header>
							<h1>Welcome to <strong>AlanBeam.net</strong></h1>
						</header>
						<p>I am Alan Beam:<br />- a follower of Christ<br />- a husband<br />- a father of two<br />- a web developer</p>
						<a href="#portfolio" class="button button-big">See my portfolio</a>
					</div>
				</div>
			</article>
		</div>

		<!-- Portfolio -->
		<div class="wrapper wrapper-style3">
			<article id="portfolio">
				<header>
					<h2>Portfolio</h2>
					<span>These are websites I have designed and developed over the past few years.</span>
				</header>
				<div class="container">
					<div class="row">
						<div class="12u">
						</div>
					</div>
					<div class="row">
						<div class="4u">
							<article class="box box-style2">
								<a href="http://www.ginnibeam.net" class="image image-full"><img src="images/portfolio01.jpg" alt="" /></a>
								<h3><a href="http://www.ginnibeam.net">ginniBeam.net</a></h3>
								<p>Personal website I built for my wife. Includes a blog, her writings, a photo gallery, and databases for her favorite quotes and a collection of songs with names in them.</p>
							</article>
						</div>
						<div class="4u">
							<article class="box box-style2">
								<a href="http://www.havepest.net" class="image image-full"><img src="images/portfolio02.jpg" alt="" /></a>
								<h3><a href="http://www.havepest.net">Have Pesticide<br />Will Travel</a></h3>
								<p>Gave a local pesticide company a new website for advertising their business.</p>
							</article>
						</div>
						<div class="4u">
							<article class="box box-style2">
								<a href="http://www.12lions.com" class="image image-full"><img src="images/portfolio03.jpg" alt="" /></a>
								<h3><a href="http://www.12lions.com">12Lions.com</a></h3>
								<p>A blog I built for a friend to discuss, among other things, theology as it relates to current events.</p>
							</article>
						</div>
					</div>
					<div class="row">
						<div class="4u"></div>
						<div class="4u">
							<article class="box box-style2">
								<a href="http://www.jesisteiber.com" class="image image-full"><img src="images/portfolio04.jpg" alt="" /></a>
								<h3><a href="http://www.jesisteiber.com">JesiSteiber.com</a></h3>
								<p>A personal website I built for my mom. Includes a blog and a photo gallery.</p>
							</article>
						</div>
					</div>
				</div>
				<footer>
					<a href="#contact" class="button button-big">Get in touch with me</a>
				</footer>
			</article>
		</div>

		<!-- Contact -->
		<div class="wrapper wrapper-style4">
			<article id="contact" class="container small">
				<header>
					<h2>Want to hire me? Get in touch!</h2>
					<span></span>
				</header>
				<div>
					<div class="row">
						<div class="12u">
							<form method="post" action="#" id="contact_form">
								<div id="result"></div>
								<div>
									<div class="row half">
										<div class="6u">
											<input type="text" name="name" id="name" placeholder="Name" />
										</div>
										<div class="6u">
											<input type="text" name="email" id="email" placeholder="Email" />
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<input type="text" name="subject" id="subject" placeholder="Subject" />
										</div>
									</div>
									<div class="row half">
										<div class="12u">
											<textarea name="message" id="message" placeholder="Message"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="12u">
											<a href="#" class="button form-button-submit">Send Message</a>
											<a href="#" class="button button-alt form-button-reset">Clear Form</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="row">
						<div class="12u">
							<hr />
							<h3>Find me on ...</h3>
							<ul class="social">
								<li class="twitter"><a href="http://twitter.com/UTAlan" class="fa fa-twitter"><span>Twitter</span></a></li>
								<li class="facebook"><a href="http://www.facebook.com/UTAlan" class="fa fa-facebook"><span>Facebook</span></a></li>
								<li class="linkedin"><a href="https://www.linkedin.com/profile/view?id=40014554" class="fa fa-linkedin"><span>LinkedIn</span></a></li>
								<li class="googleplus"><a href="https://plus.google.com/+AlanBeam" class="fa fa-google-plus"><span>Google+</span></a></li>
							</ul>
							<hr />
						</div>
					</div>
				</div>
				<footer>
					<ul id="copyright">
						<li>&copy; <?php echo date("Y"); ?> Alan Beam</li>
					</ul>
				</footer>
			</article>
		</div>
	</body>
</html>