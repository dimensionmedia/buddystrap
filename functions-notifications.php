<?php
/*
 * functions-notifications.php
 *
 * Specific modifications to update BuddyPress notification settings HTML, etc.
 *
 *
 */
 
 

/**
 * Function to replace notification settings table with similar HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_bp_activity_screen_notification_settings() {

	if ( !$mention = bp_get_user_meta( bp_displayed_user_id(), 'notification_activity_new_mention', true ) )
		$mention = 'yes';

	if ( !$reply = bp_get_user_meta( bp_displayed_user_id(), 'notification_activity_new_reply', true ) )
		$reply = 'yes'; ?>

	<table class="table table-striped table-hover notification-settings" id="activity-notification-settings">
		<thead>
			<tr>
				<th class="icon">&nbsp;</th>
				<th class="title"><?php _e( 'Activity', 'buddypress' ) ?></th>
				<th class="yes"><?php _e( 'Yes', 'buddypress' ) ?></th>
				<th class="no"><?php _e( 'No', 'buddypress' )?></th>
			</tr>
		</thead>

		<tbody>
			<tr id="activity-notification-settings-mentions">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php printf( __( 'A member mentions you in an update using "@%s"', 'buddypress' ), bp_core_get_username( bp_displayed_user_id() ) ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_activity_new_mention]" value="yes" <?php checked( $mention, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_activity_new_mention]" value="no" <?php checked( $mention, 'no', true ) ?>/></td>
			</tr>
			<tr id="activity-notification-settings-replies">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( "A member replies to an update or comment you've posted", 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_activity_new_reply]" value="yes" <?php checked( $reply, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_activity_new_reply]" value="no" <?php checked( $reply, 'no', true ) ?>/></td>
			</tr>

			<?php do_action( 'bp_activity_screen_notification_settings' ) ?>
		</tbody>
	</table>

<?php
}
remove_action( 'bp_notification_settings', 'bp_activity_screen_notification_settings', 1 );
add_action( 'bp_notification_settings', 'bs_bp_activity_screen_notification_settings', 1 );

/**
 * Function to replace notification settings table with similar HTML with Twitter Bootstrap
 *
 * @return text HTML content 
 **/
function bs_friends_screen_notification_settings() {

	if ( !$send_requests = bp_get_user_meta( bp_displayed_user_id(), 'notification_friends_friendship_request', true ) )
		$send_requests   = 'yes';

	if ( !$accept_requests = bp_get_user_meta( bp_displayed_user_id(), 'notification_friends_friendship_accepted', true ) )
		$accept_requests = 'yes'; ?>

	<table class="table table-striped table-hover notification-settings" id="friends-notification-settings">
		<thead>
			<tr>
				<th class="icon"></th>
				<th class="title"><?php _e( 'Friends', 'buddypress' ) ?></th>
				<th class="yes"><?php _e( 'Yes', 'buddypress' ) ?></th>
				<th class="no"><?php _e( 'No', 'buddypress' )?></th>
			</tr>
		</thead>

		<tbody>
			<tr id="friends-notification-settings-request">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A member sends you a friendship request', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_friends_friendship_request]" value="yes" <?php checked( $send_requests, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_friends_friendship_request]" value="no" <?php checked( $send_requests, 'no', true ) ?>/></td>
			</tr>
			<tr id="friends-notification-settings-accepted">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A member accepts your friendship request', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_friends_friendship_accepted]" value="yes" <?php checked( $accept_requests, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_friends_friendship_accepted]" value="no" <?php checked( $accept_requests, 'no', true ) ?>/></td>
			</tr>

			<?php do_action( 'friends_screen_notification_settings' ); ?>

		</tbody>
	</table>

<?php
}
remove_action( 'bp_notification_settings', 'friends_screen_notification_settings' );
add_action( 'bp_notification_settings', 'bs_friends_screen_notification_settings' );


function bs_messages_screen_notification_settings() {
	if ( bp_action_variables() ) {
		bp_do_404();
		return;
	}

	if ( !$new_messages = bp_get_user_meta( bp_displayed_user_id(), 'notification_messages_new_message', true ) )
		$new_messages = 'yes';

	if ( !$new_notices = bp_get_user_meta( bp_displayed_user_id(), 'notification_messages_new_notice', true ) )
		$new_notices  = 'yes'; ?>

	<table class="table table-striped table-hover notification-settings" id="messages-notification-settings">
		<thead>
			<tr>
				<th class="icon"></th>
				<th class="title"><?php _e( 'Messages', 'buddypress' ) ?></th>
				<th class="yes"><?php _e( 'Yes', 'buddypress' ) ?></th>
				<th class="no"><?php _e( 'No', 'buddypress' )?></th>
			</tr>
		</thead>

		<tbody>
			<tr id="messages-notification-settings-new-message">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A member sends you a new message', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_messages_new_message]" value="yes" <?php checked( $new_messages, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_messages_new_message]" value="no" <?php checked( $new_messages, 'no', true ) ?>/></td>
			</tr>
			<tr id="messages-notification-settings-new-site-notice">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A new site notice is posted', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_messages_new_notice]" value="yes" <?php checked( $new_notices, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_messages_new_notice]" value="no" <?php checked( $new_notices, 'no', true ) ?>/></td>
			</tr>

			<?php do_action( 'messages_screen_notification_settings' ) ?>
		</tbody>
	</table>

<?php
}
remove_action( 'bp_notification_settings', 'messages_screen_notification_settings', 2 );
add_action( 'bp_notification_settings', 'bs_messages_screen_notification_settings' );




function bs_groups_screen_notification_settings() {

	if ( !$group_invite = bp_get_user_meta( bp_displayed_user_id(), 'notification_groups_invite', true ) )
		$group_invite  = 'yes';

	if ( !$group_update = bp_get_user_meta( bp_displayed_user_id(), 'notification_groups_group_updated', true ) )
		$group_update  = 'yes';

	if ( !$group_promo = bp_get_user_meta( bp_displayed_user_id(), 'notification_groups_admin_promotion', true ) )
		$group_promo   = 'yes';

	if ( !$group_request = bp_get_user_meta( bp_displayed_user_id(), 'notification_groups_membership_request', true ) )
		$group_request = 'yes';
?>

	<table class="table table-striped table-hover notification-settings" id="groups-notification-settings">
		<thead>
			<tr>
				<th class="icon"></th>
				<th class="title"><?php _e( 'Groups', 'buddypress' ) ?></th>
				<th class="yes"><?php _e( 'Yes', 'buddypress' ) ?></th>
				<th class="no"><?php _e( 'No', 'buddypress' )?></th>
			</tr>
		</thead>

		<tbody>
			<tr id="groups-notification-settings-invitation">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A member invites you to join a group', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_groups_invite]" value="yes" <?php checked( $group_invite, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_groups_invite]" value="no" <?php checked( $group_invite, 'no', true ) ?>/></td>
			</tr>
			<tr id="groups-notification-settings-info-updated">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'Group information is updated', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_groups_group_updated]" value="yes" <?php checked( $group_update, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_groups_group_updated]" value="no" <?php checked( $group_update, 'no', true ) ?>/></td>
			</tr>
			<tr id="groups-notification-settings-promoted">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'You are promoted to a group administrator or moderator', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_groups_admin_promotion]" value="yes" <?php checked( $group_promo, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_groups_admin_promotion]" value="no" <?php checked( $group_promo, 'no', true ) ?>/></td>
			</tr>
			<tr id="groups-notification-settings-request">
				<td class="icon">&nbsp;</td>
				<td class="description"><?php _e( 'A member requests to join a private group for which you are an admin', 'buddypress' ) ?></td>
				<td class="yes"><input type="radio" name="notifications[notification_groups_membership_request]" value="yes" <?php checked( $group_request, 'yes', true ) ?>/></td>
				<td class="no"><input type="radio" name="notifications[notification_groups_membership_request]" value="no" <?php checked( $group_request, 'no', true ) ?>/></td>
			</tr>

			<?php do_action( 'groups_screen_notification_settings' ); ?>

		</tbody>
	</table>

<?php
}

remove_action( 'bp_notification_settings', 'groups_screen_notification_settings' );
add_action( 'bp_notification_settings', 'bs_groups_screen_notification_settings' );


?>