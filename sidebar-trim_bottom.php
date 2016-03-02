				<div class="trim trim-bottom" role="complementary">

					<?php if ( is_active_sidebar( 'trim_bottom' ) ) : ?>

						<?php dynamic_sidebar( 'trim_bottom' ); ?>

					<?php else : ?>

						<?php
							/*
							 * This content shows up if there are no widgets defined in the backend.
							*/
						?>

						

					<?php endif; ?>

				</div>
