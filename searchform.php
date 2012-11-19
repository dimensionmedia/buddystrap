<?php do_action( 'bp_before_blog_search_form' ); ?>

<form role="search" method="get" id="searchform" class="form-inline" action="<?php echo home_url(); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="submit" class="btn btn-success" id="searchsubmit" value="<?php _e( 'Search', 'buddypress' ); ?>" />

	<?php do_action( 'bp_blog_search_form' ); ?>
</form>

<?php do_action( 'bp_after_blog_search_form' ); ?>
