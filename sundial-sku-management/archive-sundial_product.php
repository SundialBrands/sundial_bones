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

global $sundial_product_text_input_fields;
global $sundial_product_number_input_fields;
global $sundial_product_price_input_fields;
global $sundial_product_textarea_fields;
$names = array_merge( $sundial_product_text_input_fields, $sundial_product_number_input_fields, $sundial_product_price_input_fields, $sundial_product_textarea_fields );


?>

	<div id="content" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				
				?>
			</header><!-- .page-header -->
			<div class="sundial_static_post_containers">
				
				<?php
				// Start the Loop.
				$i=0;
				while ( have_posts() ) : the_post();
					$product = get_product_meta( get_the_ID() );
					$collection_color1 = get_post_meta( $product['collection'], 'sundial_primary_color_hex', true );
					$collection_color2 = get_post_meta( $product['collection'], 'sundial_secondary_color_hex', true );
					$collection_title = get_the_title( $product['collection'] );
					// $title = str_replace( get_the_title(), strtoupper( get_the_title() ) . '<br/>', $product['title'] );
// 					$title = str_replace( strtoupper( $collection_title ),  strtoupper( $collection_title ) . '<br/>', $title );
// 					$title .= '<br/>' . $product['verbal'];
				
					$color = strtolower( $collection_color1 );
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
					$nsarray = wp_get_post_terms( get_the_ID(), 'need_states' );
					$need_state = '';
					foreach( $nsarray as $state ) {
						if( strpos( strtolower( $state->name ), 'for ' ) === 0 ) {
							$need_state = $state->name;
						}
					}
				
					?>
				
					<?php if( $i == 0 ) {  echo '<div class="sundial_active_static_post">'; } ?>
					<?php if( $i == 1 ) { echo '<div class="sundial_next_static_post right-side number1">'; } ?>
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
										<!-- <h2><?php //echo $product['verbal']; ?></h2> -->
									</div>
						
									<div class="sundial_static_post-title" style="color:<?php echo $collection['color2'] ?>;">
										<!-- <h1><?php //the_title(); ?></h1> -->
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
								<div class="sundial_static_post_block" style="background:<?php echo $collection_color1 ?>;">
						
									<div class="sundial_static_post-needstate">
										<h1><?php the_title(); ?></h1>
									</div>
						
								</div>
						
								<div class="product-information">
									<div class="interior"></div>
									<div class="benefits">
										<?php echo $product['verbal']; ?>
									</div>
									<div class="ingredients">
										<?php echo $collection_title; ?>
									</div>
									<div class="need-state">
										<?php echo $need_state; ?>
									</div>
									<div class="description">
										<?php the_content(); ?>
									</div>
									<div class="cta">
										<a href="<?php echo $product['link']; ?>" class="btn">SHOP</a>
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
