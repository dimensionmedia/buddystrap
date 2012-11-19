<?php
/*
 * functions-members.php
 *
 * Specific modifications to update BuddyPress member search forms, etc.
 *
 *
 */
 
 
 

/**
 * Function to replace members search form with same HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_directory_members_search_form() {

	$default_search_value = bp_get_search_default_text( 'members' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value; ?>



	<form action="" method="get" id="search-members-form" class="form-search">
		<div class="input-append">
			<input type="text" class="span2 search-query" name="s" id="members_search" placeholder="<?php echo esc_attr( $search_value ) ?>">
			<button type="submit" class="btn btn-success" id="members_search_submit" name="members_search_submit"><?php _e( 'Search', 'buddypress' ) ?></button>
		</div>
	</form>

<?php
}

?>