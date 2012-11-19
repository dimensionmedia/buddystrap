<?php get_header(); ?>

	<div id="content" class="span12">

			<?php do_action( 'bp_before_404' ); ?>
			<div id="post-0" class="post page-404 error404 not-found" role="main">
				<h2 class="posttitle"><?php _e( "Page not found", 'buddypress' ); ?></h2>

				<div class="alert"><p><?php _e( "We're sorry, but we can't find the page that you're looking for. Perhaps searching will help.", 'buddypress' ); ?></p></div>
				<?php get_search_form(); ?>

				<?php do_action( 'bp_404' ); ?>
			</div>

			<?php do_action( 'bp_after_404' ); ?>

	</div><!-- #content -->

<?php get_footer(); ?>