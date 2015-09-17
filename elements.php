<?php
/**
 * Template Name: Elements
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<article>
			<div class="row">
				<h1>Elements</h1>

				<?php get_template_part( 'html_includes/partials/meta-full' ); ?>

				<div class="content">
					<p>
						While writing our book ‘Optimizing your WordPress site’ I worked closely together with Joost in creating a section on Search Engine Optimization. The first chapter — after the introduction in SEO — had to be keyword research. ‘Keyword research is the basis of all Search Engine Optimization,’ Joost explained to me, ‘without proper keyword research, all other things are basically useless’.
					</p>

					<p>
						Back in 2010 Joost already wrote a post called the basis of keyword research in which he states that ‘keyword research is the basis of all search marketing’. At the very least my husband is consistent! And more importantly, I think he is absolutely right [Note from Joost: yeeehaw!].
					</p>

					<h2>What is your mission?</h2>
					<h3>Competitiveness of the market</h3>
					<h4>Long tail keywords</h4>

					<p>
						While preparing this blogpost, my husband encouraged me to read The Long Tail by Chris Anderson. The Long Tail discusses the emergence of markets (specifically markets on the internet) with unlimited supplies. Chris Anderson discovered that the true shape of demand, not filtered by the economics of scarcity shows a very long tail (see picture above). This means that demand exists for virtually every niche, although this demand can become very small. A nice example could be a jukebox with 10.000 songs.
						<img src="http://placehold.it/1200x300">
					</p>
				</div>

				<?php get_template_part( 'html_includes/partials/quote' ); ?>

				<?php get_template_part( 'html_includes/partials/testimonial' ); ?>

				<div class="content">
					<h2>What is your mission?</h2>
					<p>
						While writing our book ‘Optimizing your WordPress site’ I worked closely together with Joost in creating a section on Search Engine Optimization. The first chapter — after the introduction in SEO — had to be keyword research. ‘Keyword research is the basis of all Search Engine Optimization,’ Joost explained to me, ‘without proper keyword research, all other things are basically useless’.
					</p>

					<p>
						Back in 2010 Joost already wrote a post called the basis of keyword research in which he states that ‘keyword research is the basis of all search marketing’. At the very least my husband is consistent! And more importantly, I think he is absolutely right [Note from Joost: yeeehaw!].
					</p>

					<div class="media">
						<a href="#" class="img">
							<img src="http://placehold.it/90x90">
						</a>
						<div class="bd">
							<p>This is the media element. On small screens it shows everything the same as on large screens</p>
						</div>
					</div>

					<div class="media media--nofloat">
						<a href="#" class="img">
							<img src="http://placehold.it/90x90">
						</a>
						<div class="bd">
							<p>This is the media element. On large screens it shows everything in multiple rows of 100%</p>
						</div>
					</div>

					<p>
						<img src="http://placehold.it/215x300" class="alignleft">
						If you want to sell something, you should simply have a damn good product! And you should be well aware of what your product or your website offers to your audience… what makes it special. If you know and understand this, it will be much easier to make your audience like and buy your stuff. You should thus take some time to think about the uniqueness of your product and write that down. Perhaps you sell cruises to Hawaii.
					</p>

					<form>
						<label>Input Label
							<input type="text" placeholder="large-12.columns" />
						</label>
						<div class="grid">
							<div class="one-third">
								<label>Input Label
									<input type="text" placeholder="large-4.columns" />
								</label>
							</div>
							<div class="one-third">
								<label>Input Label
									<input type="text" placeholder="large-4.columns" />
								</label>
							</div>
							<div class="one-third">
								<label>Input Label
									<input type="text" placeholder="large-4.columns" />
								</label>
							</div>
						</div>
					</form>

					<form>
						<div class="grid">
							<div class="one-third">
								<label class="error">Error
									<input type="text" class="error" />
								</label>
								<small class="error">Invalid entry</small>
							</div>
							<div class="two-thirds">
								<label class="error">Another Error
									<input type="text" />
								</label>
								<small class="error">Invalid entry</small>
							</div>
							<div class="grid">
								<div class="full">
									<label class="error">Another Error
										<textarea class="error" placeholder="Message..."></textarea>
									</label>
									<small class="error">Invalid entry</small>
								</div>
							</div>
						</div>

						<label>Select Box:
							<select>
								<option value="husker">Husker</option>
								<option value="starbuck">Starbuck</option>
								<option value="hotdog">Hot Dog</option>
								<option value="apollo">Apollo</option>
							</select>
						</label>
						<div class="grid">
							<div class="two-fourth">
								<label>Choose Your Favorite:</label>
								<input type="radio" name="pokemon" value="Red" id="pokemonRed"><label for="pokemonRed">Red</label>
								<input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Blue</label>
							</div>
							<div class="two-fourth">
								<label>Check these out:</label>
								<input id="checkbox1" type="checkbox"><label for="checkbox1">Checkbox 1</label>
								<input id="checkbox2" type="checkbox"><label for="checkbox2">Checkbox 2</label>
							</div>
							<div class="full">
								<label>Textarea Label
									<textarea placeholder="Message..."></textarea>
								</label>
							</div>
							<div class="full">
								<a class="button default">Buy News SEO from $69 &raquo;</a>
								<a class="button dimmed">Buy News SEO from $69 &raquo;</a>
							</div>
						</div>

					</form>
				</div>
			</div>

			<aside class="announcement fill">
				<div class="row">
					<p>Want to learn more long tail keywords and keyword research? Check out our eBook <strong>Optimize your WordPress site / Optimize your website &raquo;</strong></p>
				</div>
			</aside>

			<div class="row">

				<div class="content">

					<p>
						<img src="http://placehold.it/215x300" class="alignright">
						While preparing this blogpost, my husband encouraged me to read The Long Tail by Chris Anderson. The Long Tail discusses the emergence of markets (specifically markets on the internet) with unlimited supplies. Chris Anderson discovered that the true shape of demand, not filtered by the economics of scarcity shows a very long tail (see picture above). This means that demand exists for virtually every niche, although this demand can become very small. A nice example could be a jukebox with 10.000 songs.
					</p>

					<p>
						<img src="http://placehold.it/1200x300" class="alignright">
						While preparing this blogpost, my husband encouraged me to read The Long Tail by Chris Anderson. The Long Tail discusses the emergence of markets (specifically markets on the internet) with unlimited supplies. Chris Anderson discovered that the true shape of demand, not filtered by the economics of scarcity shows a very long tail (see picture above). This means that demand exists for virtually every niche, although this demand can become very small. A nice example could be a jukebox with 10.000 songs.
					</p>

					<div class="content--tags"> Tags: <a href="">Keyword Research</a></div>

				</div>

				<?php get_template_part( 'html_includes/partials/section-extra' ); ?>

				<?php get_template_part( 'html_includes/partials/social', array( 'class' => "social", ) ); ?>

			</div>

			<?php get_template_part( 'html_includes/partials/bio' ); ?>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/promoblocks-homepage' ); ?>
			</div>

			<div class="row">
				<h1>Yoast Academy</h1>
				<?php get_template_part( 'html_includes/partials/promoblocks-academy' ); ?>
			</div>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/promoblocks-review' ); ?>
			</div>

			<?php get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => "fill--tertiary", ) ); ?>

			<div class="row theme-academy">
				<h2>WordPress plugins by Yoast</h2>
				<?php get_template_part( 'html_includes/partials/more-plugin' ); ?>
			</div>

			<div class="row">
				<h1>WordPress SEO by Yoast plugins</h1>
				<?php get_template_part( 'html_includes/partials/more-pluginlist' ); ?>
			</div>

			<div class="row">
				<h2>Google Analytics by Yoast plugins</h2>
				<?php get_template_part( 'html_includes/partials/list-unstyled' ); ?>
				<?php get_template_part( 'html_includes/partials/promoblocks-plugins' ); ?>
			</div>

			<hr>

			<div class="row theme-about">
				<h2>Bundle plugins and save money!</h2>
				<?php get_template_part( 'html_includes/partials/more-bundleplugin', array( 'class1' => 'color-about', 'class2' => 'color-cta' ) ); ?>
			</div>

			<div class="announcement fill fill--secondary">
				<div class="row">
					<h2 class="h3">Bundle plugins and save money!</h2>
					<?php get_template_part( 'html_includes/partials/more-bundleplugin' ); ?>
				</div>
			</div>

			<hr>

			<div class="row">
				<h1>Software by Yoast</h1>
				<?php get_template_part( 'html_includes/partials/more-software' ); ?>
			</div>

			<hr>

			<section class="row iceberg">
				<?php get_template_part( 'html_includes/partials/more-categories' ); ?>
				<a href="./categories.html" class="rightaligned">Browse all Yoast Blog Categories &raquo;</a>
			</section>

			<section class="row">
				<h2>Read our Latest Posts</h2>
				<?php get_template_part( 'html_includes/partials/more-articles' ); ?>
			</section>

			<section class="row">
				<h2>Recent Posts</h2>
				<?php get_template_part( 'html_includes/partials/recent-articles', array( 'class1' => 'theme-about', 'class2' => 'color-academy--tertiary' ) ); ?>
			</section>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/promo-links', array(
					'classset1' => 'fill fill--secondary helper-border-academy--secondary',
					'classset2' => 'theme-academy--secondary',
					'classset3' => 'theme-academy--secondary',
					'classset1a' => 'color--white',
					'classset1b' => 'color-academy--secondary',
					'classset1c' => 'color-academy--secondary',
				) ); ?>
			</div>

			<div class="banner banner--academy"></div>

			<hr>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/list-series' ); ?>
			</div>

			<hr>

			<div class="row iceberg">
				<?php get_template_part( 'html_includes/partials/list-categories' ); ?>
			</div>

			<hr>

			<div class="row iceberg">
				<?php get_template_part( 'html_includes/partials/more-readmore' ); ?>
			</div>

			<hr>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/promoblock-buy' ); ?>
			</div>

			<hr>

			<?php get_template_part( 'html_includes/partials/plugin-stats' ); ?>

			<hr>

			<div class="row iceberg">
				<?php get_template_part( 'html_includes/partials/list-usp' ); ?>
			</div>

			<hr>

			<?php get_template_part( 'html_includes/partials/plugin-information' ); ?>

			<hr>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/article-intro' ); ?>
			</div>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/ebook' ); ?>
			</div>

			<hr>

			<div class="row">
				<?php get_template_part( 'html_includes/partials/ebook-bundle' ); ?>
			</div>

			<section class="row">
				<h1>SEO Website Review</h1>
				<?php get_template_part( 'html_includes/partials/review-packages' ); ?>
			</section>

			<?php get_template_part( 'html_includes/partials/banner-announcement' ); ?>

			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-software announcement--pointer", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>

			<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => "theme-academy", ) ); ?>
			<style>
				.example .grid {
					background: silver;
				}

				.example .grid > div{
					background: white;
					outline: 1px solid #8F8F90;
				}
				</style>

			<div class="rowholder">	<!-- We add the rowholder to give the row a white background, because it scrolls over the background and accountment blocks -->
				<div class="row island example">
					<h2>Grid II (3 columns)</h2>
					<div class="grid">
						<div class="one-third">one-third</div>
						<div class="one-third">one-third</div>
						<div class="one-third">one-third</div>
					</div>

					<div class="grid">
						<div class="one-third">one-third</div>
						<div class="two-thirds">two-thirds</div>
					</div>

					<div class="grid">
						<div class="two-thirds">two-thirds</div>
					</div>

					<div class="grid">
						<div class="two-thirds offset-one-third">two-thirds offset-one-third</div>
					</div>

					<div class="grid">
						<div class="one-third offset-two-thirds">one-third offset-two-thirds</div>
					</div>

					<h2>Grid III (7 columns)</h2>
					<div class="grid">
						<div class="three-seventh">three-seventh</div>
						<div class="two-seventh">two-seventh</div>
						<div class="two-seventh">two-seventh</div>
					</div>

					<div class="grid">
						<div class="three-seventh offset-one-seventh">three-seventh offset-one-seventh</div>
						<div class="three-seventh">three-seventh</div>
					</div>

					<div class="grid">
						<div class="four-seventh offset-two-seventh">two-seventh offset-one-seventh</div>
						<div class="one-seventh">one-seventh</div>
					</div>

					<div class="grid">
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
						<div class="one-seventh">one-seventh</div>
					</div>

					<h2>Grid VI (4 columns)</h2>
					<div class="grid">
						<div class="one-fourth">one-fourth</div>
						<div class="three-fourth">three-fourth</div>
					</div>

					<div class="grid">
						<div class="one-fourth">one-fourth</div>
						<div class="one-fourth">one-fourth</div>
						<div class="one-fourth">one-fourth</div>
						<div class="one-fourth">one-fourth</div>
					</div>

					<div class="grid">
						<div class="two-fourth">two-fourth</div>
						<div class="two-fourth">two-fourth</div>
					</div>

					<div class="grid">
						<div class="offset-one-fourth three-fourth">offset-one-fourth three-fourth</div>
					</div>

					<div class="grid">
						<div class="offset-two-fourth two-fourth">offset-two-fourth two-fourth</div>
					</div>

					<div class="grid">
						<div class="offset-three-fourth one-fourth">offset-three-fourth one-fourth</div>
					</div>

				</div>
			</div>
		</article>

        <div class="entry-comments" id="comments">
			<div class="row" >
				<h3>23 Responses</h3>
			</div>

		</div>

		<div class="rowholder">
			<?php get_template_part( 'html_includes/fullfooter' ); ?>
		</div>

	</main>

</div>

<?php get_footer(); ?>
