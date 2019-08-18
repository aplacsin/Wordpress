<?php
/**
 * The template part for header
 *
 * @package Jewellery Lite 
 * @subpackage jewellery-lite
 * @since jewellery-lite 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','jewellery-lite'); ?></a></div>
<div id="header" class="menubar">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
		        <?php if(class_exists('woocommerce')){ ?>
		          	<button class="product-btn"><i class="fas fa-bars"></i><?php echo esc_html('Велосипеды','jewellery-lite'); ?></button>
		          	<div class="product-cat">
			            <?php
			              $args = array(
			                'orderby'    => 'title',
			                'order'      => 'ASC',
			                'hide_empty' => 0,
			                'parent'  => 0
			              );
			              $product_categories = get_terms( 'product_cat', $args );
			              $count = count($product_categories);
			              if ( $count > 0 ){
			                  foreach ( $product_categories as $product_category ) {
			                    $product_cat_id   = $product_category->term_id;
			                    $cat_link = get_category_link( $product_cat_id );
			                    if ($product_category->category_parent == 0) { ?>
			                  <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
			                  <?php
			                }
			                echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
			            <?php } } ?>
		          	</div>
		        <?php }?>
		    </div>
		    <div class="<?php if(class_exists('woocommerce') != '') { ?>col-lg-9 col-md-8"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
		    	<div class="nav">
					<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
				</div>
		    </div>
		</div>
	</div>
</div>