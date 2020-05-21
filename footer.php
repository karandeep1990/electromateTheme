<?php
$blogTemplateUrl= get_bloginfo('template_url');
?>
</div>
<div class="footer">  <div class="footer">
<div class="footer-link">
<div class="container1">
<div class="container-heading">Our Journey</div>
<div class="container-listing">
<?php 
	$args= array(
	'theme_location'  => 'tertiary',
	'container'       => 'ul',
	'container_class' => 'menu-{menu slug}-container',

	);
	wp_nav_menu($args);
?>
</div>
</div>

<div class="container1">
<div class="container-heading">Authorized Distribution</div>
<div class="container-listing">
<?php 
	$args= array(
	'menu'            => 'OtherProducts',
	'container'       => 'ul',
	'container_class' => 'menu-{menu slug}-container',

	);
	wp_nav_menu($args);
?>
</div>

</div>

<div class="container1">
<div class="container-heading">Client Area</div>
<div class="container-listing">

<?php 
	$args= array(
	'menu'            => 'Clients',
	'container'       => 'ul',
	'container_class' => 'menu-{menu slug}-container',

	);
	wp_nav_menu($args);
?>

</div>

</div>

<div class="container1">
<div class="container-heading">Careers</div>
<div class="container-listing">
<?php 
	$args= array(
	'menu'            => 'Careers',
	'container'       => 'ul',
	'container_class' => 'menu-{menu slug}-container',

	);
	wp_nav_menu($args);
?>

</div>

</div>

<div class="container2">
<div class="container-heading2">Contact Us</div>
<div class="container-listing2">
Electromate Inverters<br>
<br>
Plot No. 1012 Prabhu Prem Puram<br>
Near DAV Riverside Public School<br>
Ambala Cantt- 133001 - INDIA<br>
Tel: +91 9034967972 <br>
Email: info@electromate.in<br>
<br>
</div>
</div>

<script type="text/javascript">

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-11695287-2']);
_gaq.push(['_trackPageview']);

(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();

</script>

<div class="copyright">
<span >Developed & Maintained by:&nbsp;<a href="http://techtutelage.com/">➚TechTutelage </a></span>
 © 2016 - <?php echo date('Y'); ?> Electromate-inverters.  All Rights Reserved. &nbsp; &nbsp; 
<a href="https://en-gb.facebook.com/Electromate-We-make-life-Happier-101813384880092/" target="_blank"><img src="<?php echo $blogTemplateUrl;?>/images/img-fb.png" alt="Facebook" title="Facebook"></a> | 
<a href="https://www.linkedin.com/company/7971482/" target="_blank"><img src="<?php echo $blogTemplateUrl;?>/images/img-ln.png" alt="Linkedin" title="Linkedin"></a> 
</div>
<!--Footer Ends-->
</div></body></html>
