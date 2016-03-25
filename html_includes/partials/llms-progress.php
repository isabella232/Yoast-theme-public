<?php

namespace Yoast\YoastCom\Theme;

/* @var \LLMS_Course $course */
$course = \Yoast\YoastCom\Academy\get_course();
$course_progress = $course->get_percent_complete();

_e( 'Course Progress' );

lifterlms_course_progress_bar( $course_progress, false, false );
