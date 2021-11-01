<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brixel
 */

?>

	</div>
	<!-- #content -->
</div>
<!-- #page -->

<?php
if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
    include get_parent_theme_file_path( 'inc/footer/footer-style-default.php' );
} else {
	if ( ( brixel_global_var( 'footer-style', '', false ) ) ) {
		include get_parent_theme_file_path( 'inc/footer/' . brixel_global_var( 'footer-style', '', false ) . '.php' );
	} else {
		include get_parent_theme_file_path( 'inc/footer/footer-style-default.php' );
	}
}
?>

<?php wp_footer(); ?>

</body>
</html>
