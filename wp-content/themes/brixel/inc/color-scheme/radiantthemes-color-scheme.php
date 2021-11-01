<?php
/**
 * Custom css propoerty based on Color Scheme
 *
 * @package unbound
 */

$color_solid = '';
$color_rgba  = '';
if ( 'custom-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_custom']['color'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_custom']['rgba'];
} elseif ( 'predefined-color' === $radiantthemes_theme_options['color_scheme_type'] ) {
	$color_solid = $radiantthemes_theme_options['color_scheme_type_predefined'];
	$color_rgba  = $radiantthemes_theme_options['color_scheme_type_predefined'];
}
?>

<?php

/*
--------------------------------------------------------------
>>> THEME COLOR SCHEME CSS || DO NOT CHANGE THIS WITHOUT PROPER KNOWLEDGE
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
// RadiantThemes Custom
// RadiantThemes Header Style
	//  RadiantThemes Header Style Default
	//  RadiantThemes Header Style One
	//  RadiantThemes Header Style Two
	//  RadiantThemes Header Style Three
	//  RadiantThemes Header Style Five
	//  RadiantThemes Header Style Six
	//  RadiantThemes Header Style Eight
	//  RadiantThemes Header Style Nine
	//  RadiantThemes Header Style Ten
// RadiantThemes Elements
	// RadiantThemes Elements Theme Button
	// RadiantThemes Elements Dropcap
	// RadiantThemes Elements Blockquote
	// RadiantThemes Elements Accordion
	// RadiantThemes Elements Pricing Table
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Custom
--------------------------------------------------------------
*/
?>

a,
a:hover,
a:focus,
.sidr-close,
.widget-area > .widget.widget_rss ul li .rss-date:before,
.widget-area > .widget.widget_archive ul li a:hover,
.widget-area > .widget.widget_categories ul li a:hover,
.widget-area > .widget.widget_meta ul li a:hover,
.widget-area > .widget.widget_pages ul li a:hover,
.widget-area > .widget.widget_nav_menu ul li a:hover,
.widget-area > .widget.widget_bizcorp_business_contact_box_widget ul.contact li:before,
.post.style-one .post-meta > span i,
.post.style-two .entry-main .post-meta > span i,
.post.style-three .entry-main .post-meta > span i,
.post.style-default .entry-main .entry-meta > .holder > .data .meta > span i,
.post.single-post .entry-header .entry-meta > .holder > .data .meta > span i,
body.rt-coming-soon.coming-soon-style-two .comingsoon_main .comingsoon-counter > .time,
.default-page ul:not(.contact) > li:before,
.comment-content ul:not(.contact) > li:before,
.rt-shop-box > .holder > .data .price{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.nicescroll-cursors,
.preloader,
body > .scrollup,
.pagination > *.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce div.product form.cart .button,
.woocommerce div.product form.cart .button:hover,
.woocommerce #respond input#submit,
.woocommerce #respond input#submit:hover,
.woocommerce input.button[name="apply_coupon"],
.woocommerce button.button[name="update_cart"],
.woocommerce button.button[name="update_cart"]:disabled,
.woocommerce button.button[name="update_cart"]:hover,
.woocommerce input.button:disabled:hover,
.woocommerce input.button:disabled[disabled]:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.woocommerce form .form-row input.button,
.woocommerce form .form-row input.button:hover,
.woocommerce form.checkout_coupon .form-row .button,
.woocommerce #payment #place_order,
.widget-area > .widget .tagcloud > [class*='tag-link-']:hover,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-range,
.widget-area > .widget.widget_price_filter .ui-slider .ui-slider-handle,
.post.style-default .entry-main .post-read-more .btn,
.page.style-default .entry-main .post-read-more .btn,
.product.style-default .entry-main .post-read-more .btn,
.radiantthemes-search-form .form-row button[type=submit],
.rt-button.element-one > .rt-button-main,
.nav > [class*='menu-'] > ul.menu > li:before,
.rt-megamenu-widget ul.menu > li:before,
.footer_main_item ul.social li a:hover,
.footer_main_item .widget-title:before,
.post.style-two .entry-main .post-read-more .btn,
.post.style-three .entry-main .post-read-more .btn,
.comments-area .comment-form > p button[type=submit],
.comments-area .comment-form > p button[type=reset],
.error_main .btn:before,
.maintenance_main .maintenance-progress > .maintenance-progress-bar,
.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span,
.default-page blockquote,
.comment-content blockquote,
.rt-shop-box > .holder > .onsale,
.shop_single > .product > .woocommerce-tabs > ul.tabs > li > a:before{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.edit-link,
.rt-shop-box > .holder > .pic > .action-buttons > .button,
.rt-shop-box > .holder > .pic > .action-buttons > .added_to_cart{
	background-color: <?php echo esc_attr( $color_rgba ); ?> ;
}

.footer_main_item ul.social li a:hover,
.pagination > *.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.widget-area > .widget .search-form input[type=search]:focus,
.widget-area > .widget select:focus,
.comments-area .comment-form > p input[type=text]:focus,
.comments-area .comment-form > p input[type=email]:focus,
.comments-area .comment-form > p input[type=tel]:focus,
.comments-area .comment-form > p input[type=url]:focus,
.comments-area .comment-form > p input[type=password]:focus,
.comments-area .comment-form > p input[type=date]:focus,
.comments-area .comment-form > p input[type=time]:focus,
.comments-area .comment-form > p select:focus,
.comments-area .comment-form > p textarea:focus,
.rt-shop-box.style-two > .holder > .pic > .data,
.woocommerce #review_form #respond textarea:focus,
.woocommerce form .form-row input.input-text:focus,
.woocommerce form .form-row textarea:focus{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.maintenance_main .maintenance-progress > .maintenance-progress-bar > .maintenance-progress-percentage > span:before{
	border-top-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.radiant-contact-form.element-two .form-row .wpcf7-form-control-wrap:before{
	border-bottom-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Header Style Default
--------------------------------------------------------------
*/
?>

.wraper_header.style-default .wraper_header_main{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style One
--------------------------------------------------------------
*/
?>

.wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-one .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Two
--------------------------------------------------------------
*/
?>

.wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-two .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Three
--------------------------------------------------------------
*/
?>

.wraper_header.style-three .wraper_header_main{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-three .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Five
--------------------------------------------------------------
*/
?>

.hamburger_menu.header-style-five{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Six
--------------------------------------------------------------
*/
?>

.wraper_flyout_menu.header-style-six{
	background-color: <?php echo esc_attr( $color_rgba ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Eight
--------------------------------------------------------------
*/
?>

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Nine
--------------------------------------------------------------
*/
?>

.wraper_header.style-nine .wraper_header_top{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li:hover > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-item > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-parent > a, .wraper_header.style-nine .nav > [class*="menu-"] > ul.menu > li.current-menu-ancestor > a{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Header Style Ten
--------------------------------------------------------------
*/
?>

.header_top_item ul.contact li i,
.header_main_action ul > li.floating-searchbar > i.fa-times,
.header_main_action ul > li.flyout-searchbar-toggle > i.fa-times,
.rt-megamenu-widget .rt-megamenu-widget-title{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.nav > [class*='menu-'] > ul.menu > li > a:before,
.header_main_action ul > li.header-cart-bar > .header-cart-bar-icon .cart-count{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements
--------------------------------------------------------------
*/

/*
--------------------------------------------------------------
// RadiantThemes Elements Theme Button
--------------------------------------------------------------
*/
?>

.radiantthemes-button > .radiantthemes-button-main, .radiant-contact-form .form-row input[type=submit], .radiant-contact-form .form-row input[type=button], .radiant-contact-form .form-row button[type=submit], .post.style-two .post-read-more .btn, .post.style-three .entry-main .post-read-more .btn, .woocommerce #respond input#submit, .woocommerce form .form-row input.button, .woocommerce .return-to-shop .button, .widget-area > .widget.widget_price_filter .button, .rt-fancy-text-box.element-one > .holder > .more > a, .rt-fancy-text-box.element-two > .holder > .more > a, .rt-fancy-text-box.element-three > .holder > .more > a, .rt-fancy-text-box.element-four > .holder > .more > a, .team.element-six .team-item > .holder .data .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .title .btn, .rt-portfolio-box.element-one .rt-portfolio-box-item > .holder > .data .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .title .btn, .rt-portfolio-box.element-two .rt-portfolio-box-item > .holder > .pic > .data .btn, .rt-portfolio-box.element-four .rt-portfolio-box-item > .holder > .pic > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Dropcap
--------------------------------------------------------------
*/
?>

.rt-dropcaps.element-one > .holder > .rt-dropcap-letter,
.rt-dropcaps.element-two > .holder > .rt-dropcap-letter{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Blockquote
--------------------------------------------------------------
*/
?>

.rt-blockquote.element-one > blockquote > i.fa{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Accordion
--------------------------------------------------------------
*/
?>

.rt-accordion.element-two .rt-accordion-item > .rt-accordion-item-title > .rt-accordion-item-title-icon > .holder i,
.rt-accordion.element-six .rt-accordion-item > .rt-accordion-item-title > .rt-accordion-item-title-icon .symbol:before{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

<?php

/*
--------------------------------------------------------------
// RadiantThemes Elements Pricing Table
--------------------------------------------------------------
*/
?>

.rt-pricing-table.element-one.spotlight > .holder,
.rt-pricing-table.element-two > .holder > .more .btn,
.rt-pricing-table.element-four > .holder > .more .btn{
	border-color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-pricing-table.element-one > .holder > .heading .title,
.rt-pricing-table.element-one.spotlight > .holder > .heading .title,
.rt-pricing-table.element-one > .holder > .pricing .price,
.rt-pricing-table.element-one.spotlight > .holder > .pricing .price,
.rt-pricing-table.element-two > .holder > .heading .title,
.rt-pricing-table.element-two > .holder > .list ul li:before,
.rt-pricing-table.element-two > .holder > .more .btn,
.rt-pricing-table.element-three.spotlight > .holder > .data .btn-hover,
.rt-pricing-table.element-four > .holder > .pricing .price,
.rt-pricing-table.element-four > .holder > .more .btn{
	color: <?php echo esc_attr( $color_solid ); ?> ;
}

.rt-pricing-table.element-one > .holder > .more .btn,
.rt-pricing-table.element-one.spotlight > .holder > .more .btn,
.rt-pricing-table.element-two.spotlight > .holder > .more .btn,
.rt-pricing-table.element-three.spotlight > .holder,
.rt-pricing-table.element-four.spotlight > .holder > .pricing .period,
.rt-pricing-table.element-four.spotlight > .holder > .more .btn,
.rt-pricing-table.element-five > .holder > .data .btn{
	background-color: <?php echo esc_attr( $color_solid ); ?> ;
}