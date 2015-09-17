<?php
/**
 * Template Name: Single plugin
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'software-sub' => true ) ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<h1>News SEO by Yoast plugin</h1>
		</div>

		<hr class="hr--no-pointer">

		<div class="row">
			<div class="media">
				<a href="#" class="imgExt">
					<img src="http://placehold.it/90x90">
				</a>
				<div class="bd">
					<?php get_template_part( 'html_includes/partials/list-usp', array( 'class' => "color-software" ) ); ?>
					<a class="button default">Buy News SEO from $69 &raquo;</a>
				</div>
			</div>
		</div>

		<hr class="hr--no-pointer">

		<article>
			<div class="row">

				<?php get_template_part( 'html_includes/partials/quote' ); ?>

				<section class="content">
					<h2>Start optimizing for Google News!</h2>
					<p>
						The News SEO plugin for the WordPress SEO plugin helps you do all the things that allow you to optimize your site for Google News. It creates XML News Sitemaps, editors picks RSS feeds and allows for use of the standout tag and the meta news_keywords tag as well as helping you optimize some of the more advanced XML News sitemap options like stock tickers.
					</p>
					<p>
						While this plugin won’t submit your site to Google News for you, it will help you optimize your site to appear as often and in the best way possible in Google News and in the universal search results.
					</p>
				</section>

			</div>

			<hr class="hr--no-pointer">

			<?php get_template_part( 'html_includes/partials/plugin-information' ); ?>

			<hr>

			<div class="row iceberg">
				<section class="content">
					<h2>Want all our SEO plugins at once?</h2>
					<p>
						The News SEO plugin for the WordPress SEO plugin helps you do all the things that allow you to optimize your site for Google News. It creates XML News Sitemaps, editors picks RSS feeds and allows for use of the standout tag and the meta news_keywords tag as well as helping you optimize some of the more advanced XML News sitemap options like stock tickers.
					</p>
					<p>
						While this plugin won’t submit your site to Google News for you, it will help you optimize your site to appear as often and in the best way possible in Google News and in the universal search results.
					</p>
					<a class="button default">Buy News SEO from $69 &raquo;</a>
				</section>
			</div>
		</article>

		<div class="announcement announcement--pointer-top fill fill--secondary">
			<div class="row">
				<h2>Bundle plugins and save money</h2>
				<?php get_template_part( 'html_includes/partials/more-bundleplugin' ); ?>
			</div>
		</div>

		<div class="row island iceberg">
			<?php get_template_part( 'html_includes/partials/more-readmore' ); ?>
		</div>

		<hr>

		<section class="row">
			<div class="content">
				<h3 class="h2">Advanced News SEO</h3>
				<p>
					The module allows you to do a bit more advanced News SEO by allowing you to decide whether a specific article should be in the Google News XML sitemap, specify meta news keywords, set a genre and define stock tickers.
				</p>
				<h4 class="h3">Exclude categories</h4>
				<p>
					With the News SEO plugin you can easily disable specific categories that shouldn’t be included in the Google News XML sitemap. You can select them after you enabled certain post types.
				</p>
			</div>

			<?php get_template_part( 'html_includes/partials/social', array( 'class' => "social bottom-right" ) ); ?>
		</section>

		<div class="row">
			<?php get_template_part( 'html_includes/partials/promoblock-buy' ); ?>
		</div>

		</section>

		<hr class="hr--no-pointer">

		<div class="row">
			<?php get_template_part( 'html_includes/partials/testimonial' ); ?>
		</div>

		<?php get_template_part( 'html_includes/partials/announcement-addonmodules' ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
