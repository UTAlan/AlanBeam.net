<?php
require_once("include/config.php");

// Get "Home" content
$home_img = "images/me.jpg";
$home_welcome = "<h1>Welcome to <strong>AlanBeam.net</strong></h1>";
$home_bio = "<p>I am Alan Beam:<br />- a follower of Christ<br />- a husband<br />- a father of two<br />- a web developer</p>";

// Get Portfolio content
$portfolio_welcome = "<span>These are websites I have designed and/or developed over the past few years.</span>";
$db->orderBy("location", "ASC");
$portfolio_items = $db->get("portfolio");

require_once("include/header.php");
?>

		<!-- Home -->
		<div class="wrapper wrapper-style1 wrapper-first">
			<article class="container" id="top">
				<div class="row">
					<div class="4u">
						<span class="me image image-full"><img src="<?php echo $home_img; ?>" alt="Alan Beam" /></span>
					</div>
					<div class="8u">
						<header>
							<?php echo $home_welcome; ?>
						</header>
						<?php echo $home_bio; ?>
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
					<?php echo $portfolio_welcome; ?>
				</header>
				<div class="container">
					<div class="row">
						<div class="12u">
						</div>
					</div>
					<?php
					foreach($portfolio_items as $k=>$item) {
						if($k % 3 == 0) {
							if($k > 0) {
								echo "</div> <!-- </div class='row'> -->\n";
							}
							echo "<div class='row'>\n";
						}

						echo "<div class='4u'><article class='box box-style2'>\n";
						echo "<a href='{$item['url']}' class='image image-full'><img src='{$item['img']}' alt='' /></a>\n";
						echo "<h3><a href='{$item['url']}'>{$item['name']}</a></h3>";
						echo "</article></div> <!-- </div class='4u'> -->";
					}
					?>
				</div>
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
								<li class="github"><a href="http://github.com/UTAlan" class="fa fa-github"><span>Github</span></a></li>
								<li class="twitter"><a href="http://twitter.com/UTAlan" class="fa fa-twitter"><span>Twitter</span></a></li>
								<li class="facebook"><a href="http://facebook.com/UTAlan" class="fa fa-facebook"><span>Facebook</span></a></li>
								<li class="linkedin"><a href="https://linkedin.com/profile/view?id=40014554" class="fa fa-linkedin"><span>LinkedIn</span></a></li>
								<li class="googleplus"><a href="https://plus.google.com/+AlanBeam" class="fa fa-google-plus"><span>Google+</span></a></li>
							</ul>
							<hr />
						</div>
					</div>
				</div>
				<footer>
					<ul id="copyright">
						<li>&copy; 2006 - <?php echo date("Y"); ?> Alan Beam</li>
					</ul>
				</footer>
			</article>
		</div>

		<!-- JAVASCRIPT -->
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/custom.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
	</body>
</html>