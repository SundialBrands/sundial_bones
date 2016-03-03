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
			<div class="sundial_static_post_containers">
				<div class="sundial_prev_static_post">
				</div>
				<?php
				// Start the Loop.
				$i=0;
				while ( have_posts() ) : the_post();

					$collection = get_collection_meta( get_the_ID(), $product_navcats );
					$nsarray = wp_get_post_terms( get_the_ID(), 'need_states' );
					$need_state = '';
					foreach( $nsarray as $state ) {
						if( strpos( strtolower( $state->name ), 'for ' ) === 0 ) {
							$need_state = $state->name;
						}
					}
				
					$color = strtolower( $collection['color1'] );
					switch( $color ) {
				
						case '#a7a9ac':
							$color = 'gray';
							break;
						case '#af95c6':
							$color = 'lilac';
							break;
						case '#ce7e9c':
							$color = 'pink';
							break;
						case '#63b0bb':
							$color = 'teal';
							break;
						case '#ecba4b':
							$color = 'yellow';
							break;
						default:
							$color = '';
				
					}
				
					?>
				
					<?php if( $i == 0 ) {  echo '<div class="sundial_active_static_post">'; } ?>
					<?php if( $i == 1 ) { echo '<div class="sundial_next_static_post">'; } ?>
					<?php if( $i > 1 ) { echo '<div class="sundial_numbered_static_post right-side number' . $i . '">'; } ?>
						
						<article id="post-<?php the_ID(); ?>" <?php post_class( array( $color, 'targetId' . $i ) ); ?> >
							<div class="sundial_static_post_container">
								<div target="<?php echo ($i==0) ? 'none' : ($i-1); ?>" class="trigger_previous_sundial_static_post">
									<i class="fa fa-chevron-left"></i>
								</div>
								<div target="<?php echo ($i+1); ?>" class="trigger_next_sundial_static_post">
									<i class="fa fa-chevron-right"></i>
								</div>
								<div class="sundial_static_post wrap cf">
								
									<div class="sundial_static_post-benefit">
										<h2><?php echo $collection['tagline']; ?></h2>
									</div>
						
									<div class="sundial_static_post-title" style="color:<?php echo $collection['color2'] ?>;">
										<h1><?php the_title(); ?></h1>
									</div>
						
									<div class="sundial_static_post-image">
										<?php the_post_thumbnail( 'large', array( 'class' => 'aligncenter collection-image' ) ); ?>
										<img class="sundial_static_post-burst" src="<?php echo get_template_directory_uri() . '/library/images/burst.svg' ?>" />
									</div>
							
					
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
								</div>
								<div class="sundial_static_post_block" style="background:<?php echo $collection['color1'] ?>;">
						
									<div class="sundial_static_post-needstate">
										<h2><?php echo $need_state; ?></h2>
									</div>
						
								</div>
						
								<div class="product-information">
									<div class="interior"></div>
									<div class="description">
										<?php the_content(); ?>
									</div>
								</div>
							
							</div>

						</article>
				
					</div>		
				<?php

					$i++;
				// End the loop.
				endwhile; ?>
			
			</div>
			
		<?php

		// If no content, return nothing.
		
		//nothing.
		

		endif;
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
