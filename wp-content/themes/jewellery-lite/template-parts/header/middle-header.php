<?php
/**
 * The template part for top header
 *
 * @package Jewellery Lite 
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<div class="middle-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="logo">
          <?php if( has_custom_logo() ){ jewellery_lite_the_custom_logo();
            }else{ ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html($description); ?></p>
          <?php endif; } ?>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="search-bar">
          <?php if(class_exists('woocommerce')){ ?>
            <?php get_product_search_form(); ?>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-2 col-md-2 col-8">
        <div class="account">
          <?php if(class_exists('woocommerce')){ ?>
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Account','jewellery-lite'); ?>"><i class="fas fa-sign-in-alt"></i><p><?php esc_html_e('Account','jewellery-lite'); ?></p></a>
            <?php }
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','jewellery-lite'); ?>"><i class="fas fa-user"></i><p><?php esc_html_e('Login / Register','jewellery-lite'); ?></p></a>
            <?php } ?>
          <?php }?>
        </div>
      </div>
      <div class="col-lg-1 col-md-1 col-4">
        <?php if(class_exists('woocommerce')){ ?>
          <span class="cart_no">
            <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','jewellery-lite' ); ?>"><i class="fas fa-shopping-cart"></i><p><?php esc_html_e('Cart','jewellery-lite'); ?></p></a>
            <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
          </span>
        <?php } ?>
      </div>
    </div>
  </div>
</div>