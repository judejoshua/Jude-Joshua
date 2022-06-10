<?php

	include ('../../config/server.php');
    
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
		<title>Sell || Bid for Me</title>

		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
		<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
	</head>
	<body id="bod">
		<div class="services auction fader divWrap">
			<div class="container" id="home">
                <?php include('../../config/nav.php');?>
                <div id="bloora">
                </div>
                <div class="slider-text">
                    <h1 style="text-transform: capitalize;">Auction Sales</span></h1>
                    <p>Join over 100 sellers in putting products up for buyers.</p>
                    <div class="landing-bottom-des">
                        <a href="#how-to">Learn more <i class="mdi mdi-play"></i></a>
                        <a href="#">Start selling</a>
                    </div>
                </div>
            </div>
            <div class="container" id="body">
				<section class="workings" id="how-to">
					<div class="working_header">
						<h1>How it Works</h1>
					</div>
					<div class="working_body">
						<div class="worker">
							<div class="workings_row">
								<div class="workings_row_left">
									<h3>Step 1</h3>
									<h4>Create an Account</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
								<div class="workings_img_right">
									<div class="workings_row_right_img"></div>
								</div>
							</div>
							<div class="workings_row">
								<div class="workings_row_left">
									<h3>Step 2</h3>
									<h4>Create an Store</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
								<div class="workings_img_right">
									<div class="workings_row_right_img"></div>
								</div>
							</div>
							<div class="workings_row">
								<div class="workings_row_left">
									<h3>Step 3</h3>
									<h4>Add a new Product</h4>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								</div>
								<div class="workings_img_right">
									<div class="workings_row_right_img"></div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="container" id="footer">
				<?php include('../../config/footer.php') ?>
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
                    $("#contact-form").on('submit', function(e){
                        e.preventDefault();
                        var data = $('#contact-form').serialize();
                        this.reset();
                        $.ajax({
                            url: '../../config/server.php',
                            type: 'POST',
                            data: data,
                            success: function(response){
                                if(response=='Successful!'){
                                    $('#error').html('');
                                    $('.recha').addClass('fixed');
                                    $('#bod').addClass('boxed');
                                    setTimeout(RemoveFixed, 3200);
                                    function RemoveFixed(){
                                        $('.recha').removeClass('fixed');
                                        $('#bod').removeClass('boxed');
                                        $('#success').html('Your query was sent successfully!!');
                                    };
                                }else{
                                    $('#error').html(response);
                                }
                            }
                        });
                    });
                    //----------------------------------------------
                    $("#newsletter").on('submit', function(e){
						e.preventDefault();
						var edata = $('#newsletter').serialize();
						$.ajax({
							url: '../../config/server.php',
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

			});
		</script>
	</body>
</html>
