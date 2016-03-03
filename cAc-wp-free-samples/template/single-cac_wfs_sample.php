<?php get_header(); ?>
			<div id="inner-header" class="wrap cf">
				
<!-- 
					<div class="to-nav">
						<a id="show-menu" class="btn" href="#menu-main"><i class="fa fa-bars fa-lg"></i></a>
					</div>
 -->
					
					<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization">
						<a href="http://www.sheamoisture.com" rel="nofollow"><img src="/wp-content/themes/sundial_bones/library/images/logo.png" alt="SheaMoisture. Established 1912." />
						</a>
					</div>
					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php 

							echo apply_filters('bones_before_dropdown', '<h1 class="bones-dropdown-sentence">Find a solution for ') . '<div class="dropdown-items" select-text="select:">';
							wp_nav_menu( array(
								'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
								'menu' => __( 'Top Main Menu', 'bonestheme' ),  // nav name
								'menu_class' => 'nav top-dropdown cf',               // adding custom nav class
								'menu_id'	=> 'menu-dropdown',
								'theme_location' => 'top-dropdown',                 // where it's located in the theme
								'before' => '',                                 // before the menu item
								'after' => '',                                  // after the menu item
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 1,                                   // limit the depth of the nav
								'fallback_cb' => ''                             // fallback function (if there is one)
							) ); 
							echo '<i class="fa fa-chevron-down "></i></div>' . apply_filters('bones_after_dropdown', '.</h1>');
						?>

					</nav>

					
				</div>

			</header>
			<div id="content">

				<div id="inner-content" class="">

					<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
							$sample_id =  get_the_ID();
							
							$sample_data = array(
							
								'benefit' 		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_benefit', true ) ),
								'needstate' 	=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_needstate', true ) ),
								'color' 		=> get_post_meta( $sample_id, 'cac_wfs_sample_sm_color', true ),
								'item_one' 		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_itemone', true ) ),
								'item_two' 		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_itemtwo', true ) ),
								'ingredient_one' => array(
		
									'image_url'	=> wp_get_attachment_url( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_img', true ) ),
									'img'		=> get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_img', true ),
									'name'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_name', true ) ),
									'copy'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientone_copy', true ) ),
	
								),	//end $ingredient_one
								'ingredient_two' => array(
		
									'image_url'	=> wp_get_attachment_url( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_img', true ) ),
									'img'		=> get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_img', true ),
									'name'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_name', true ) ),
									'copy'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredienttwo_copy', true ) ),
	
								),	//end $ingredient_two
								'ingredient_three' => array(
		
									'image_url'	=> wp_get_attachment_url( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_img', true ) ),
									'img'		=> get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_img', true ),
									'name'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_name', true ) ),
									'copy'		=> esc_html( get_post_meta( $sample_id, 'cac_wfs_sample_sm_ingredientthree_copy', true ) ),
	
								)	//end $ingredient_three
							
							);	//end $sample_data 
							
							$ingredients = array(
								'count' => 0
							);
							if( !empty( $sample_data['ingredient_one']['image_url'] ) ) { 
								$ingredients['count']++;
								$ingredients['first'] = 'one';
								if( !empty( $sample_data['ingredient_two']['image_url'] ) ) { 
									$ingredients['count']++;
									$ingredients['second'] = 'two';
									
									if( !empty( $sample_data['ingredient_three']['image_url'] ) ) { 
										$ingredients['count']++;
										$ingredients['third'] = 'three';
									}
									
								}
								else {
								
									if( !empty( $sample_data['ingredient_three']['image_url'] ) ) { 
										$ingredients['count']++;
										$ingredients['second'] = 'three';
									}
								
								}
								
							}
							else {
								if( !empty( $sample_data['ingredient_two']['image_url'] ) ) { 
									$ingredients['count']++;
									$ingredients['first'] = 'two';
									
									if( !empty( $sample_data['ingredient_three']['image_url'] ) ) { 
										$ingredients['count']++;
										$ingredients['second'] = 'three';
									}
									
								}
								else {
									if( !empty( $sample_data['ingredient_three']['image_url'] ) ) { 
										$ingredients['count']++;
										$ingredients['first'] = 'three';
									}
								}
							}
							
							
							?>
							
							
							
							<article id="cAc_wfs-sample-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

								<header class="article-header entry-header cAc_wfs-sample-header">

								  	<?php if( has_post_thumbnail() ) { the_post_thumbnail( array(800,800), array( 'class' => 'cAc_wfs-sample-img-main header-right' ) ); }?>
								  	<div class="box paint-bg <?php echo $sample_data['color'] ?> cAc_wfs-sample-benefit">
								  		<?php echo $sample_data['benefit']; ?>
								  	</div>
								  	<h1 class="entry-title cAc_wfs-sample-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
									<?php if( !empty( $sample_data['ingredient_one']['image_url'] ) ) { 
										echo '<img src="' . $sample_data['ingredient_one']['image_url'] . '" class="cAc_wfs-sample-img-ingredient header-left" />'; 
									} ?>
									<p class="serif aligncenter cAc_wfs-sample-needstate">
										<?php echo $sample_data['needstate']; ?>
									</p>
									<hr />
									
								</header> <?php // end article header ?>

								<section class="entry-content" itemprop="articleBody">
								<div class="cAc_wfs-sample-content">
								
								<?php
									// the content (pretty self explanatory huh)
									the_content();
								?>
									<?php if( !empty( $sample_data['ingredient_two']['image_url'] ) ) { echo '<img src="' . $sample_data['ingredient_two']['image_url'] . '" class="cAc_wfs-sample-img-ingredient body-right" />'; } ?>
								</div>
								<hr />
								<?php if( $ingredients > 0 ): ?>
								<h2 class="cAc_wfs-sample-ingredients-header">The story is in our ingredients&hellip;</h2>
								<div class="cAc_wfs-sample-ingredients row">
									<?php if( $ingredients['count'] == 1 ): ?>
										<div class="cAc_wfs-sample-ingredient col-sm-4" style="margin: 0 auto;">
											<?php 
											$first = 'ingredient_' . $ingredients['first'];
											echo '<img src="' . $sample_data[$first]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; 
											?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$first]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$first]['copy']; ?>
											</p>
										</div>
									<?php endif; ?>
									<?php if( $ingredients['count'] == 2 ): ?>
										<div class="cAc_wfs-sample-ingredient col-sm-4" style="margin-left: 16%;">
											<?php 
											$first = 'ingredient_' . $ingredients['first'];
											$second = 'ingredient_' . $ingredients['second'];
											echo '<img src="' . $sample_data[$first]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; 
											?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$first]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$first]['copy']; ?>
											</p>
										</div>
										<div class="cAc_wfs-sample-ingredient col-sm-4" style="margin-right: 16%;">
											<?php echo '<img src="' . $sample_data[$second]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; ?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$second]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$second]['copy']; ?>
											</p>
										</div>
									<?php endif; ?>
									<?php if( $ingredients['count'] == 3 ): ?>
										<div class="cAc_wfs-sample-ingredient col-sm-4">
											<?php 
											$first = 'ingredient_' . $ingredients['first'];
											$second = 'ingredient_' . $ingredients['second'];
											$third = 'ingredient_' . $ingredients['third'];
											echo '<img src="' . $sample_data[$first]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; 
											?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$first]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$first]['copy']; ?>
											</p>
										</div>
										<div class="cAc_wfs-sample-ingredient col-sm-4">
											<?php echo '<img src="' . $sample_data[$second]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; ?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$second]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$second]['copy']; ?>
											</p>
										</div>
										<div class="cAc_wfs-sample-ingredient col-sm-4">
											<?php echo '<img src="' . $sample_data[$third]['image_url']. '" class="cAc_wfs-sample-img-ingredient" />'; ?>
											<h3 class="cAc_wfs-sample-ingredient-name"><?php echo $sample_data[$third]['name']; ?></h3>
											<p class="cAc_wfs-sample-ingredient-copy">
												<?php echo $sample_data[$third]['copy']; ?>
											</p>
										</div>
									<?php endif; ?>
								</div>
								<?php endif; ?>
									 
								</section> <?php // end article section ?>

								<footer class="article-footer cAc_wfs-sample-footer">
									
									<a class="cAc_wfs-sample-form-close" href="#!"> X </a>
									
									<div class="cAc_wfs-sample-cta box <?php echo $sample_data['color']; ?>">
										
										<div class="cAc_wfs-sample-cta-initial row">
											<div class="col-sm-6">
												<h1 class="cAc_wfs-sample-cta-title">
													Free Deluxe Sample Pack
												</h1>
												<p class="cAc_wfs-sample-cta-includes">
													Deluxe Sample Pack Includes:<br/>
													<?php echo $sample_data['item_one'] ?><br />
													<?php echo $sample_data['item_two'] ?>
												</p>
											</div>
											<div class="col-sm-6">
												<a class="btn" href="#!">Get Your Sample</a>
											</div>
										</div>
										
										<div class="cAc_wfs-sample-form row">
											<div class="col-sm-12">
												<h1>Enter your information to receive your free sample of SheaMoisture <?php the_title()  ?>:</h1>
											</div>
											<form id="cAc_wfs-sample-form">
												<div class="col-sm-6">
													<h3>Your Name</h3>
													<label for="cAc_wfs_firstname">First:</label>
													<input type="text" name="cAc_wfs_firstname" />
													<label for="cAc_wfs_lastname">Last:</label>
													<input type="text" name="cAc_wfs_lastname" />
													<h3>Your Contact Information</h3>
													<label for="cAc_wfs_email">Email:</label>
													<input type="email" name="cAc_wfs_email" />
													<label for="cAc_wfs_phone">Phone:</label>
													<input type="tel" name="cAc_wfs_phone" />
												</div>
												<div class="col-sm-6">
													<h3>Your Address</h3>
													<label for="cAc_wfs_address">Street Address:</label>
													<input type="text" name="cAc_wfs_address" />
													<label for="cAc_wfs_city">City:</label>
													<input type="text" name="cAc_wfs_city" />
													<label for="cAc_wfs_state">State:</label>
													<input type="text" name="cAc_wfs_state" />
													<label for="cAc_wfs_code">Postal Code:</label>
													<input type="text" name="cAc_wfs_code" />
												</div>
												
											</form>
										</div>
									</div>
									
								
								</footer> <?php // end article footer ?>

								<?php //comments_template(); ?>

							</article> <?php // end article ?>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Sample Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'Some prob, bob.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</main>


				</div>

			</div>

<?php get_footer(); ?>
