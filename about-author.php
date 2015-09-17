<?php
/**
 * Template Name: About Author
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'about-sub' => true, ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
		<section class="row">
			<h1 class="color-about--secondary">Michiel Heijmans</h1>
		</section>

		<hr class="hr--no-pointer">

		<section class="row">
			<div class="media media--nofloat">
				<a href="#" class="imgExt">
					<img src="http://placehold.it/160x160" class="promoblock promoblock--imageholder">
				</a>
				<div class="bd color-academy--secondary">
					<p>
						Michiel is a senior online marketing consultant at Yoast. He was one of the first bloggers in the Netherlands and co-founded one of the first Dutch blogs about webdesign and blogging, about:blank. At Yoast, Michiel mostly works on our <a href="#">websites reviews</a>.
					</p>
					<p>
						<a href="#">Read all about Michiel</a> or find him on
						<?php get_template_part( 'html_includes/partials/social-icons' ); ?>
					</p>
				</div>
			</div>

			<?php get_template_part( 'html_includes/partials/quote' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "announcement--pointer-top fill--secondary", 'text' => "Get more visitors! Our SEO Website review will tell you what to improve. order a SEO Website review &raquo;" ) ); ?>

		<section class="row">
			<h2 class="h3 color-about--tertiary">Check out Michiels posts</h2>

			<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
		</section>

		<hr class="hr--no-pointer">

		<section class="row">
			<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => "announcement--pointer announcement--pointer-top fill--tertiary", ) ); ?>

		<section class="row">
			<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
		</section>

		<hr class="hr--no-pointer">

		<section class="row">
			<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
		</section>

		<hr class="hr--no-pointer">

		<section class="row">
			<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
		</section>

		<hr class="hr--no-pointer">

		<section class="row">
			<?php get_template_part( 'html_includes/partials/pagination' ); ?>
		</section>

		<hr>

		<section class="row iceberg">
			<h2 class="tight color-about--tertiary">Browse other Yoast Categories</h2>
			<?php get_template_part( 'html_includes/partials/list-categories' ); ?>
			<?php get_template_part( 'html_includes/partials/list-categories' ); ?>
			<?php get_template_part( 'html_includes/partials/list-categories' ); ?>

		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => "announcement--pointer-top fill--tertiary", ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
