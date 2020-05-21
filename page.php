<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
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
</div>

<?php 
get_sidebar();
get_footer();
?>
