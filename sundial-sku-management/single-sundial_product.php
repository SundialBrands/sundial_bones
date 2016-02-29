<?php
/**
 * The template for displaying all single posts and attachments
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

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
			$product = get_product_meta( get_the_ID() );
			$collection_title = get_the_title( $product['collection'] );
			$collection_link = get_the_permalink( $product['collection'] );
			
			// Include the single post content template.
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
		
			$title = str_replace( get_the_title(), strtoupper( get_the_title() ) . '<br/>', $product['title'] );
			$title = str_replace( strtoupper( $collection_title ),  strtoupper( $collection_title ) . '<br/>', $title );
			$title .= '<br/>' . $product['verbal'];
		
		?>
		<h1 class="entry-title">
			<?php echo $title ?>
			
			<div class="sundial-productImages">
				<?php if( !empty( $product['thumburl'] ) ) : ?>
					<a href="<?php echo $product['thumburl'] ?>" download="<?php echo $product['eaupc'] ?>.png"><?php the_post_thumbnail( 'thumbnail') ?></a>
				<?php endif ?>
				<?php if( !empty( $ill = wp_get_attachment_image( $product['illid'], 'thumbnail' ) ) ): ?>
					<a href="<?php echo wp_get_attachment_url( $product['illid'] ); ?>" download="<?php echo $product['eaupc'] ?>-ill.png"><?php echo $ill; ?></a>
				<?php endif; ?>
				<?php if( !empty( $alt1 = wp_get_attachment_image( $product['alt1id'], 'thumbnail' ) ) ): ?>
					<a href="<?php echo wp_get_attachment_url( $product['alt1id'] ); ?>" download="<?php echo $product['eaupc'] ?>-1.png"><?php echo $alt1; ?></a>
				<?php endif; ?>
				<?php if( !empty( $alt2 = wp_get_attachment_image( $product['alt2id'], 'thumbnail' ) ) ): ?>
					<a href="<?php echo wp_get_attachment_url( $product['alt2id'] ); ?>" download="<?php echo $product['eaupc'] ?>-2.png"><?php echo $alt2; ?></a>
				<?php endif; ?>
			</div>
			
		</h1>
	</header><!-- .entry-header -->
	
	

	<div class="entry-content">
		<div class="sundial-salesInfo">
			<div class="sundial-product-upc">
				<h3>UPC: </h3>
				<p><?php echo empty( $product['eaupc'] ) ? '-' : $product['eaupc'] ?></p>
			</div>
			<div class="sundial-product-msrp">
				<h3><?php echo $names['msrp']  ?>:</h3>
				<p>$ <?php echo empty( $product['msrp'] ) ? '-' : $product['msrp'] ?></p>
			</div>
			<div class="sundial-product-shipDate">
				<h3><?php echo $names['ship'] ?>:</h3>
				<p><?php echo empty( $product['shipdate'] ) ? '-' : $product['shipdate'] ?></p>
			</div>
			<div class="sundial-product-onCounter">
				<h3><?php echo $names['on_counter'] ?>:</h3>
				<p><?php echo empty( $product['oncounter'] ) ? '-' : $product['oncounter'] ?></p>
			</div>
			<div class="sundial-product-account">
				<h3><?php echo $names['account'] ?>:</h3>
				<p><?php echo empty( $product['account'] ) ? '-' : $product['account'] ?></p>
			</div>
			<div class="sundial-product-doors">
				<h3><?php echo $names['doors'] ?>:</h3>
				<p><?php echo empty( $product['doors'] ) ? '-' : $product['doors'] ?></p>
			</div>
			
			<table class="print-only">
				<thead>
					<tr>
						<th>
							UPC
						</th>
						<th>
							MSRP
						</th>
						<th>
							SHIP
						</th>
						<th>
							ON-COUNTER
						</th>
						<th>
							ACCOUNT
						</th>
						<th>
							# of DOORS
						</th>
						<th>
							MARKET
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<?php echo $product['eaupc']; ?>
						</td>
						<td>
							<?php echo $product['msrp']; ?>
						</td>
						<td>
							<?php echo $product['shipdate']; ?>
						</td>
						<td>
							<?php echo $product['oncounter']; ?>
						</td>
						<td>
							<?php echo $product['account']; ?>
						</td>
						<td>
							<?php echo $product['doors']; ?>
						</td>
						<td>
							<?php echo $product['market']; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<hr/>
		
		<div class="sundial-product-content">
			<h3>Product Description & Features:</h3>
		</div>
		<?php
			
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">Pages: </span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">Page </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
		
		<div class="sundial-product-usage">
			<h3><?php echo $names['usage'] ?></h3>
			<p><?php echo $product['usage'] ?></p>
		</div>
		<div class="sundial-product-usage">
			<h3><?php echo $names['packaging'] ?></h3>
			<p><?php echo $product['pkg'] ?></p>
		</div>
		<div class="sundial-product-ingredients">
			<h3><?php echo $names['ingredients'] ?></h3>
			<p><?php echo $product['ingredients'] ?></p>
		</div>
		
		<hr/>
		
		<div class="sundial-stockInfo">
			
			<h2>Stock & Physical Data</h2>
			
			<div class="sundial-product-unitHeight">
				<h3>Unit Height: </h3>
				<p><?php echo empty( $product['unit']['height'] ) ? '-' : $product['unit']['height'] ?></p>
			</div>
			<div class="sundial-product-unitWidth">
				<h3>Unit Width: </h3>
				<p><?php echo empty( $product['unit']['width'] ) ? '-' : $product['unit']['width'] ?></p>
			</div>
			<div class="sundial-product-unitDepth">
				<h3>Unit Depth: </h3>
				<p><?php echo empty( $product['unit']['depth'] ) ? '-' : $product['unit']['depth'] ?></p>
			</div>
			<div class="sundial-product-unitWeight">
				<h3>Unit Weight: </h3>
				<p><?php echo empty( $product['unit']['weight'] ) ? '-' : $product['unit']['weight'] ?></p>
			</div>
			<div class="sundial-product-unitQty">
				<h3>Unit Qty: </h3>
				<p><?php echo empty( $product['unit']['qty'] ) ? '-' : $product['unit']['qty'] ?></p>
			</div>
			<div class="sundial-product-unitUpc">
				<h3>Unit UPC: </h3>
				<p><?php echo empty( $product['unit']['upc'] ) ? '-' : $product['unit']['upc'] ?></p>
			</div>
			<div class="sundial-product-unitCode">
				<h3>Unit UPC: </h3>
				<p><?php echo empty( $product['unit']['upc'] ) ? '-' : $product['unit']['code'] ?></p>
			</div>
			
			<br/>
			
			<div class="sundial-product-innerHeight">
				<h3>Inner Height: </h3>
				<p><?php echo empty( $product['inner']['height'] ) ? '-' : $product['inner']['height'] ?></p>
			</div>
			<div class="sundial-product-innerWidth">
				<h3>Inner Width: </h3>
				<p><?php echo empty( $product['inner']['width'] ) ? '-' : $product['inner']['width'] ?></p>
			</div>
			<div class="sundial-product-innerDepth">
				<h3>Inner Depth: </h3>
				<p><?php echo empty( $product['inner']['depth'] ) ? '-' : $product['inner']['depth'] ?></p>
			</div>
			<div class="sundial-product-innerWeight">
				<h3>Inner Weight: </h3>
				<p><?php echo empty( $product['inner']['weight'] ) ? '-' : $product['inner']['weight'] ?></p>
			</div>
			<div class="sundial-product-innerQty">
				<h3>Inner Qty: </h3>
				<p><?php echo empty( $product['inner']['qty'] ) ? '-' : $product['inner']['qty'] ?></p>
			</div>
	
			<br/>
			
			<div class="sundial-product-caseHeight">
				<h3>Case Height: </h3>
				<p><?php echo empty( $product['case']['height'] ) ? '-' : $product['case']['height'] ?></p>
			</div>
			<div class="sundial-product-caseWidth">
				<h3>Case Width: </h3>
				<p><?php echo empty( $product['case']['width'] ) ? '-' : $product['case']['width'] ?></p>
			</div>
			<div class="sundial-product-caseDepth">
				<h3>Case Depth: </h3>
				<p><?php echo empty( $product['case']['depth'] ) ? '-' : $product['case']['depth'] ?></p>
			</div>
			<div class="sundial-product-caseWeight">
				<h3>Case Weight: </h3>
				<p><?php echo empty( $product['case']['weight'] ) ? '-' : $product['case']['weight'] ?></p>
			</div>
			<div class="sundial-product-caseQty">
				<h3>Case Qty: </h3>
				<p><?php echo empty( $product['case']['qty'] ) ? '-' : $product['case']['qty'] ?></p>
			</div>
			<div class="sundial-product-caseUpc">
				<h3>Case UPC: </h3>
				<p><?php echo empty( $product['case']['upc'] ) ? '-' : $product['case']['upc'] ?></p>
			</div>
			<div class="sundial-product-caseCode">
				<h3>Case Code: </h3>
				<p><?php echo empty( $product['case']['upc'] ) ? '-' : $product['case']['code'] ?></p>
			</div>
		
			<table class="print-only">
				<thead>
					<tr>
						<td></td>
						<th scope="col">
							HEIGHT
						</th>
						<th scope="col">
							WIDTH
						</th>
						<th scope="col">
							DEPTH
						</th>
						<th scope="col">
							WEIGHT(lbs.) 
						</th>
						<th scope="col">
							QTY
						</th>
						<th scope="col">
							UPC
						</th>
						<th scope="col">
							CODE
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">
							UNIT
						</th>
						<td>
							<?php echo $product['unit']['height'] ?>
						</td>
						<td>
							<?php echo $product['unit']['width'] ?>
						</td>
						<td>
							<?php echo $product['unit']['depth'] ?>
						</td>
						<td>
							<?php echo $product['unit']['weight'] ?>
						</td>
						<td>
							<?php echo $product['unit']['qty'] ?>
						</td>
						<td>
							<?php echo $product['unit']['upc'] ?>
						</td>
						<td>
							<?php echo $product['unit']['code'] ?>
						</td>
					</tr>
					<tr>
						<th scope="row">
							INNER
						</th>
						<td>
							<?php echo $product['inner']['height'] ?>
						</td>
						<td>
							<?php echo $product['inner']['width'] ?>
						</td>
						<td>
							<?php echo $product['inner']['depth'] ?>
						</td>
						<td>
							<?php echo $product['inner']['weight'] ?>
						</td>
						<td>
							<?php echo $product['inner']['qty'] ?>
						</td>
						<td>
							N/A
						</td>
						<td>
							N/A
						</td>
					</tr>
					<tr>
						<th scope="row">
							CASE
						</th>
						<td>
							<?php echo $product['case']['height'] ?>
						</td>
						<td>
							<?php echo $product['case']['width'] ?>
						</td>
						<td>
							<?php echo $product['case']['depth'] ?>
						</td>
						<td>
							<?php echo $product['case']['weight'] ?>
						</td>
						<td>
							<?php echo $product['case']['qty'] ?>
						</td>
						<td>
							<?php echo $product['case']['upc'] ?>
						</td>
						<td>
							<?php echo $product['case']['code'] ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
		<a href="<?php echo $collection_link; ?>" class="sundial-button link"><i class="fa fa-level-up fa-2x"></i></span> Go to Collection</a>
		
		<?php if( function_exists( 'wp_objects_pdf' ) ) {
			wp_objects_pdf();
		} 
		else { ?>
		<a href="<?php echo $product['eaupc'] . '.pdf'; ?>" class="sundial-button pdf"><span class="fa-stack"><i style="top:1.25em;" class="fa fa-arrow-down fa-stack-1x" ></i><i class="fa fa-file-pdf-o fa-stack-2x"></i></span> Download PDF</a>
		<?php } ?>
		
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
					'prev_text' => '<span class="meta-nav">Published in</span><span class="post-title">%title</span>Parent post link',
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
<?php // } ?>
