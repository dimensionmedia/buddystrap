<?php do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

		<?php if ( bp_profile_group_has_fields() ) : ?>
		
			<?php if (bp_get_the_profile_group_slug() != "social") { ?>

			<?php do_action( 'bp_before_profile_field_content' ); ?>
			
			<div class="form-horizontal bp-widget <?php bp_the_profile_group_slug(); ?>">
					
				
					
				<fieldset>
				    <div id="legend">
				      <legend class=""><?php bp_the_profile_group_name(); ?></legend>
				    </div>

				

					<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

						<?php if ( bp_field_has_data() ) : ?>
						
					    <div class="control-group">

					      <label class="control-label"  for="username"><?php bp_the_profile_field_name(); ?></label>
					      
					      <div class="controls">
					        <?php bp_the_profile_field_value(); ?>
					        <!--<p class="help-block">Username can contain any letters or numbers, without spaces</p>-->
					      </div>
					      
					    </div>
						
						<?php endif; ?>

						<?php do_action( 'bp_profile_field_item' ); ?>

					<?php endwhile; ?>

				
				
				</fieldset>
				
				
				
			</div>

			<?php do_action( 'bp_after_profile_field_content' ); ?>
			
			<?php } ?>

		<?php endif; ?>

	<?php endwhile; ?>

	<?php do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ); ?>
