<!DOCTYPE html>
<html lang="en">

	<head profile="http://gmpg.org/xfn/11">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<?php if ( current_theme_supports( 'bp-default-responsive' ) ) : ?><meta name="viewport" content="width=device-width, initial-scale=1.0" /><?php endif; ?>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

		<?php do_action( 'bp_head' ); ?>
		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> id="bp-default">

		<?php do_action( 'bp_before_header' ); ?>
		
		<div class="container">
		
		<div class="row"> <!-- row header -->
		
			<div class="span12">

				<div id="header" class="navbar">
				  <div class="navbar-inner" id="navigation" role="navigation">
				  

				  	
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
				  
				    <a href="<?php echo home_url(); ?>" class="brand" title="<?php _ex( 'Home', 'Home page banner link title', 'buddypress' ); ?>"><?php bp_site_name(); ?></a>
					
					<div class="nav-collapse collapse">
					
						<?php wp_nav_menu( array( 'container' => false, 'menu_class' => 'nav', 'menu_id' => 'nav', 'theme_location' => 'primary', 'fallback_cb' => 'bp_dtheme_main_nav' ) ); ?>
						
						<?php if ( is_user_logged_in() ) { ?>
						
							<ul class="nav pull-right user-logged-in-dropdown">
			                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo bp_core_fetch_avatar ( array( 'item_id' => bp_loggedin_user_id(), 'class' => 'img-polaroid', 'type' => 'thumb', 'width' => '25', 'height' => '25' ) ); ?> Welcome, <?php echo bp_core_get_username( bp_loggedin_user_id() ); ?> <b class="caret"></b></a>
			                        <ul class="dropdown-menu">
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>"><i class="icon-user"></i> My Profile</a></li>
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>activity"><i class="icon-tasks"></i> Activity</a></li>
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>messages"><i class="icon-envelope"></i> Messages <span class="badge"><?php bp_total_unread_messages_count(); ?></span></a> </li>
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>friends"><i class="icon-heart"></i> Friends <span class="badge"><?php echo BP_Friends_Friendship::total_friend_count( bp_loggedin_user_id() ) ?></span></a> </li>
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>groups"><i class="icon-th"></i> Groups <span class="badge"><?php bp_total_group_count_for_user( bp_loggedin_user_id() ) ?></span></a> </li>
			                            <li><a href="<?php echo bp_core_get_user_domain ( bp_loggedin_user_id() ); ?>settings"><i class="icon-cog"></i> Settings</a></li>
			                            <li class="divider"></li>
			                            <li><a href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>"><i class="icon-off"></i> Logout</a></li>
			                        </ul>
			                    </li>
			                </ul>
			
			
						<?php } else { ?>
						
							<ul class="nav pull-right">
								<li><a href="/register">Sign Up</a></li>
			                  	<li class="divider-vertical"></li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
									<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
										<form method="post" action="<?php echo site_url( 'wp-login.php', 'login_post' ); ?>" method="post" accept-charset="UTF-8">
											<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="log">
											<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="pwd">
											<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
											<label class="string optional" for="user_remember_me"> Remember me</label>
											<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
											<label style="text-align:center;margin-top:5px">or</label>
			                                <input class="btn btn-primary btn-block disabled" type="button" id="sign-in-google" value="Sign In with Google">
											<input class="btn btn-primary btn-block disabled" type="button" id="sign-in-twitter" value="Sign In with Twitter">
											<input type="hidden" name="testcookie" value="1" />
										</form>
									</div>
								</li>
							</ul>
						
			
			              
			            </form>
			            <?php } ?>
			            
		            </div> <!-- collapse -->
		            

		            			
				  </div>
				</div>
			
			</div> 
			
		</div>

		<div class="row">			
			
			<div class="span12">
			
				<div id="search-bar" role="search" class="pull-right">
				
					<div class="padder">
	
							<form action="<?php echo bp_search_form_action(); ?>" method="post" id="search-form" class="form-search form-inline">
							
							  	<div class="input-append">
							
									<input type="text" class="input-medium search-query" id="search-terms" placeholder="Search" name="search-terms" value="<?php echo isset( $_REQUEST['s'] ) ? esc_attr( $_REQUEST['s'] ) : ''; ?>" /><button type="submit" class="btn"><?php _e( 'Search', 'buddypress' ); ?></button>
									
							  	</div>
	
								<div class="pull-left"><?php echo bp_search_form_type_select(); ?></div>
		
								<?php wp_nonce_field( 'bp_search_form' ); ?>
	
							</form><!-- #search-form -->
	
					<?php do_action( 'bp_search_login_bar' ); ?>
	
					</div><!-- .padder -->
				</div><!-- #search-bar -->
			
			</div> 

			<?php do_action( 'bp_header' ); ?>
	
			<?php do_action( 'bp_after_header'     ); ?>
			<?php do_action( 'bp_before_container' ); ?>
		
		</div>

		<div id="container" class="row">
