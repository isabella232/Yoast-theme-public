<script src="//static.tapfiliate.com/tapfiliate.js" type="text/javascript" async></script>
<script type="text/javascript">
	window['TapfiliateObject'] = i = 'tap';
	window[i] = window[i] || function() {
			(
				window[i].q = window[i].q || []
			).push( arguments );
		};

	tap( 'create', '<?php echo $template_args['account_id'] ?>' );
	tap( 'conversion', '<?php echo $template_args['order_id'] ?>', {program_group: '<?php echo $template_args['group'] ?>'}, <?php echo json_encode( $template_args['commissions'] ) ?> );
</script>