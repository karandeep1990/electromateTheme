<?php
$bloginfo= get_bloginfo('template_url');
$args= array('numberposts'	=>	'3',
			'category_name'	=>	'testimonials',
			'orderby'		=>	'rand');
$testimonials=get_posts($args);
?>

<!-- *************** Get a Quote Pop Up Box ********* -->
<script>
	$(document).ready(function(){
		$('#getQuote').click(function(){
			if($('#filterPop')) {
				$('#filterPop').show();
			}
	
			if($('.pop_box')) {
				$('.pop_box').fadeIn('slow');
			}
		});
		$('.closePop').click(function(){
			if($('#filterPop')) {
				$('#filterPop').hide();
			}
	
			if($('.pop_box')) {
				$('.pop_box').fadeOut('slow');
			}
		});
		$('.signin').click(function(){
			if($('#email').val()=='') {
				$('#showalert').val('Please Enter details');
				$('#showalert').show();
			}
		});
		
		$('#submitQuoteForm').click(function(){
			$("#quoteForm").submit();
		});
	});
</script>
<!--********************js validation**********-->
<script type="text/javascript">
$(document).ready(function() {
var rand = Math.random();
    $("#quoteForm").validate({
        rules: {
            quotename: "required",
            quoteemail: {
                required: true,
                email: true
            },
            quotequery: {
            	required: true,
            	minlength: 30
            },
            quotecontact :{
            	required: true,
            	number:true,
            	minlength: 7
            },
            captcha: "required"
        },
        messages: {
            quotename: "*Please enter your firstname",
            quoteemail: "*Please enter a valid email address",
            quotequery: "*Query should contain atleast 50 characters",
            quotecontact: "*Please enter your Contact No.",
            captcha: "*please enter valid captcha"
        }
    });
});
</script>

<style>
p.error {
    clear: both;
    color: #FF0000;
    float: none;
    font-size: 12px;
    margin-left: 195px;
    font-style: italic;
}
</style>
<!--********************js validation**********-->

<div id="filterPop"></div>
<div class="pop_box"> 
	<div class="P_top"></div>
	<div class="P_cen">
		<h3>Submit your Query, we will get back to you.</h3>
		<div class="closePop"><img src="<?php echo $bloginfo;?>/images/Close-icon.png" /></div>
		<div id="showalert" style="display:none;"></div>
		<img class="shadow" alt="" src="<?php echo $bloginfo; ?>/images/P_shadow.png">
		<div class="clear"></div>

		<form action="" method="post" name="quoteForm" id="quoteForm">
			<label>Name&nbsp;<span>*</span></label>
			<input type="text" value="" name="quotename">
			<label>Email Address&nbsp;<span>*</span></label>
			<input type="text" value="" name="quoteemail">
			<label>Contact No.&nbsp;<span>*</span></label>
			<input type="text" value="" name="quotecontact">
			<label>Query&nbsp;<span>*</span></label>
			<textarea name="quotequery"></textarea>			
			<label>Captcha&nbsp;<span>*</span></label>
			<input type="text" id="captcha" name="captcha" maxlength="8" />
			<div id="captchadiv">
				<img class="captcha" src="<?php echo $bloginfo;?>/captchacreate.php" />
			</div>
			
			<div class="clear"></div>
			<div class="sign_in">
				<input type="button" class="signin" id="submitQuoteForm" value="Submit">
			</div>
		</form>
	</div>
	<div class="P_btm"></div>
	<div class="clear"></div>
</div>
<!-- *************** Get a Quote Pop Up Box ********* -->




	<div id="nav">
		<button class="linkquote" id="getQuote">Get a Quote</button>
		
		<h3>Featured Services</h3>
		<ul id="listservices">
		<?php
			wp_nav_menu('theme_location=secondary');
		?>
		</ul>
		<div class="clear"></div>
		<h3>Testimonials</h3>
		<?php 
		foreach( $testimonials as $post ) : setup_postdata($post); 
			$count++;
		?>
			<div class="testimonials<?php echo $count;?>">
				<div id="testitop"></div>
				<div id="testiback">
					<p><?php the_content(); ?></p>
				</div>
				<div id="testibottom"></div>
				<p class="testinav">
					<strong><?php the_author();?></strong><br />
					<a href="#"><?php the_title();?></a>
				</p>
				<div class="clear"></div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="clear"></div>
</div>
