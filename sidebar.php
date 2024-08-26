<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || ! is_active_sidebar('sidebar-2')) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php 
	if(is_page()){
		dynamic_sidebar( 'sidebar-2' ); 
	}else{
		dynamic_sidebar( 'sidebar-1' ); 
	}
	?>
</aside><!-- #secondary -->
