<?php
/*
 * functions-messages.php
 *
 * Specific modifications to update BuddyPress message search forms, etc.
 *
 *
 */
 
 
 

/**
 * Function to replace private message search form with same HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/

function bs_bp_message_search_form() {

	$default_search_value = bp_get_search_default_text( 'messages' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value; ?>

	<form action="" method="get" id="search-message-form">
		<div class="input-append">
			<input type="text" class="span2 search-query" name="s" id="messages_search" <?php if ( $search_value === $default_search_value ) : ?>placeholder="<?php echo esc_html( $search_value ); ?>"<?php endif; ?> <?php if ( $search_value !== $default_search_value ) : ?>value="<?php echo esc_html( $search_value ); ?>"<?php endif; ?> />
			<input type="submit" class="btn btn-success"  id="messages_search_submit" name="messages_search_submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />
		</div>
	</form>
	

	


<?php
}

?>