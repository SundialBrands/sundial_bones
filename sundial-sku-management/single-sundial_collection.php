<?php
/**
 * The template for displaying all single collections
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
<div>

</div>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

//most of this can be moved to a function in main plugin... just need to return $collection array using ID
			
			$collection = get_collection_meta( get_the_ID(), $product_navcats );
			
			
			// Includes the single post content template.
			?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header" style="color:<?php echo $collection['color2'] ?>;background:<?php echo $collection['color1'] ?>;padding: 2em 1em;">
		<h1 class="entry-title">Collection:</h1>
		<h2><?php echo $collection['title'] ?></h2>
	</header><!-- .entry-header -->
	
	


	<div class="sundial-productImages">
		<?php if( !empty( $collection['thumburl'] ) ) : ?>
			<a href="<?php echo $collection['thumburl'] ?>" download="<?php echo sanitize_title( get_the_title() ) ?>.png" class="main"><?php the_post_thumbnail( 'large', array( 'class' => 'aligncenter' ) ); ?></a>
		<?php endif ?>
	</div>
	
	
	<div class="entry-content">
		<div class="sundial-collection-shipDate">
			<h3><?php echo $names['ship_date'] ?>: </h3>
			<p><?php echo $collection['shipdate'] ?></p>
		</div>
		<div class="sundial-collection-overview">
			<h3><?php echo $names['positioning_strategy_overview'] ?> </h3>
			<p>
				<?php echo $collection['overview'] ?>
			</p>
		</div>
		<div class="sundial-collection-content">
			<h3>Key Selling Points & Points of Difference: </h3>
		</div>
		<?php the_content(); ?>
			
		<div class="sundial-collection-needStates">
			<h3>Need States: </h3>
			<?php echo $collection['needstates'] ?>
		</div>
		
		<div class="sundial-collection-products">
			<h3>Products: </h3>
			<?php echo $collection['products'] ?>
		</div>
		<div class="sundial-collection-keyIngredients">
			<h3>Key Ingredients: </h3>
			<?php echo $collection['kingredients'] ?>
		</div>
		<div class="sundial-collection-tagLine">
			<h3><?php echo $names['tag_line'] ?> </h3>
			<p>
				<?php echo $collection['tagline'] ?>
			</p>
		</div>
		<div class="sundial-collection-keyWords">
			<h3><?php echo $names['key_words'] ?> </h3>
			<p>
				<?php echo $collection['keywords'] ?>
			</p>
		</div>
		<div class="sundial-collection-adCopy">
			<h3><?php echo $names['ad_copy'] ?> </h3>
			<p>
				<?php echo $collection['adcopy'] ?>
			</p>
		</div>
		<div class="sundial-collection-adSupport">
			<h3><?php echo $names['advertising_support']['title'] ?> </h3>
			<p>
				<?php echo $collection['adsupport'] ?>
			</p>
		</div>
		<div class="sundial-collection-socialOutlets">
			<h3><?php echo $names['social_outlets'] ?> </h3>
			<p>
				<?php echo $collection['social'] ?>
			</p>
		</div>
		<div class="sundial-collection-misc">
			<h3><?php echo $names['misc'] ?> </h3>
			<p>
				<?php echo $collection['misc'] ?>
			</p>
		</div>
		<div class="sundial-collection-competitors">
			<h3>Competitive Product: </h3>
			<p>
				<?php echo $collection['competitors'] ?>
			</p>
		</div>
		
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
	</div><!-- .entry-content -->

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
<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
