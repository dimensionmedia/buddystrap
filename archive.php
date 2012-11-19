<?php get_header(); ?>

	<div id="content" class="span8">

		<?php do_action( 'bp_before_archive' ); ?>

		<div class="page" id="blog-archives" role="main">

			<h3 class="pagetitle"><?php printf( __( 'You are browsing the archive for %1$s.', 'buddypress' ), wp_title( false, false ) ); ?></h3>

			<?php if ( have_posts() ) : ?>

				<?php bp_dtheme_content_nav( 'nav-above' ); ?>

				<?php while (have_posts()) : the_post(); ?>

					<?php do_action( 'bp_before_blog_post' ); ?>

					<div class="row" id="post-<?php the_ID(); ?>">
					  <div class="span8">
					    <div class="row">
					      <div class="span8">
					        <h2 class="posttitle"><strong><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'buddypress' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></strong></h2>
					      </div>
					    </div>
					    <div class="row">
					      <div class="span2">
					        <a href="#" class="thumbnail">
					            <img src="http://placehold.it/260x180" alt="">
					        </a>
					      </div>
					      <div class="span6">      
					        <?php the_content( __( '<p><a class="btn" href="#">Read more</a></p>', 'buddypress' ) ); ?>   					        
					      </div>
					    </div>
					    <div class="row">
					      <div class="span8">
					        <p></p>
					        <p>
					          <i class="icon-user"></i> <?php printf( _x( 'by %s', 'by ', 'buddypress' ), bp_core_get_userlink( $post->post_author ) ); ?> 
					          | <i class="icon-calendar"></i> <?php printf( __( '%1$s <span>in %2$s</span>', 'buddypress' ), get_the_date(), get_the_category_list( ', ' ) ); ?>
					          | <i class="icon-comment"></i> <?php comments_popup_link( __( 'No Comments &#187;', 'buddypress' ), __( '1 Comment &#187;', 'buddypress' ), __( '% Comments &#187;', 'buddypress' ) ); ?>
     						  <?php if ( is_sticky() ) : ?>
     						  | <i class="icon-share activity sticky-post"></i> <?php _ex( 'Featured', 'Sticky post', 'buddypress' ); ?>
							  <?php endif; ?>
					          <?php the_tags( '| <i class="icon-tags"></i> <span class="tags">' . __( 'Tags: ', 'buddypress' ), ', ', '</span>' ); ?>
					        </p>
					      </div>
					    </div>
					  </div>
					</div>

					<hr/>

					<?php do_action( 'bp_after_blog_post' ); ?>

				<?php endwhile; ?>

				<?php bp_dtheme_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<h2 class="center"><?php _e( 'Not Found', 'buddypress' ); ?></h2>
				<?php get_search_form(); ?>

			<?php endif; ?>

		</div>

		<?php do_action( 'bp_after_archive' ); ?>


	</div><!-- #content -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
