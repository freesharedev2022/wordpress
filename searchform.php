<?php
$twentytwentyone_unique_id = wp_unique_id( 'search-form-' );
$twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
$s=get_search_query();
?>
<form role="search" <?php echo $twentytwentyone_aria_label; ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>"><?php _e( 'Search&hellip;', 'twentytwentyone' ); ?></label>
	<input type="search" class="search-field" value="<?= $s ?>" name="s" />
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'twentytwentyone' ); ?>" />
</form>
