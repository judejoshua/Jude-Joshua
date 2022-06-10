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
		<title>Support || Bid for Me</title>

		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/main.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="/config/assets/css/materialdesignicons.min.css" />
		<link rel="stylesheet" href="//cdn.materialdesignicons.com/3.6.95/css/materialdesignicons.min.css">
	</head>
	<body id="bod">
		<div class="fader divWrap">
			<div class="container" id="body">
				<?php include('../../config/nav.php');?>
                <section id="contact">
                    <div class="query">
                        <div class="contactform">
                            <h1>Query Form</h1>
                            <form id="contact-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="contact-form">
                                <h2>Please fill the form below and we'll get back to you within 24 hours.</h2>
                                <div class="form-group">
                                    <input id="name" placeholder="Your name" name="name" type="text" size="20" minlength="5" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <input id="email" placeholder="Your email" name="email" type="email" size="20" minlength="5" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <input id="phone" placeholder="Your phone" name="phone" type="tel" size="20" minlength="5" maxlength="20" required>
                                </div>
                                <div class="form-group">
                                    <textarea id="message" name="message" placeholder="What issues are you experiencing? (100 - 500 characters)" rows="7" minlength="100" maxlength="500" required></textarea>
                                </div>
                                <div class="form-group error-hold fader" style="border-top: none; padding: 0px;">
                                    <p id="error"></p>
                                    <p id="success"></p>
                                </div>
                                <div class="form-group">
                                    <button type="reset">Clear</button>
                                    <button type="submit" name="contact-submit" id="contact-submit">Send</button>
                                </div>
                            </form>
                        </div>
                        <div class="contactinfo">
                            <ul>
                                <li><i class="mdi mdi-phone-classic"></i><span>Phone</span><br><a href="tel:0905723912">0905723912</a></li>
                                <li><i class="mdi mdi-email-outline"></i><span>Email</span><br><a href="mailto:sample@mail.com">sample@mail.com</a></li>
                                <li><i class="mdi mdi-map-marker"></i><span>Location</span><br>12 Abk road, Uyo, Akwa Ibom, Nigeria</li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section id="faq">
                    <div class="faqs">
                        <h1>FAQs</h1>
                        <div class="faqtabs">
                            <div class="faqtab">
                                <input type="radio" id="rd1" name="rd">
                                <label class="faqtab-label" for="rd1">How do I register?</label>
                                <div class="faqtab-content">
                                    <div class="faqtab_talk">
                                        <ul>
                                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="faqtab">
                                <input type="radio" id="rd2" name="rd">
                                <label class="faqtab-label" for="rd2">How do I place an auction?</label>
                                <div class="faqtab-content">
                                    <div class="faqtab_talk">
                                        <ul>
                                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="faqtab">
                                <input type="radio" id="rd3" name="rd">
                                <label class="faqtab-label" for="rd3">How do I refer?</label>
                                <div class="faqtab-content">
                                    <div class="faqtab_talk">
                                        <ul>
                                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="faqtab">
                                <input type="radio" id="rd4" name="rd">
                                <label class="faqtab-label" for="rd4">How do I place a bid?</label>
                                <div class="faqtab-content">
                                    <div class="faqtab_talk">
                                        <ul>
                                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="faqtab">
                                <input type="radio" id="rd5" name="rd">
                                <label class="faqtab-label" for="rd5">How do I place an auction?</label>
                                <div class="faqtab-content">
                                    <div class="faqtab_talk">
                                        <ul>
                                            <li><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="faqtab">
                                <input type="radio" id="rd6" name="rd">
                                <label for="rd6" class="faqtab-close">Close All &times;</label>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="recha">
                    <p>Sending message...</p>
                </div>
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
