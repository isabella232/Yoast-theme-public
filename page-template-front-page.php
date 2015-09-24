<?php
/**
 * Template Name: Home
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader-home', array( 'home' => true ) ); ?>

<div class="site">

	<main role="main">

		<section class="row iceberg">
			<?php get_template_part( 'html_includes/partials/promoblocks-homepage' ); ?>
		</section>

		<hr class="hr--no-pointer" data-push-sticky>

		<div class="rowholder">
			<section class="row iceberg theme-academy">

				<h2><a href="<?php echo url_plugin_overview(); ?>">WordPress plugins by Yoast</a></h2>
				<?php get_template_part( 'html_includes/partials/more-plugin' ); ?>
			</section>
		</div>

		<hr>

		<div class="rowholder">
			<section class="row">

				<h2 class="color-academy--secondary"><a class="color-academy--secondary" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Recent Posts</a></h2>

				<?php get_template_part( 'html_includes/partials/recent-articles', array( 'class1' => 'theme-academy--secondary color-academy--secondary', 'class2' => 'color-academy--secondary' ) ); ?>

			</section>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'theme-academy announcement--pointer-top island' ) ); ?>

		<div class="rowholder">
			<section class="row island iceberg theme-about">

				<h2>Bundle plugins and save money!</h2>
				<?php get_template_part( 'html_includes/partials/more-bundleplugin', array( 'class1' => 'color-about', 'class2' => 'color-cta' ) ); ?>
			</section>
		</div>

		<?php get_template_part( 'html_includes/partials/announcement', array(
			'class' => 'announcement--pointer theme-software',
			'text'  => 'Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;',
			'url'   => url_academy_overview(),
			'icon'  => 'graduation-cap',
		) ); ?>

		<div class="rowholder">
			<section class="row island iceberg">
				<?php get_template_part( 'html_includes/partials/more-categories', array( 'class' => 'color-software--secondary' ) ); ?>
				<a href="<?php echo home_url( 'seo-blog/' ); ?>" class="color-software--secondary link--naked rightaligned">Browse our SEO Blog &raquo;</a>
			</section>
		</div>

		<hr class="hr--no-pointer">

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
