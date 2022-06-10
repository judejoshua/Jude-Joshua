<?php

    // include ('../config/server.php');
    
    $pagelink = 'market';

    // $query = mysqli_query($db, "SELECT * FROM `products` WHERE `product_cat` = '".$pagelink."' ");

    
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
		<div class="market fader divWrap">
			<div class="container" id="home">
                <?php include('../config/nav.php');?>
                <div id="bloora">
                </div>
                <div class="slider-text">
                    <h1 style="text-transform: capitalize;"><?php echo $pagelink?></span></h1>
                    <p>Join over 100 sellers in putting products up for buyers.</p>
                </div>
            </div>
            <div class="container" id="body">
                <section id="items">
                    <?php
                        // if(mysqli_num_rows($query) > 0){
                        //     //output data of each row
                        //     while($show = mysqli_fetch_array($query)){
                        //         $target_file = $show['product_img'];
                        //         $target_dir = base64_decode($show['img_loc']);
                        //         echo'
                        //             <div class="product">
                        //                 <div class="product_img">
                        //                     <div></div>
                        //                     <img src="/relatives/app/config/'.$target_dir.$target_file.'" />
                        //                 </div>
                        //                 <div class="product_details">
                        //                     <h1>'.$show['product_name'].'</h1>
                        //                     <h3>'.$show['product_price'].'</h3>
                        //                     <p>Sold by: '.$show['store_name'].'</p>
                        //                 </div>
                        //             </div>
                        //         ';
                        //     }
                        // }else{
                        //     echo '
                        //         <h3>No items found for this Category.</h3>
                        //     ';
                        // }
                        // mysqli_close($db);
                    ?>
                </section>
			</div>
			<div class="container" id="footer">
				<?php include('../config/footer.php') ?>
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
                            url: '../config/server.php',
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
							url: '../config/server.php',
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
