<?php

do_action( 'bp_before_group_header' );

?>

<div class="row">

<div class="span8">

	<div id="item-header-avatar" class="pull-left">
		<a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>">
	
			<?php bp_group_avatar('width=90&height=90'); ?>
	
		</a>
	</div><!-- #item-header-avatar -->
	
	<div id="item-header-wrapper" class="pull-left">
	
		<div id="item-header-content">
			<h2><a href="<?php bp_group_permalink(); ?>" title="<?php bp_group_name(); ?>"><?php bp_group_name(); ?></a></h2>
			<span class="highlight"><small><?php bp_group_type(); ?></span> <span class="activity"><i class="icon-time"></i> <?php printf( __( 'active %s', 'buddypress' ), bp_get_group_last_active() ); ?></small></span>
		
			<?php do_action( 'bp_before_group_header_meta' ); ?>
		
			<div id="item-meta">
		
				<div class="well well-small"><?php bp_group_description(); ?></div>
		
				<div id="item-buttons">
		
					<?php do_action( 'bp_group_header_actions' ); ?>
		
				</div><!-- #item-buttons -->
		
				<?php do_action( 'bp_group_header_meta' ); ?>
		
			</div>
		</div><!-- #item-header-content -->
		
		<div id="item-actions">
		
			<?php if ( bp_group_is_visible() ) : ?>
			
				<fieldset>
					
				<legend><?php _e( 'Group Admins', 'buddypress' ); ?></legend>
		
				<?php bs_bp_group_list_admins();
		
				do_action( 'bp_after_group_menu_admins' );
		
				if ( bp_group_has_moderators() ) :
					do_action( 'bp_before_group_menu_mods' ); ?>
		
					<h3><?php _e( 'Group Mods' , 'buddypress' ); ?></h3>
		
					<?php bp_group_list_mods();
		
					do_action( 'bp_after_group_menu_mods' );
		
				endif; ?>
				
				</fieldset> <?php 
		
			endif; ?>
		
		</div><!-- #item-actions -->
		
	</div> <!-- wrapper -->

</div>
	
</div> <!-- row -->	

<?php
do_action( 'bp_after_group_header' );
do_action( 'template_notices' );
?>