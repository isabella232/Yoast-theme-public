<?php
namespace Yoast\YoastCom\Theme;

$comments_number = get_comments_number();

printf( _n( '%d Comment', '%d Comments', $comments_number ), $comments_number );
