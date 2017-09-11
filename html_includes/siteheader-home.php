<?php
namespace Yoast\YoastCom\Theme;
?>
	<header role="banner"
	        class="siteheader" <?php if ( isset( $template_args['home'] ) ) : ?> data-header-home<?php endif; ?>>

		<?php if ( isset( $template_args['home'] ) ) : ?>
			<div class="row masthead">
				<h1 class="home-title">
					<a href="<?php echo esc_attr( home_url() ); ?>" class="pagetitle"><span
							class="visuallyhidden">Yoast</span></a>
				</h1>

				<?php
				    echo '<div class="navigation-header">';
                    get_template_part( 'html_includes/header-controls-mobile' );
                    get_template_part( 'html_includes/partials/navigation-header' );
                    get_template_part( 'html_includes/partials/search', array( 'type' => 'mobile' ) );
				echo '</div>';
				?>
			</div>

		<?php endif; ?>

		<?php if ( isset( $template_args['home-sub'] ) ) : ?>
            <div class="row masthead">
                <a href="<?php echo $yoast_url; ?>" class="pagetitle"><span class="visuallyhidden">Yoast</span></a>

	            <?php
	            if ( $show_navigation ) {
		            echo '<div class="navigation-header">';
		            get_template_part( 'html_includes/header-controls-mobile' );
		            get_template_part( 'html_includes/partials/navigation-header' );
		            get_template_part( 'html_includes/partials/search' );
		            echo '</div>';
	            }
	            ?>
            </div>
		<?php endif; ?>

		<?php theme_object()->navigation->output_menu_bar(); ?>
	</header>

<?php
