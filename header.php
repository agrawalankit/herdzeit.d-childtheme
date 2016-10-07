<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- Stylesheets -->
        
	<?php if(!is_singular('recipe')){ ?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php } ?>
	<?php
	if( function_exists( 'ot_get_option' ) ) {
		$site_favicon = esc_url( ot_get_option( 'favicon' ) );
		if(!empty($site_favicon)){
			echo '<link rel="shortcut icon" href="'.esc_url($site_favicon).'" />';
		}
	}

	if ( function_exists( 'ot_get_option' ) ) {
		$quick_css = stripslashes(ot_get_option('quick_css_box'));
		if(!empty($quick_css))
		{
			echo "<style type='text/css' id='quick-css'>\n\n";
			echo $quick_css . "\n\n";
			echo "</style>";
		}
	}

	wp_head();
	?>

</head>

<!--[if lt IE 7 ]> <body <?php body_class( 'ie6' ); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class( 'ie7' ); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class( 'ie8' ); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class( 'ie9' ); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class(); ?>> <!--<![endif]-->

    
   

    
<!-- ============= HEADER STARTS HERE ============== -->

<div class="container shadow" >
    <div class="row">
        <div class="col-md-12">
            <div id="header-wrapper" class="clearfix">
                <div id="header" class="clearfix">
		<!-- WEBSITE LOGO -->
		<?php 
                
                //logo
                if ( function_exists( 'ot_get_option' ) ) {
                    $sitelogo = esc_url( ot_get_option( 'header_logo_image') );
                }
		$sitename = get_bloginfo('name');
		if (!empty($sitelogo)) {  
                    echo '<a class="responsive_logo" href="' . home_url() . '"><img src="' . esc_url($sitelogo) . '" alt="herdzeit logo" class="logo" /></a>';
                }else{
                    echo '<h1>' . bloginfo('name') . '</h1>';
                }
               
                $header_image = get_header_image();
        

		if(!empty($header_image)):?>
                <style>
                    @media screen and (min-width: 766px) {
                    #header {
                    background: url("<?php echo $header_image ?>") no-repeat scroll;
                    background-size: auto;
                    background-size: 463px 117px;
                    background-position: 95%;
                    min-height: 117px;
                    padding-bottom:1px;
                    }
                </style>
                <?php
                endif;

		// this code is to check required plugin installation and show notice to user for installing those plugins.
		// So, no need to provide localization support here
		if( !function_exists( 'ot_get_option' ))
		{
			?>
			<div class="plugin-notice">
				<p class="plugin-alert"><strong>Important:</strong> You need to install <a href="http://wordpress.org/extend/plugins/option-tree/">Option Tree</a> plugin for this theme. Please read documentation for more help.</p>
			</div>
		<?php
		}
		?>

                </div><!-- end of header div -->
            </div>
        </div>
    </div>
	<!-- NAVIGATION BAR STARTS HERE -->
        <div class="row">
            
      
	<div id="nav-wrap">
		<div class="inn-nav clearfix">

			<!-- MAIN NAVIGATION STARTS HERE -->
			<?php
			wp_nav_menu( array(
					'theme_location' => 'main-menu',
					'container' => false,
					'menu_class'=>'nav'
				)
			);
			?>
			<!-- MAIN NAVIGATION ENDS HERE -->


			<!-- SOCIAL NAVIGATION -->
			<?php
			wp_nav_menu( array(
					'theme_location' => 'social-menu',
					'container' => false,
					'menu_class'=>'social-nav',
                    'fallback_cb'     => false,
				)
			);
			?>
		</div>
	</div><!-- end of nav-wrap -->
	<!-- NAVIGATION BAR ENDS HERE -->
        <style>
            .sub-menu{
             
                margin: 0 0;
                
                
            }
        </style>

</div><!-- end of header-wrapper div -->
</div>
<!-- ============= HEADER ENDS HERE ============== -->


<!-- ============= CONTAINER STARTS HERE ============== -->
<div class="main-wrap">
    <div class="container shadow" style="margin-top:-6px;">
		<!-- WEBSITE SEARCH STARTS HERE -->
		<?php
        $adv_search = '';
		if ( function_exists( 'ot_get_option' ) ) {
			$adv_search = ot_get_option('adv_search_show_hide');
			$adv_search_pages = ot_get_option('adv_search_page_checkbox');
            $adv_search_page_url = ot_get_option('adv_search_page_url');
		}
		$pageId = get_the_ID();

        if(
            $adv_search == 'on' &&
            !empty($adv_search_pages) &&
            !empty($adv_search_page_url) &&
            (in_array($pageId, $adv_search_pages))
        ){
            $adv_search_class = 'adv-search';
            $search_template = 'inc/advance-search';
        } else {
            $search_template = 'inc/simple-search';
        }

		?>
                
                <div class="row searchbox">
                    <div class="col-md-12">

                        <div class="top-search-wrap clearfix">
                            <div class="top-search clearfix <?php echo $adv_search_class; ?>">
                                <h3 class="head-pet"><span><?php _e('Recipe Search', 'FoodRecipe'); ?></span></h3>
                                <?php
                                    get_template_part($search_template);
                                ?>
                            </div>
                        </div>

                    </div>
                </div>             

    
    <!-- end of top-search div-->

		<!-- ============= CONTENT AREA STARTS HERE ============== -->
    <?php if ( function_exists('yoast_breadcrumb') ) {
      yoast_breadcrumb('<p id="breadcrumbs">','</p>');
    } ?>

    <div id="content" class="clearfix <?php if(is_page_template('template-home.php')){ echo 'homepage'; } ?>">
