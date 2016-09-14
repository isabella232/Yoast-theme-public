<?php
/**
 * @package Yoast\YoastCom
 */

namespace Yoast\YoastCom\Theme;

$step = get_checkout_step();
?>
<div class="progress" id="steps-progress" data-step="<?php echo esc_attr( $step ); ?>">
	<div class="row">
		<ol class="list--steps">
			<li>
				<?php if ( 1 !== $step ) : ?><a href="<?php echo esc_url( url_shop_page() ); ?>"><?php endif; ?>
				<?php
					/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sChoose your %2$s%3$sproducts%4$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
				<?php if ( 1 !== $step ) : ?></a><?php endif; ?>
			</li>
			<li<?php if ( 2 === $step ) : ?> class="step--current"<?php endif; ?>>
				<?php if ( 2 !== $step ) : ?><a href="<?php echo esc_attr( url_checkout() ); ?>"><?php endif; ?>
				<?php
				/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sEnter %2$s%3$syour details%4$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
				<?php if ( 2 !== $step ) : ?></a><?php endif; ?>
			</li>
			<li<?php if ( 3 === $step ) : ?> class="step--current"<?php endif; ?>>
				<?php
					/* translators: Text between %1$s and %2$s is hidden on tablets, text between %3$s and %4$s is hidden on mobile. */
					printf(
						'%1$sChoose your %2$s%3$spayment method%4$s',
						'<span class="hide-on-tablet">',
						'</span>',
						'<span class="hide-on-mobile">',
						'</span>'
					);
				?>
			</li>
			<li<?php if ( 4 === $step ) : ?> class="step--current"<?php endif; ?>>
				<span class="hide-on-mobile"><?php _e( 'Finished', 'yoastcom' ); ?></span>
			</li>
		</ol>
	</div>
</div>
