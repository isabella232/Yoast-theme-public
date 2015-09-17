<?php
/**
 * Template Name: Styleguide
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<h1>Yoast Styleguide</h1>

<p>
	Much of the styling is inherit from the parent theme. A class on the body (theme-academy, theme-software, theme-review, theme-about) will automatically apply many of the theme-specific styles.
</p>
<p>
	These general styles can be overwritten by adding a theme-class or modifiers to the element itself.
</p>

<hr>

<section id="basic">
	<h2>Headings</h2>
	<p>
		Headings inherit their styling from the parent theme. The styling is done on the tags (h1, h2, etc.) as well as on classes (.h1, .h2, etc.)
	</p>

	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/headings' ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/headings' ); ?></textarea>
		</div>
	</div>


</section>

<hr>

<section id="announcement">
	<h2>Announcements</h2>
	<p>
		Announcements are full-width colored blocks. They automatically inherit their styling from the theme they're in, but you can style them in different ways by applying theme classes or adding modifiers.
	</p>


	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;", ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;", ) ); ?></textarea>
		</div>
	</div>

	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-software", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-software", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?></textarea>
		</div>
	</div>

	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-review", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-review", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?></textarea>
		</div>
	</div>

	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-about", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "theme-about", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?></textarea>
		</div>
	</div>


	<p>Adding .announcement--pointer as a modifier adds a pointer to the bottom of the announcement</p>
	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "announcement--pointer", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "announcement--pointer", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?></textarea>
		</div>
	</div>

	<p>Adding .announcement--pointer-top as a modifier adds a pointer at the top of the announcement</p>

	<div class="grid">
		<div class="two-fourth">
			<?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "announcement--pointer-top", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?>
		</div>

		<div class="two-fourth">
			<textarea><?php get_template_part( 'html_includes/partials/announcement', array( 'class' => "announcement--pointer-top", 'text' => "Yoast is all about improving the web. We make websites work!  You can learn how to optimize your website yourself in our Academy &raquo;" ) ); ?></textarea>
		</div>
	</div>

</section>

<?php get_footer(); ?>
