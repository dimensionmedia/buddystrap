<?php
/*
 * functions-groups.php
 *
 * Specific modifications to update BuddyPress group navigation, functions, etc.
 *
 *
 */
 
 
 

/**
 * Function to replace group admin tabs with same HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_group_admin_tabs( $group = false ) {
	global $bp, $groups_template;

	if ( empty( $group ) )
		$group = ( $groups_template->group ) ? $groups_template->group : $bp->groups->current_group;

	$current_tab = bp_get_group_current_admin_tab();

	if ( bp_is_item_admin() || bp_is_item_mod() ) : ?>

		<li<?php if ( 'edit-details' == $current_tab || empty( $current_tab ) ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/edit-details' ) ?>"><?php _e( 'Details', 'buddypress' ); ?></a></li>

	<?php endif; ?>

	<?php if ( ! bp_is_item_admin() )
			return false; ?>

	<li<?php if ( 'group-settings' == $current_tab ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/group-settings' ) ?>"><?php _e( 'Settings', 'buddypress' ); ?></a></li>

	<?php if ( !(int)bp_get_option( 'bp-disable-avatar-uploads' ) ) : ?>

		<li<?php if ( 'group-avatar'   == $current_tab ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/group-avatar' ) ?>"><?php _e( 'Avatar', 'buddypress' ); ?></a></li>

	<?php endif; ?>

	<li<?php if ( 'manage-members' == $current_tab ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/manage-members' ) ?>"><?php _e( 'Members', 'buddypress' ); ?></a></li>

	<?php if ( $groups_template->group->status == 'private' ) : ?>

		<li<?php if ( 'membership-requests' == $current_tab ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/membership-requests' ) ?>"><?php _e( 'Requests', 'buddypress' ); ?></a></li>

	<?php endif; ?>

	<?php do_action( 'groups_admin_tabs', $current_tab, $group->slug ) ?>

	<li<?php if ( 'delete-group' == $current_tab ) : ?> class="active"<?php endif; ?>><a href="<?php echo trailingslashit( bp_get_group_permalink( $group ) . 'admin/delete-group' ) ?>"><?php _e( 'Delete', 'buddypress' ); ?></a></li>

<?php
}

/**
 * Function to replace group list admin HTML with same HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_group_list_admins( $group = false ) {
	global $groups_template;

	if ( empty( $group ) )
		$group =& $groups_template->group;

	if ( !empty( $group->admins ) ) { ?>
		<ul id="group-admins" class="unstyled">
			<?php foreach( (array) $group->admins as $admin ) { ?>
				<li>
					<a href="<?php echo bp_core_get_user_domain( $admin->user_id, $admin->user_nicename, $admin->user_login ) ?>"><?php echo bp_core_fetch_avatar( array( 'width' => '30', 'height' => '30', 'item_id' => $admin->user_id, 'email' => $admin->user_email, 'class' => 'img-polaroid', 'alt' => sprintf( __( 'Profile picture of %s', 'buddypress' ), bp_core_get_user_displayname( $admin->user_id ) ) ) ) ?></a>
				</li>
			<?php } ?>
		</ul>
	<?php } else { ?>
		<span class="activity"><?php _e( 'No Admins', 'buddypress' ) ?></span>
	<?php } ?>
<?php
}

/**
 * Function to replace creation tabs with tabs that has Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_group_creation_tabs() {
	global $bp;

	if ( !is_array( $bp->groups->group_creation_steps ) )
		return false;

	if ( !bp_get_groups_current_create_step() )
		$bp->groups->current_create_step = array_shift( array_keys( $bp->groups->group_creation_steps ) );

	$counter = 1;

	foreach ( (array) $bp->groups->group_creation_steps as $slug => $step ) {
		$is_enabled = bp_are_previous_group_creation_steps_complete( $slug ); ?>
		
		<?php 
			
			// To-do : find a better way to insert these icons		
		
			if ($slug == "group-details") { $icon = "icon-tasks"; }
			if ($slug == "group-settings") { $icon = "icon-cog"; }
			if ($slug == "group-avatar") { $icon = "icon-user"; }
			if ($slug == "group-invites") { $icon = "icon-envelope"; }
					
		?>

		<li<?php if ( bp_get_groups_current_create_step() == $slug ) : ?> class="active"<?php endif; ?>><?php if ( $is_enabled ) : ?><a href="<?php echo bp_get_root_domain() . '/' . bp_get_groups_root_slug() ?>/create/step/<?php echo $slug ?>/"><?php if ( $icon ) echo '<i class="'.$icon.'"></i> '; ?><?php else: ?><a href="#"><?php if ( $icon ) echo '<i class="'.$icon.'"></i> '; ?><span><?php endif; ?> <?php echo $step['name'] ?><?php if ( $is_enabled ) : ?></a><?php else: ?></a></span><?php endif ?></li><?php
		$counter++;
	}

	unset( $is_enabled );

	do_action( 'groups_creation_tabs' );
}


/**
 * Function to replace group search form with a form that has Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_directory_groups_search_form() {

	$default_search_value = bp_get_search_default_text( 'groups' );
	$search_value         = !empty( $_REQUEST['s'] ) ? stripslashes( $_REQUEST['s'] ) : $default_search_value; ?>

	<form action="" method="get" id="search-groups-form">
		<label><input type="text" class="search-query" name="s" id="groups_search" placeholder="<?php echo esc_attr( $search_value ) ?>" /></label>
		<input type="submit" class="btn btn-success btn-small" id="groups_search_submit" name="groups_search_submit" value="<?php _e( 'Search', 'buddypress' ) ?>" />
	</form>
	
	<div class="clear"></div>

<?php
}


// ok, maybe i'm having a bad day but i needed this to return and not echo and there doesn't seem to be a way to do this in the orginial BP function bp_profile_group_tabs()

function bs_bp_get_profile_group_tabs() {
	global $bp, $group_name;

	$html = '';

	if ( !$groups = wp_cache_get( 'xprofile_groups_inc_empty', 'bp' ) ) {
		$groups = BP_XProfile_Group::get( array( 'fetch_fields' => true ) );
		wp_cache_set( 'xprofile_groups_inc_empty', $groups, 'bp' );
	}

	if ( empty( $group_name ) )
		$group_name = bp_profile_group_name(false);

	$tabs = array();
	for ( $i = 0, $count = count( $groups ); $i < $count; ++$i ) {
		if ( $group_name == $groups[$i]->name )
			$selected = ' class="current"';
		else
			$selected = '';

		if ( !empty( $groups[$i]->fields ) ) {
			$link = trailingslashit( bp_displayed_user_domain() . $bp->profile->slug . '/edit/group/' . $groups[$i]->id );
			$tabs[] = sprintf( '<li %1$s><a href="%2$s">%3$s</a></li>', $selected, $link, esc_html( $groups[$i]->name ) );
		}
	}

	$tabs = apply_filters( 'xprofile_filter_profile_group_tabs', $tabs, $groups, $group_name );
	foreach ( (array) $tabs as $tab )
		$html .= $tab;

	do_action( 'xprofile_profile_group_tabs' );
	
	return $html;
}

?>