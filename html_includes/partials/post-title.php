<?php

if ( has_post_thumbnail() ) {
	$thumbnail = get_the_post_thumbnail();

	?>
	<div class="post-header">
		<div class="post-header__image"><?php echo $thumbnail ?></div>
		<div class="post-header__title">
			<div class="post-header__title__container">
				<h1><?php the_title(); ?><br><span class="post-header__title--second-line">10 tips for an awesome</span></h1>

			</div>
		</div>
	</div>
	<div class="content__after-post-header"></div>
	<div class="meta__after-post_header"></div>
	<?php
}
else {
?>
<h1><?php the_title(); ?></h1>

<?php
}