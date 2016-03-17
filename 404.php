<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<main id="main" class="m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( '404 - Page Not Found', 'bonestheme' ); ?></h1>

							</header>

							<section class="entry-content">

								<p>
									<?php _e( 'You may have mis-typed the URL or the page doesn\'t exist. Try going back home:', 'bonestheme' ); ?><br />
									<a href="/" class="btn">HOME</a>
								</p>

							</section>


							<footer class="article-footer">

									<!-- <?php _e( 'This is the 404.php template.', 'bonestheme' ); ?> --!>

							</footer>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
