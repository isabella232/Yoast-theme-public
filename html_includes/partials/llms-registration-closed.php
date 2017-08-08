<?php

namespace Yoast\YoastCom\Theme;

$academy_overview = apply_filters( 'yoast:url', 'academy_overview');

?>
<div class="col-2 llms-new-person-form-wrapper">
	<h2 class="llms-title llms-h2"><?php _e( 'Add a new course', 'lifterlms' ); ?></h2>

	<?php
	_e( '<p>Yoast Academy is only available once you have bought a course. Please visit our 
	<a href="' . $academy_overview . 'courses/">Courses page</a> to see the available options. We have multiple in-depth courses, 
	ranging from copywriting to site structure and technical SEO. Enhance your SEO skills with a Yoast course!</p>
	<p><a href="' . $academy_overview . 'courses/">Check out all Yoast courses</a>.</p>' );
	?>
</div>
