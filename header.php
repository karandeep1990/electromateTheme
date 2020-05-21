<?php
session_start();
if(isset($_POST) && trim($_POST['quoteemail']) != '') {
	if ( ($_REQUEST["captcha"] == $_SESSION["security_code"]) && (!empty($_REQUEST["captcha"]) && !empty($_SESSION["security_code"])) ) {
		$quotename = ucfirst(trim(addslashes($_POST['quotename'])));
		$quoteemail = trim(addslashes($_POST['quoteemail']));
		$quotecontact = trim(addslashes($_POST['quotecontact']));
		$quotequery = trim(addslashes($_POST['quotequery']));


		$to      = get_option('admin_email');
		$subject = 'Electromate Contact Form details:';
		$message = "Hello Admin <br />This person $quotename have recently submit query to us enquire about:- <br />$quotequery<br />
		<strong>Contact-no.:-</strong> $quotecontact <br /><strong>Email-id:-</strong><a href=\"mailto:$quoteemail\">$quoteemail</a><br /> Thanks....... Please provide relevant feedback...<br /><br />
		<b><h2 style=\"font-family:sans-serif;color:red;font-size:14px\"> Prabhjot Singh</h2><h4> Marketing Manager <br /> Electromate Inverters,<br /> Ambala Cantt, Haryana, India.</h4></b>";


		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:  '.$quotename.'<'.$quoteemail.'>' . "\r\n";
		
		$headersClient  = 'MIME-Version: 1.0' . "\r\n";
		$headersClient .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headersClient .= 'From:  Electromate Inverters<'.$to.'>' . "\r\n";
		$subjectClient = "****Automatic Response**** Electromate Inverters";
		$toClient = $quoteemail;
		$messageClient = "<h2 style=\"font-family:arial;font-size:14px\"><strong>**This is an automatic reply. Please do not respond.**</strong></h2><br />
					<h2 style=\"font-family:arial;font-size:14px\">Hello <strong>$quotename,</strong></h2><br/>
					<p>Thank you for contacting Electromate Inverters. We received your query. We will get back to you as soon as possible on the following info:</p>
					<br/>
					<strong>Contact-no.:-</strong>$quotecontact<br/>
					<strong>Email-id:-</strong>$quoteemail<br />
					<p>Please resubmit query, incase following info is incorrect...</p><br />
					<b><h2 style=\"font-family:arial;color:red;font-size:14px\"> Prabhjot Singh</h2>
					<h4> Marketing Manager <br />
					Electromate Inverters,<br />
					Ambala Cantt-133001,<br />Haryana, India.</h4></b>";
		
		$mail = mail($to, $subject, $message, $headers);
		$mailClient = mail($toClient, $subjectClient, $messageClient, $headersClient);

		if($mail == '1' && $mailClient == '1') 
		{
			$_SESSION['msg'] = "Mail has been sent";
			$_SESSION['class'] = "success";
		} else{
			$_SESSION['msg'] = "Error Sending Mail";
			$_SESSION['class'] = "error";
		}
	}

	else {
		$_SESSION['msg']= "Invalid captcha";
		$_SESSION['class'] = "error";	
	}
}
?>


<?php $bloginfo= get_bloginfo('template_url'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
        <meta name="google-site-verification" content="5qhGzp411EquhZu5-pcZOVTnMmCD1Fv2lg4ZN4keXWU" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Electromate Inverters</title>
	<meta name="description" content="Website Description" />
	<meta name="keywords" content="Website Kwywords" />

	<link rel='icon' href="<?php echo $bloginfo;?>/images/favicon.ico" type='image/x-icon'/ >
	<link rel="stylesheet" href="<?php echo $bloginfo;?>/style/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $bloginfo;?>/style/topNav.css" type="text/css" />
	
	<link rel="stylesheet" href="<?php echo $bloginfo;?>/style/slide.css" type="text/css" />
	<script src="<?php echo $bloginfo ;?>/script/jquery.js" type="text/javascript"></script>
	<script src="<?php echo $bloginfo ;?>/script/ui_core.js" type="text/javascript"></script>
	<script src="<?php echo $bloginfo ;?>/script/ui_tabs.js" type="text/javascript"></script>
	<script src="<?php echo $bloginfo ;?>/script/lightbox.js" type="text/javascript"></script>
	<script src="<?php echo $bloginfo ;?>/script/jquery.validate.js" type="text/javascript"></script>	

	<script type="text/javascript">
		$(document).ready(function() {
			$("#slideshow").tabs({ fx: { opacity: 'toggle' } });
			
			$(".menu-item-has-children >  a").click(function(e){
				if(($(this).text()) != 'Home' ) {
			 		e.preventDefault();
				}
			});

		});

		$(function() {
			$('a.popup').lightBox({fixedNavigation:true});
		});
	</script>
<!--*************slideshow2 javascript***********-->
<script type="text/javascript">
$(document).ready(function(){
	  var slideNumber = '#slide2 '; 
	  var currentPosition = 0;
	  var slideWidth = 900;
	  var slides = $(slideNumber + '.slide');
	  var numberOfSlides = slides.length;
	
	  $(slideNumber + '#portfolioContainer').css('overflow', 'hidden');

	  slides
		.wrapAll('<div id="slideInner"></div>')
		// Float left to display horizontally, readjust .slides width
		.css({
		  'float' : 'left',
		  'width' : slideWidth
		});

	  // Set #slideInner width equal to total width of all slides
	  $(slideNumber +'#slideInner').css('width', slideWidth * numberOfSlides);

	  $(slideNumber +'#portfolio')
		.prepend('<span class="control" id="leftControl"></span>')
		.append('<span class="control" id="rightControl">`</span>');

	  manageControls(currentPosition);

	  $(slideNumber +'.control')
		.bind('click', function(){
		currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
		
		manageControls(currentPosition);
		// Move slideInner using margin-left
		$(slideNumber +'#slideInner').animate({
		  'marginLeft' : slideWidth*(-currentPosition)
		});
	  });
  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $(slideNumber +'#leftControl').hide() } else{ $(slideNumber +'#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $(slideNumber +'#rightControl').hide() } else{ $(slideNumber +'#rightControl').show() }
  }	
});
</script>
<!--*************slideshow3 javascript***********-->
<script type="text/javascript">
$(document).ready(function(){
	  var slideNumber = '#slide3 '; 
	  var currentPosition = 0;
	  var slideWidth = 900;
	  var slides = $(slideNumber + '.slide');
	  var numberOfSlides = slides.length;

	  $(slideNumber + '#portfolioContainer').css('overflow', 'hidden');

	  slides
		.wrapAll('<div id="slideInner"></div>')
		// Float left to display horizontally, readjust .slides width
		.css({
		  'float' : 'left',
		  'width' : slideWidth
		});

	  // Set #slideInner width equal to total width of all slides
	  $(slideNumber +'#slideInner').css('width', slideWidth * numberOfSlides);

	  $(slideNumber +'#portfolio')
		.prepend('<span class="control" id="leftControl"></span>')
		.append('<span class="control" id="rightControl">`</span>');

	  manageControls(currentPosition);

	  $(slideNumber +'.control')
		.bind('click', function(){
		currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
		
		manageControls(currentPosition);
		// Move slideInner using margin-left
		$(slideNumber +'#slideInner').animate({
		  'marginLeft' : slideWidth*(-currentPosition)
		});
	  });
  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $(slideNumber +'#leftControl').hide() } else{ $(slideNumber +'#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $(slideNumber +'#rightControl').hide() } else{ $(slideNumber +'#rightControl').show() }
  }	
});
</script>
<!--*************slideshow4 javascript***********-->
<script type="text/javascript">
$(document).ready(function(){
	  var slideNumber = '#slide4 '; 
	  var currentPosition = 0;
	  var slideWidth = 900;
	  var slides = $(slideNumber + '.slide');
	  var numberOfSlides = slides.length;

	  $(slideNumber + '#portfolioContainer').css('overflow', 'hidden');

	  slides
		.wrapAll('<div id="slideInner"></div>')
		// Float left to display horizontally, readjust .slides width
		.css({
		  'float' : 'left',
		  'width' : slideWidth
		});

	  // Set #slideInner width equal to total width of all slides
	  $(slideNumber +'#slideInner').css('width', slideWidth * numberOfSlides);

	  $(slideNumber +'#portfolio')
		.prepend('<span class="control" id="leftControl"></span>')
		.append('<span class="control" id="rightControl">`</span>');

	  manageControls(currentPosition);

	  $(slideNumber +'.control')
		.bind('click', function(){
		currentPosition = ($(this).attr('id')=='rightControl') ? currentPosition+1 : currentPosition-1;
		
		manageControls(currentPosition);
		// Move slideInner using margin-left
		$(slideNumber +'#slideInner').animate({
		  'marginLeft' : slideWidth*(-currentPosition)
		});
	  });
  // manageControls: Hides and Shows controls depending on currentPosition
  function manageControls(position){
    // Hide left arrow if position is first slide
	if(position==0){ $(slideNumber +'#leftControl').hide() } else{ $(slideNumber +'#leftControl').show() }
	// Hide right arrow if position is last slide
    if(position==numberOfSlides-1){ $(slideNumber +'#rightControl').hide() } else{ $(slideNumber +'#rightControl').show() }
  }	
});
</script>
<!--*************slideshow4 javascript***********-->

</head>
<body>
<p><a class="skiplink" href="#maincontent">Skip over navigation</a></p>
<div id="container">
	<div id="wrapper">
		<div id="header">
			<a href="<?php echo get_bloginfo('url');?> " id="logo"><span><img src="<?php echo $bloginfo ;?>/images/logo.png" alt="Electromate-Inverters" /></span></a>
			<ul id="topmenu">
				<li><a href="http://electromate.in/" class="replace" id="menuhome" title="Main Content"><span></span>Home</a></li>
				<li><a href="https://goo.gl/maps/2crDrdQTreowtzy46" target="_blank"class="replace" id="menusitemap" title="Company Location"><span></span>Sitemap</a></li>
				<li><a href="mailto:info@electromate.in" class="replace" id="menucontact" title="Mailto: info@electromate.in"><span></span>Contact Us</a></li>
			</ul>
		</div>
		<div id="menuleft"></div>
		<div id="placemainmenu">
				<?php 
					$args= array(
					'theme_location' => 'primary',
					'container_id' => 'navTop'
					);
					wp_nav_menu($args);
				?>
		<?php get_search_form(); ?>
		</div>
		<div id="menuright"></div>
		<div class="clear"></div>
		<div id="slideshow">
			<div id="slide1" class="ui-tabs-panel">
				<div class="listslide">
				
					<?php
						$servocePageIds = array('18','20','22');
						$count = 0;
						foreach($servocePageIds as $pageId) {
						$count = $count+1;
						?>
							<div <?php if($count == 3) { echo 'class="last"'; } ?>>
								<?php
									$page_data=get_page($pageId);
									$permalink = get_permalink($pageId);
									$content=substr(strip_tags($page_data -> post_content),0,200)."..";
									
									if($count == '1') {
										$logoclass = "titlelogo";
									} else if($count == '2') {
										$logoclass = "titleweb";
									} else {
										$logoclass = "titleprint";
									}
									
									echo "<h3 class=\"$logoclass\">".$page_data->post_title."</h3><p>$content</p>";
									echo "<a href='$permalink' class=\"linkslidemore\">Learn More</a>";
								?>
							</div>
						<?php
						}
					?>
					
				</div>
			</div>
			
			<div id="slide2" class="ui-tabs-panel">
			  <!-- Slideshow HTML -->
				<div id="portfolio">
					<div id="portfolioContainer">
						<div class="slide">
							<div class="contentslide">
								<h3>EM-180amps</h3>
								<p>Electromate 180 AH battery is the upscaled version and it is one of our best selling products designed for Indian Market.
								<br>The life expectancy of the battery is 3-5 years. It is suitable for almost all inverters and its tolerance capacity level is far better than other available stock in the market. This product will serve you around 10-14 hours continuous backup during power outbreak with 800VA-925VA inverter.
								</p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/BTC/EM-BT180.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>EM-165amps</h3>
								<p>Electromate 165 AH battery is the most utility battery specifically designed keeping in mind the factors including low power consumption, voltage fluctuation, and frequent short trips.
								<br>The battery has a life expectancy of a minimum 800+ cycles and 80% depth of discharge. The life expectancy of the battery is 3-5 years and will serve you around 8-12 hours backup during power outbreak with 600VA-800VA inverter.
								</p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/BTC/EM-BT165.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>Lorem Test</h3>
								<p>Test this is test.</p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/BTC/EM-B90.jpg"  alt="" /></div>
						</div>
					</div>
				</div>
			 <!-- Slideshow HTML -->				
			</div>

			<div id="slide3" class="ui-tabs-panel">
			  <!-- Slideshow HTML -->
				<div id="portfolio">
					<div id="portfolioContainer">
						<div class="slide">
							<div class="contentslide">
								<h3>EM-i_620VA</h3>
								<p></p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/HOME UPS/EM-I600.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>EM-i_820VA</h3>
								<p>Test this is test. </p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/HOME UPS/EM-I800.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>EM-f_820VA</h3>
								<p></p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/HOME UPS/EM-IB800.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>EM-prototype</h3>
								<p>EM-180amps battery coupled with EM-i_820VA home UPS is a prototype version for demo purposes.
								<br>It is easier to install and maintained while keeping all your electric circuits and place safe from any hazardous cause.
								</p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/HOME UPS/PROTOTYPE.jpg"  alt="" /></div>
						</div>					
					</div>
				</div>
			 <!-- Slideshow HTML -->				
			</div>

			<div id="slide4" class="ui-tabs-panel">
			  <!-- Slideshow HTML -->
				<div id="portfolio">
					<div id="portfolioContainer">
						<div class="slide">
							<div class="contentslide">
								<h3></h3>
								<p></p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/VS/EM-S4AC-S5SP.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>Lorem Test</h3>
								<p>Test this is test. </p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/VS/EM-S4AL.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>Lorem Test</h3>
								<p>Test this is test.</p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/VS/EM-S5DP.jpg"  alt="" /></div>
						</div>
						
						<div class="slide">
							<div class="contentslide">
								<h3>Lorem Test</h3>
								<p>Test this is test. </p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/VS/EM-SL1-SL2.jpg"  alt="" /></div>
						</div>					
						
						<div class="slide">
							<div class="contentslide">
								<h3>Lorem Test</h3>
								<p>Test this is test. </p>
							</div>
							<div id="placenewproject"><img src="<?php echo $bloginfo;?>/images/electromate/VS/EM-SL05.jpg"  alt="" /></div>
						</div>					
					</div>
				</div>
			 <!-- Slideshow HTML -->				
			</div>
			
			<div id="slide5" class="ui-tabs-panel">
				<div class="listslide">
				<?php
//				wp_list_bookmarks('title_li=&category_name=process');?>
					<div><h3>Tell us your requirement</h3>
						<p>Batteries</p>
						<p>Voltage Stabilizers</p>
						<p>Servo</p>
					</div>
					<div><h3>Delivery Expectation</h3>
						<p></p>
					</div>
					<div class="last"><h3>Feedback and maintenance</h3>
						<p></p>
						<p></p>
					</div>
				</div>
			</div>
			<ul id="menuslide" class="ui-tabs-nav">
				<li><a href="#slide1">About Us</a></li>
				<li><a href="#slide2">Batteries</a></li>
				<li><a href="#slide3">Home UPS</a></li>				
				<li><a href="#slide4">Voltage Stabilizers</a></li>				
				<li class="last"><a href="#slide5">Customized Requirements</a></li>
			</ul>
		</div>
		
		<div id="content">

<!-- **************** Alert Message ********** -->
<?php 
if(isset($_SESSION['msg']) && $_SESSION['msg'] != '') { 
$class = 'success';
if(isset($_SESSION['class']) && $_SESSION['class'] != '') {
	$class = $_SESSION['class'];
}
?>
<div id="alerts_content">
	<div id="alerts">
		<ul class="alerts">
			<li class="<?php echo $class; ?>">
				<div>
					<?php echo $_SESSION['msg']; ?>
					<span id="close">
						<a href="#" class="closeAlerts">close</a>
						<a href="#" class="closeAlerts"><img width="14" height="14" title="" src="https://secure-assets.grouponcdn.com/images/groupon/icons/close.png?awIalfy2" alt=""></a>
					</span>
				</div>
			</li>
		</ul>
	</div>
</div>

<?php unset($_SESSION['msg']); unset($_SESSION['class']); ?>
<?php } ?>

<script type="text/javascript">
       $('.closeAlerts').click(function(){
               $('#alerts_content').slideUp();
               return false;
       });
</script>
<!-- **************** Alert Message ********** -->


<div id="maincontent">
		
