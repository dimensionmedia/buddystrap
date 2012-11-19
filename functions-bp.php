<?php
/*
 * functions-bp.php
 *
 * This is most of where the filters and general functions reside for adding Twitter Bootstrap classes, etc.
 * More specific modifications are found in other functions files (function-groups.php, etc.)
 *
 *
 */




add_filter('bp_get_displayed_user_nav_activity', 'bs_bp_get_displayed_user_nav_activity',10,8);
add_filter('bp_get_displayed_user_nav_xprofile', 'bs_bp_get_displayed_user_nav_activity',10,8);
add_filter('bp_get_displayed_user_nav_messages', 'bs_bp_get_displayed_user_nav_activity',10,8);
add_filter('bp_get_displayed_user_nav_friends', 'bs_bp_get_displayed_user_nav_activity',10,8);
add_filter('bp_get_displayed_user_nav_groups', 'bs_bp_get_displayed_user_nav_activity',10,8);
add_filter('bp_get_displayed_user_nav_settings', 'bs_bp_get_displayed_user_nav_activity',10,8);
/**
 * Filter to replace member menu tab HTML w/ Twitter Bootstrap HTML
 *
 * @return text HTML content 
 **/
function bs_bp_get_displayed_user_nav_activity($val) {

	$val = str_replace('current','active',$val);
	$val = str_replace('<span>','<span class="badge">',$val);	
	return $val;

}


add_filter('bp_get_member_avatar', 'bs_bp_get_member_avatar',10,8);
add_filter('bp_get_displayed_user_avatar', 'bs_bp_get_member_avatar',10,8);
/**
 * Filter to replace button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_member_avatar($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;

}


add_filter('get_search_form', 'bs_get_search_form', 1);

/**
 * Filter to add Twitter Bootstrap to add btn-success to submit button on search form... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_get_search_form($form) {

//	print_r ($form); exit;

	$form = str_replace('type="submit"','type="submit" class="btn btn-success"',$form);
	return $val;

}



add_filter('bp_get_button', 'bs_bp_get_button',10,8);
/**
 * Filter to replace button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_button($val) {

	$val = str_replace('class="edit','class="btn btn-mini btn-danger',$val);
	return $val;

}



add_filter('bp_get_group_member_avatar_thumb', 'bs_bp_get_group_member_avatar_thumb',10,8);

/**
 * Filter to replace button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_group_member_avatar_thumb($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;
	
}

add_filter('bp_get_group_avatar', 'bs_bp_get_group_avatar',10,8);

/**
 * Filter to add Twitter Bootstrap img-polaroid to get_avatar function... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_bp_get_group_avatar($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;

}

add_filter('bp_activity_recurse_comments_start_ul', 'bs_bp_activity_recurse_comments_start_ul',10,8);

/**
 * Filter to add Twitter Bootstrap img-polaroid to get_avatar function... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_bp_activity_recurse_comments_start_ul($val) {

	$val = str_replace('<ul>','<ul class="unstyled">',$val);
	return $val;

}

add_filter('bp_get_activity_avatar', 'bs_bp_get_activity_avatar',10,8);

/**
 * Filter to add Twitter Bootstrap img-polaroid to get_avatar function... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_bp_get_activity_avatar($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;

}

add_filter('bp_get_loggedin_user_avatar', 'bs_bp_get_loggedin_user_avatar',10,8);

/**
 * Filter to add Twitter Bootstrap img-polaroid to get_avatar function... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_bp_get_loggedin_user_avatar($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;

}


add_filter('get_avatar', 'bs_get_avatar',10,8);

/**
 * Filter to add Twitter Bootstrap img-polaroid to get_avatar function... not a BuddyPress function, but still used potentially
 *
 * @return text HTML content 
 **/
function bs_get_avatar($val) {

	$val = str_replace('class="','class="img-polaroid ',$val);
	return $val;

}


add_filter('bp_get_activity_delete_link', 'bs_bp_get_activity_delete_link',10,3);

/**
 * Filter to replace button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_activity_delete_link($val) {

	$val = str_replace('class="button','class="btn btn-mini btn-danger',$val);
	return $val;

}

add_filter('bp_get_add_friend_button', 'bs_bp_get_add_friend_button',10,3);

/**
 * Filter to replace friend button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_add_friend_button($val) {

//	print_r ($val);

	if ($val['id'] == "pending" && $val['component'] == "friends") {
		$val['link_class'] = str_replace('friendship-button','friendship-button btn btn-danger',$val['link_class']);
		$val['link_text'] = '<i class="icon-thumbs-down"></i>&nbsp;&nbsp;' . $val['link_text'];
	} else {
		$val['link_class'] = str_replace('friendship-button','friendship-button btn btn-success',$val['link_class']);
		$val['link_text'] = '<i class="icon-plus"></i>&nbsp;&nbsp;' . $val['link_text'];	
	}
	
	return $val;

}


add_filter('bp_get_send_public_message_button', 'bs_bp_get_send_public_message_button',10,3);

/**
 * Filter to replace friend button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_send_public_message_button($val) {

	$val['link_class'] = str_replace('button','button btn btn-info',$val['link_class']);
	$val['link_text'] = '<i class="icon-bullhorn"></i>&nbsp;&nbsp;' . $val['link_text'];
	return $val;

}

add_filter('bp_get_send_message_button', 'bs_bp_get_send_private_message_button',10,3);

/**
 * Filter to replace friend button classes to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_send_private_message_button($val) {

	$val = str_replace('send-message','send-message btn btn-info',$val);
	$val = str_replace('Private Message','<i class="icon-envelope"></i>&nbsp;&nbsp; Private Message',$val);
	return $val;

}


/**
 * Function to replace active css to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_displayed_user_nav() {
	global $bp;

	foreach ( (array) $bp->bp_nav as $user_nav_item ) {
		if ( empty( $user_nav_item['show_for_displayed_user'] ) && !bp_is_my_profile() )
			continue;

		$selected = '';
		if ( bp_is_current_component( $user_nav_item['slug'] ) ) {
			$selected = ' class="active"';
		}

		if ( bp_loggedin_user_domain() ) {
			$link = str_replace( bp_loggedin_user_domain(), bp_displayed_user_domain(), $user_nav_item['link'] );
		} else {
			$link = trailingslashit( bp_displayed_user_domain() . $user_nav_item['link'] );
		}
		
		$user_nav_item['name'] = str_replace('<span>','<span class="badge badge-inverse attendee-count">',$user_nav_item['name']);

		echo apply_filters_ref_array( 'bp_get_displayed_user_nav_' . $user_nav_item['css_id'], array( '<li id="' . $user_nav_item['css_id'] . '-personal-li" ' . $selected . '><a id="user-' . $user_nav_item['css_id'] . '" href="' . $link . '">' . $user_nav_item['name'] . '</a></li>', &$user_nav_item ) );
	}
}


/**
 * Function to replace active css to confirm w/ Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_get_options_nav() {
	global $bp;

	// If we are looking at a member profile, then the we can use the current component as an
	// index. Otherwise we need to use the component's root_slug
	$component_index = !empty( $bp->displayed_user ) ? bp_current_component() : bp_get_root_slug( bp_current_component() );
	

	if ( !bp_is_single_item() ) {
		if ( !isset( $bp->bp_options_nav[$component_index] ) || count( $bp->bp_options_nav[$component_index] ) < 1 ) {
			return false;
		} else {
			$the_index = $component_index;
		}
	} else {
		if ( !isset( $bp->bp_options_nav[bp_current_item()] ) || count( $bp->bp_options_nav[bp_current_item()] ) < 1 ) {
			return false;
		} else {
			$the_index = bp_current_item();
		}
	}

	// Loop through each navigation item
	foreach ( (array) $bp->bp_options_nav[$the_index] as $subnav_item ) {
	
		//print_r ($subnav_item); 
	
		if ( !$subnav_item['user_has_access'] )
			continue;

		// If the current action or an action variable matches the nav item id, then add a highlight CSS class.
		if ( $subnav_item['slug'] == bp_current_action() ) {
			$selected = ' class="active"';
		} else {
			$selected = '';
		}

		// List type depends on our current component
		$list_type = bp_is_group() ? 'groups' : 'personal';

		// echo out the final list item
		
		// if this is a profile edit, give the dropdown else don't
		
		if ($component_index == "profile" && $subnav_item['slug'] == "edit") {
		
					echo apply_filters( 'bp_get_options_nav_' . $subnav_item['css_id'], '<li class="dropdown" id="' . $subnav_item['css_id'] . '-' . $list_type . '-li" ' . $selected . '><a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $subnav_item['name'] . ' <b class="caret"></b></a>
	                <ul class="dropdown-menu">'.bs_bp_get_profile_group_tabs().'
	                </ul></li>', $subnav_item );
			
			

                
			
			} else {
			
				$subnav_item['name'] = str_replace('<span>', '<span class="badge">', $subnav_item['name']);
			
				echo apply_filters( 'bp_get_options_nav_' . $subnav_item['css_id'], '<li id="' . $subnav_item['css_id'] . '-' . $list_type . '-li" ' . $selected . '><a id="' . $subnav_item['css_id'] . '" href="' . $subnav_item['link'] . '">' . $subnav_item['name'] . '</a></li>', $subnav_item );
			
			
		}
		
		

	}
}

?>