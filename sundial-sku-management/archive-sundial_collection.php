<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); 

global $sundial_collection_text_input_fields;
global $sundial_collection_checkbox_input_fields;
global $sundial_collection_color_fields;
global $sundial_collection_textarea_fields;
$names = array_merge( $sundial_collection_checkbox_input_fields, $sundial_collection_textarea_fields, $sundial_collection_text_input_fields );
$product_navcats = array(

	'bath_body'	=> 'navigation-bath,navigation-body',
	'hair'		=> 'navigation-hair',
	'skin'		=> 'navigation-face'

);

?>

	<div id="content" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				
				?>
			</header><!-- .page-header -->
			<?php echo '<div class="sundial_prev_static_post"></div>'; ?>
			<?php
			// Start the Loop.
			$i=0;
			while ( have_posts() ) : the_post();

				$collection = get_collection_meta( get_the_ID(), $product_navcats );
				$nsarray = wp_get_post_terms( $post_id, 'need_states' );
				$need_state = '';
				foreach( $nsarray as $state ) {
					if( strpos( strtolower( $state->name ), 'for ' ) ) {
						$need_state = $state->name;
					}
				}
				?>
				
				<?php if( $i == 0 ) { echo '<div class="sundial_active_static_post">'; } ?>
				<?php if( $i == 1 ) { echo '<div class="sundial_next_static_post">'; } ?>
				<?php if( $i > 1 ) { echo '<div class="sundial_' . $i . '_static_post">'; } ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="sundial_static_post_container">
				
						<div class="sundial_static_post_block" style="background:<?php echo $collection['color1'] ?>;">
						</div>
				
						<div class="sundial_static_post wrap cf">
					
							<div class="sundial_static_post-burst">
								<img src="<?php echo get_template_directory_uri() . '/library/images/burst.svg' ?>" />
							</div>
							
							<div class="sundial_static_post-benefit">
								<h2><?php echo $collection['tagline']; ?></h2>
							</div>
						
							<div class="sundial_static_post-title" style="color:<?php echo $collection['color2'] ?>;">
								<h1><?php the_title(); ?></h1>
							</div>
						
							<div class="sundial_static_post-image">
								<?php the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) ); ?>
							</div>
						
							<div class="sundial_static_post-needstate">
								<h2><?php echo $need_state; ?></h2>
							</div>
					
						</div>

				</article>
				<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							'<i class="fa fa-pencil-square-o fa-2x"></i>Edit<span class="screen-reader-text"> "%s"</span>',
							get_the_title()
						),
						'<span class="sundial-button edit-link">',
						'</span>'
					);
				?>
				</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
				<?php  echo '</div>'; ?>
			
	
		
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">Pages:</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">Page </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			
		?>

	
				
				<?php

				$i++;
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
