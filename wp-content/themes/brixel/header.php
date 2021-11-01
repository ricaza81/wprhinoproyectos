<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brixel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<?php
	$data_nicescroll_cursorcolor = ( ! empty( brixel_global_var( 'scrollbar_color', 'color', true ) ) ) ? brixel_global_var( 'scrollbar_color', 'color', true ) : '';
	$data_nicescroll_cursorwidth = ( ! empty( brixel_global_var( 'scrollbar_width', 'width', true ) ) ) ? brixel_global_var( 'scrollbar_width', 'width', true ) : '';
	$scrollbar_switch            = ( ! empty( brixel_global_var( 'scrollbar_switch', '', false ) ) ) ? 'infinity-scroll' : '';
?>

<?php if ( ! empty( brixel_global_var( 'header-style', '', false ) ) ) { ?>
<body <?php echo esc_html( $scrollbar_switch ); ?> <?php body_class(); ?> data-nicescroll-cursorcolor="<?php echo esc_attr( $data_nicescroll_cursorcolor ); ?>" data-nicescroll-cursorwidth="<?php echo esc_attr( $data_nicescroll_cursorwidth ); ?>">
<?php } else { ?>
<body <?php echo esc_html( $scrollbar_switch ); ?> <?php body_class(); ?> data-nicescroll-cursorcolor="09276f" data-nicescroll-cursorwidth="10px">
<?php } ?>

	<?php
	if ( ! is_user_logged_in() && ! empty( brixel_global_var( 'coming_soon_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'coming-soon.php' );
		die;
	} elseif ( ! is_user_logged_in() && ! empty( brixel_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'maintenance.php' );
		die;
	} elseif ( ! is_user_logged_in() && ! empty( brixel_global_var( 'coming_soon_switch', '', false ) ) && ! empty( brixel_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'coming-soon.php' );
		die;
	}
	?>

	<?php if ( brixel_global_var( 'preloader_switch', '', false ) ) { ?>
		<!-- preloader -->
		<div class="preloader" data-preloader-timeout="<?php echo esc_attr( brixel_global_var( 'preloader_timeout', '', false ) ); ?>">
			<div class="table">
				<div class="table-cell">
					<?php
					if ( ! empty( brixel_global_var( 'preloader_style', '', false ) ) ) {
						include get_parent_theme_file_path( 'inc/preloader/' . brixel_global_var( 'preloader_style', '', false ) . '.php' );
					}
					?>
				</div>
			</div>
		</div>
		<!-- preloader -->
	<?php } ?>

	<!-- overlay -->
	<div class="overlay"></div>
	<!-- overlay -->

	<!-- scrollup -->
	<?php
	if ( ! empty( brixel_global_var( 'scroll_to_top_direction', '', false ) ) ) :
	?>
		<div class="scrollup <?php echo esc_html( brixel_global_var( 'scroll_to_top_direction', '', false ) ); ?>">
	<?php
	else :
	?>
		<div class="scrollup left">
	<?php
	endif;
	?>
		<i class="fa fa-angle-up"></i>
	</div>
	<!-- scrollup -->

	<?php
    if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
        include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
    } else {
        if ( is_404() || is_search() ) {
    		if ( ( brixel_global_var( 'header-style', '', false ) ) ) {
    			include get_parent_theme_file_path( 'inc/header/' . brixel_global_var( 'header-style', '', false ) . '.php' );
    		} else {
    			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
    		}
    	} else {
    		if (( 'default' != get_post_meta( $post->ID, 'selectheader', true ) ) && ( get_post_meta( $post->ID, 'selectheader', true ) ) ) {
    			include get_parent_theme_file_path( 'inc/header/header-style-'.get_post_meta( $post->ID, 'selectheader', true ).'.php' );
    		} elseif ( ( brixel_global_var( 'header-style', '', false ) ) ) {
    			include get_parent_theme_file_path( 'inc/header/' . brixel_global_var( 'header-style', '', false ) . '.php' );
    		} else {
    			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
    		}
    	}
    }
    ?>

		<?php
		$team_page_info           = '';
		$rt_team_bannercheck      = '';
		$portfolio_page_info      = '';
		$rt_portfolio_bannercheck = '';
		$case_studies_page_info   = '';
		$rt_case_studies_banner   = '';
		$rt_shop_banner           = '';
		$posts_page_id            = '';
		$rt_posts_page_bann       = '';

		if ( is_singular( 'team' ) || is_tax( 'profession' ) ) {
			$team_page_info      = get_page_by_path( 'team', OBJECT, 'page' );
			$team_page_id        = $team_page_info->ID;
			$rt_team_bannercheck = get_post_meta( $team_page_id, 'bannercheck', true );
		} elseif ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) {
			$portfolio_page_info      = get_page_by_path( 'portfolio', OBJECT, 'page' );
			$portfolio_page_id        = $portfolio_page_info->ID;
			$rt_portfolio_bannercheck = get_post_meta( $portfolio_page_id, 'bannercheck', true );
		} elseif ( is_singular( 'case-studies' ) || is_tax( 'case-study-category' ) ) {
			$case_studies_page_info = get_page_by_path( 'case-studies', OBJECT, 'page' );
			$case_studies_page_id   = $case_studies_page_info->ID;
			$rt_case_studies_banner = get_post_meta( $case_studies_page_id, 'bannercheck', true );
		} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) )
		) {
			$shop_page_info = get_page_by_path( 'shop', OBJECT, 'page' );
			$shop_page_id   = $shop_page_info->ID;
			$rt_shop_banner = get_post_meta( $shop_page_id, 'bannercheck', true );
		} elseif ( is_home() || is_search() || is_category() || is_archive() || is_tag() || is_author() || is_singular( 'post' ) || is_attachment() ) {
			$posts_page_id      = get_option( 'page_for_posts' );
			$rt_posts_page_bann = get_post_meta( $posts_page_id, 'bannercheck', true );
		}

		$rt_bannercheck = get_post_meta( get_the_id(), 'bannercheck', true );
		?>
		<?php
		if ( ( brixel_global_var( 'header-style', '', false ) ) ) {
			if (
				in_array( $rt_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
				in_array( $rt_team_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
				in_array( $rt_portfolio_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
				in_array( $rt_case_studies_banner, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
				in_array( $rt_shop_banner, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
				in_array( $rt_posts_page_bann, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true )
			) {
				require get_parent_theme_file_path( '/inc/header/banner.php' );
			} else {
				require get_parent_theme_file_path( '/inc/header/theme-banner.php' );
			}
		}
		else {
		    require get_parent_theme_file_path( '/inc/header/banner-default.php' );
		}
		?>


	<!-- #page -->
	<div id="page" class="site">
		<!-- #content -->
		<div id="content" class="site-content">
