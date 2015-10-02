<?php

if ( ! defined( 'ABSPATH' ) ) exit;

global $quiz;

$passing_percent = $quiz->get_passing_percent();

if ( $passing_percent ) :
	?>

	<div class="clear"></div>
	<div class="llms-template-wrapper">
		<h3 class="llms-content-block">
			<?php if ( 100 === (int) $passing_percent ) : ?>
				<?php printf( __( 'A score of <span class="llms-content llms-pass-perc">%s%%</span> is required to pass this test.', 'yoastcom' ), $passing_percent ); ?>
			<?php else: ?>
				<?php printf( __( 'A score of <span class="llms-content llms-pass-perc">%s%%</span> or more is required to pass this test.', 'yoastcom' ), $passing_percent ); ?>
			<?php endif; ?>
		</h3>
	</div>

<?php endif; ?>



