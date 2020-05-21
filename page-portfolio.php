<?php
/**
 * theme name : portfolio page
 */
$bloginfo= get_bloginfo('template_url');
get_header();
?>

<?php
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_front_page() ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h2>
		<?php } else { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } ?><br />
		<div class="box" style="text-align: justify;">
			<div class="entry-content">
					<?php
					if ( has_post_thumbnail( $post->ID ) ) {
					echo '<div style="float:right;padding-left:10px;padding-bottom:10px;">'.get_the_post_thumbnail( $post->ID ).'</div>';						                                   
					}
					?>
				<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->
		<?php //comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
		<script type="text/javascript" src="<?php echo $bloginfo;?>/js/jquery.lightbox-0.5.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $bloginfo;?>/style/jquery.lightbox-0.5.css" media="screen" />
		<script type="text/javascript">
		$(function() {
			$('#gallery1 a').lightBox();
			$('#gallery2 a').lightBox();
			$('#gallery3 a').lightBox();
			$('#gallery4 a').lightBox();
		});
		</script>
		
		<style type="text/css">
			@import url("<?php echo $bloginfo;?>/style/gallery.css");
		</style>
		
	<div id="gallery1" class="gallery">
		<h3>Ecommerce</h3>
		<ul>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image1.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image1.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image2.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image2.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image3.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image3.png" alt="" />
				</a>
			</li>
		</ul>
	</div>
	<div id="gallery2" class="gallery">
		<h3>Real Estate</h3>
		<ul>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image4.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image4.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image5.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image5.png" alt="" />
				</a>
			</li>
		</ul>
	</div>
	<div id="gallery3" class="gallery">
		<h3>Social Networking</h3>
		<ul>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image6.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image6.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image7.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image7.png" alt="" />
				</a>
			</li>
		</ul>
	</div>
	<div id="gallery4" class="gallery">
		<h3>Telecomm</h3>
		<ul>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image8.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image8.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image9.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image9.png" alt="" />
				</a>
			</li>
			<li>
				<a href="<?php echo $bloginfo;?>/portfolio/image10.png" >
					<img src="<?php echo $bloginfo;?>/portfolio/image10.png" alt="" />
				</a>
			</li>
		</ul>
	</div>

</div>

<?php 
get_sidebar();
get_footer();
?>
