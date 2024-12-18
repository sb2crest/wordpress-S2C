<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2019.3.3.0
 */

$options = array( 'itemSelector' => '.product' );
?>

<div class="active-filter"><?php the_widget( "WC_Widget_Layered_Nav_Filters" );?></div>
<ul class="products content-inner" data-grid-normal data-columns="<?php echo esc_attr( kiraz_option( 'shop__gridColumns' ) ) ?>">