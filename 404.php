<?php get_head() ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<main id="main" class="m-all t-all d-all cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		<?php get_header(); ?>
			<article id="post-not-found" class="hentry cf">

				<header class="article-header">

					<h1><?php _e( '404 - Page Not Found', 'bonestheme' ); ?></h1>

				</header>

				<section class="entry-content">

					<p><?php _e( 'The page you were looking for was not found, but maybe try looking again!', 'bonestheme' ); ?></p>

				</section>

				<section class="search">

						<p><?php get_search_form(); ?></p>

				</section>

				<footer class="article-footer">

						

				</footer>

			</article>

			<?php get_footer(); ?>
			
		</main>

	</div>

</div>


