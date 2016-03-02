				<div class="trim trim-top" role="complementary">

					<?php if ( is_active_sidebar( 'trim_top' ) ) : ?>

						<?php dynamic_sidebar( 'trim_top' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						

					<?php endif; ?>

				</div>
