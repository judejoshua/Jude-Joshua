<?php

	// include ('./config/server.php');

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Mite Systems">
		<meta name="description" content="">
		<meta name="format-detection" content="telephone=no">
		<meta name="keywords" content="">

		<link rel="icon" href="/config/assets/images/teal-mini.png"/>
		<title>Home || Bid for Me</title>

		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
		<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
	</head>
	<body id="bod">
		<div class="fader divWrap">
			<div class="container" id="home">
				<?php include('./config/nav.php');?>
				<div class="container contcthome" id="home">
					<div id="bloora">
					</div>
					<div class="slider-text">
						<h1>Renwick.com<br><span>More than just an online store...</span></h1>
						<p>We incorporate the latest technologies to present you with a new way of shopping online.</p>
					</div>
					<span id="more"><i class="mdi mdi-chevron-double-down"></i></span>
				</div>
				<div class="deck">
					<div class="row">
						<div class="deck-card">
							<div class="deck-card-top">
								<h2>Auction</h2>
								<p>Create auction sales for your item. Set your price tags and stand out amongst competitors.</p>
							</div>
							<div class="deck-card-bottom">
								<a href="/relatives/app/auth?pagelink=sell&userid=newId">Create Auction</a>
							</div>
						</div>
						<div class="deck-card">
							<div class="deck-card-top">
								<h2>Bid</h2>
								<p>We give you the market power - Place bids and bargain for your favourite items at prices that suit your wallet.</p>
							</div>
							<div class="deck-card-bottom">
								<a href="#">Enter Market</a>
							</div>
						</div>
						<div class="deck-card">
							<div class="deck-card-top">
								<h2>Refer</h2>
								<p>Need extra cash? Refer users to our platform and get paid when they register.</p>
							</div>
							<div class="deck-card-bottom">
								<a href="/relatives/app/auth?pagelink=refer&userid=newId">Sign Up</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container" id="body">
				<?php include('./config/footer.php') ?>
				<a href="#home" class="to-top">
					<i class="mdi mdi-chevron-up"></i>
				</a>
				<div class="search">
					<a class="mdi mdi-close" id="searchclose"></a>
					<form id="search-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="search-form">
						<div class="form-group">
							<input id="search" placeholder="What are you looking for?..." name="search" type="search" size="20" minlength="5" maxlength="50" required>
						</div>
						<div class="form-group">
							<button type="submit" name="search-submit" id="search-submit">Search</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="/config/assets/js/jquery-2.0.3.min.js"></script>
		<script src="/config/assets/js/ind.js"></script>
		<script>
			$(document).ready(function(){
				//-------------------------------------Formia
					$("#newsletter").on('submit', function(e){
						e.preventDefault();
						var edata = $('#newsletter').serialize();
						$.ajax({
							url: './config/server.php',
							type: 'POST',
							data: edata,
							success: function(response){
								if(response=='Successful!'){
									$('#e-error').html('');
									$('#e-success').html('You have subscribed successfully!!');
									$("#newsEmail").val('');
								}else{
									$('#e-error').html(response);
									$('#e-success').html('');
								}
							}
						});
					});
				//-------------------------------------Links
					/*$(".left-links a").click(function(event) {
						link = $(this).attr("href");
						$('ul#side-links li a').removeClass('active');
						$(this).addClass('active');
						$.ajax({
							url: link,
							success: function(response) {
								$('html').empty().append(response);
								$('div#links_class').removeClass('showed');
							}
						})
						return false;
					});*/
			});

		</script>
	</body>
</html>
