<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package umiha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" title="" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/lib/slick.min.css">
    <link rel="stylesheet" type="text/css" title="" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/lib/slick-theme.min.css"> 
    <link rel="stylesheet" type="text/css" title="" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/style.css"> 
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<link rel="shortcut icon" href="<?php the_field('favicon','option'); ?>">
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<input type="hidden" class="url" value="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/">
	<header>
	    <div class="header-top text-center">
	        <div class="container">
	            <div class="txt-head-top text-uppercase"><a href="<?php the_field('link','option'); ?>"><?php the_field('title','option'); ?></a></div>
	        </div>
	    </div>
	    <div class="header-mobile d-none">
	        <div class="container">
	            <div class="content-mm-mobile">
	                <div class="logo"><a href="index.php"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/logo.png" class="img-fluid" alt=""></a></div>
	                <div class="b-menu">
	                    <ul>
	                        <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/mm-1.png" class="img-fluid" alt=""></a></li>
	                        <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/mm-2.png" class="img-fluid" alt=""></a></li>
	                        <li><a href="javascript:void(0)"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/mm-3.png" class="img-fluid" alt=""></a></li>
	                    </ul>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="head-menu">
	        <div class="container">
	            <div class="row align-items-center">
	                <div class="col-md-5">
	                    <div class="menu-left">
	                        <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
								)
							);
							?>
	                    </div>
	                </div>
	                <div class="col-md-2">
	                    <div class="logo text-center">
	                    	<a href="/">
	                            <img src="<?php the_field('logo','option'); ?>">
	                        </a>
	                    </div>
	                </div>
	                <div class="col-md-5">
	                    <div class="menu-right">
	                        <ul>
	                            <li>
	                                <a href="">
	                                    <span>Tìm kiếm</span>
	                                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path d="M14.3738 13.023C13.9832 12.6325 13.3501 12.6325 12.9596 13.023C12.569 13.4136 12.569 14.0467 12.9596 14.4372L14.3738 13.023ZM19.2929 20.7706C19.6834 21.1611 20.3166 21.1611 20.7071 20.7706C21.0976 20.3801 21.0976 19.7469 20.7071 19.3564L19.2929 20.7706ZM8.38889 14.8413C4.8604 14.8413 2 11.9809 2 8.45237H0C0 13.0854 3.75583 16.8413 8.38889 16.8413V14.8413ZM14.7778 8.45237C14.7778 11.9809 11.9174 14.8413 8.38889 14.8413V16.8413C13.0219 16.8413 16.7778 13.0854 16.7778 8.45237H14.7778ZM8.38889 2.06348C11.9174 2.06348 14.7778 4.92388 14.7778 8.45237H16.7778C16.7778 3.81931 13.0219 0.0634766 8.38889 0.0634766V2.06348ZM8.38889 0.0634766C3.75583 0.0634766 0 3.81931 0 8.45237H2C2 4.92388 4.8604 2.06348 8.38889 2.06348V0.0634766ZM12.9596 14.4372L19.2929 20.7706L20.7071 19.3564L14.3738 13.023L12.9596 14.4372Z" fill="#262626"/>
	                                    </svg>
	                                </a>
	                            </li>
	                            <li>
	                                <a href="javascript:void(0)" class="mm-cart">
	                                    <span>Giỏ hàng(<span class="count-pro-cart"><?php echo WC()->cart->get_cart_contents_count(); ?></span>)</span>
	                                    <svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.75804 6.24184C7.75804 4.42803 9.21522 2.9707 10.9967 2.9707C12.7782 2.9707 14.2354 4.42803 14.2354 6.24184V6.66556H7.75804V6.24184ZM5.75804 8.66556V10.513C5.75804 11.0653 6.20575 11.513 6.75804 11.513C7.31032 11.513 7.75804 11.0653 7.75804 10.513V8.66556H14.2354V10.513C14.2354 11.0653 14.6831 11.513 15.2354 11.513C15.7877 11.513 16.2354 11.0653 16.2354 10.513V8.66556H18.5475L19.8077 25.1738H2.1857L3.44591 8.66556H5.75804ZM5.75804 6.66556V6.24184C5.75804 3.33788 8.09629 0.970703 10.9967 0.970703C13.8971 0.970703 16.2354 3.33788 16.2354 6.24184V6.66556H19.474C19.9968 6.66556 20.4313 7.0682 20.4711 7.58944L21.884 26.0977C21.9052 26.3753 21.8097 26.6492 21.6204 26.8535C21.4312 27.0577 21.1654 27.1738 20.8869 27.1738H1.10645C0.828005 27.1738 0.562171 27.0577 0.372923 26.8535C0.183676 26.6492 0.088155 26.3753 0.109349 26.0977L1.52224 7.58944C1.56203 7.0682 1.99658 6.66556 2.51934 6.66556H5.75804Z" fill="#262626"/>
	                                    </svg>
	                                </a>
	                            </li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="mega-menu">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-3">
	                        <div class="tab-mega">
	                            <ul>
	                            	<?php
							            $terms = get_terms('product_cat', array('orderby' => 'slug', 'hide_empty' => false, 'parent' => 0)); 
							            foreach ($terms as $key => $term) {
							        ?>
	                                <li><a href="javascript:void(0)" data-tab="mega-<?= $term->term_id;  ?>" class="clc-mm-mega <?= $key == 0 ? 'active' : '';  ?>"><?= $term->name;  ?></a></li>
	                                <?php
							            }
							        ?>
	                            </ul>
	                        </div>
	                    </div>
	                    <div class="col-md-9">
	                    	<?php
					            foreach ($terms as $key => $term) {
					        ?>
	                        <div class="tab-content-mega <?= $key == 0 ? 'active' : '';  ?>" id="mega-<?= $term->term_id;  ?>">
	                            <div class="left">
	                                <ul>
	                                	<?php
								            $children = get_terms('product_cat', array('orderby' => 'slug', 'hide_empty' => false, 'parent' => $term->term_id)); 
								            foreach ($children as $t) {
								        ?>
	                                    <li>
	                                        <a href="<?= get_term_link( $t ); ?>"><?= $t->name;  ?></a>
	                                        <ul>
	                                        	<?php
										            $chi = get_terms('product_cat', array('orderby' => 'slug', 'hide_empty' => false, 'parent' => $t->term_id)); 
										            foreach ($chi as $c) {
										        ?>
	                                        		<a href="<?= get_term_link( $c ); ?>"><?= $c->name;  ?></a>
	                                            <?php
										            }
										        ?>
	                                        </ul>
	                                    </li>
	                                    <?php
								            }
								        ?>
	                                </ul>
	                            </div>
	                            <div class="right">
	                                <div class="list-prd-mega">
	                                	<?php
			                            $query = array(
			                                'post_type' => 'product',
			                                'post_status' => 'publish',
			                                'posts_per_page' => 2,
			                                'tax_query' => array(
			                                    array(
			                                        'taxonomy' => 'product_cat',
			                                        'field' => 'term_id',
			                                        'terms' => $term->term_id
			                                    ),
			                                ),
			                            );
			                            ?>
			                            <?php $the_query = new wp_query($query); ?>
			                            <?php if( $the_query->have_posts() ): ?>
			                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			                            <div class="item-prd-mega">
	                                        <div class="avarta"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url() ?>" class="img-fluid w-100" alt="<?php the_title(); ?>"></a></div>
	                                        <div class="info">
	                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	                                            <div class="bot">
	                                                <span>
	                                                	<?php 
	                                                	$product = new WC_Product( get_the_ID() );
		                                                if ( $product->is_type( 'variable'  )) :
		                                                    $attr = get_post_meta($post->ID, '_product_attributes', true);
		                                                    echo $attr['dung-tich']['value'];
		                                                endif; 
		                                                ?>
	                                                </span>
	                                                <p><?= $product->get_price_html(); ?></p>
	                                            </div>
	                                        </div>
	                                    </div>
			                            <?php endwhile; ?>
			                            <?php endif; wp_reset_postdata(); ?>
	                                </div>
	                            </div>
	                        </div>
	                       	<?php
					            }
					        ?>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="box-card-head">
	        <div class="content-menu-cart">
	            <div class="h-card">Giỏ hàng</div>
	            <div class="shiping">
	                <div class="icon">
	                    <svg width="40" height="27" viewBox="0 0 40 27" fill="none" xmlns="http://www.w3.org/2000/svg">
	                        <path d="M32.25 8.14286L32.8054 7.63886C32.6633 7.4822 32.4616 7.39286 32.25 7.39286V8.14286ZM38.5 15.0306H39.25C39.25 14.8443 39.1806 14.6646 39.0554 14.5266L38.5 15.0306ZM38.5 22.4286L38.5001 23.1786C38.9143 23.1785 39.25 22.8427 39.25 22.4286H38.5ZM34.7763 22.4291L34.0692 22.6789V22.6789L34.7763 22.4291ZM29.7237 22.4291L30.4308 22.6789L30.4308 22.6789L29.7237 22.4291ZM26 8.14286V7.39286C25.5858 7.39286 25.25 7.72864 25.25 8.14286H26ZM1 0.25C0.585786 0.25 0.25 0.585786 0.25 1C0.25 1.41421 0.585786 1.75 1 1.75V0.25ZM26 1H26.75C26.75 0.585786 26.4142 0.25 26 0.25V1ZM6.35735 21.6786C5.94313 21.6785 5.60726 22.0142 5.60714 22.4284C5.60703 22.8426 5.94273 23.1785 6.35694 23.1786L6.35735 21.6786ZM7.25 12.4643C7.66421 12.4643 8 12.1285 8 11.7143C8 11.3001 7.66421 10.9643 7.25 10.9643V12.4643ZM4.57143 10.9643C4.15722 10.9643 3.82143 11.3001 3.82143 11.7143C3.82143 12.1285 4.15722 12.4643 4.57143 12.4643V10.9643ZM7.25 17.8214C7.66421 17.8214 8 17.4856 8 17.0714C8 16.6572 7.66421 16.3214 7.25 16.3214V17.8214ZM6.35714 16.3214C5.94293 16.3214 5.60714 16.6572 5.60714 17.0714C5.60714 17.4856 5.94293 17.8214 6.35714 17.8214V16.3214ZM7.25 7.10714C7.66421 7.10714 8 6.77136 8 6.35714C8 5.94293 7.66421 5.60714 7.25 5.60714V7.10714ZM2.78571 5.60714C2.3715 5.60714 2.03571 5.94293 2.03571 6.35714C2.03571 6.77136 2.3715 7.10714 2.78571 7.10714V5.60714ZM31.6946 8.64685L37.9446 15.5346L39.0554 14.5266L32.8054 7.63886L31.6946 8.64685ZM37.75 15.0306V22.4286H39.25V15.0306H37.75ZM38.4999 21.6786L34.7762 21.6791L34.7765 23.1791L38.5001 23.1786L38.4999 21.6786ZM35.4835 22.1793C35.0134 20.8483 33.7442 19.8929 32.25 19.8929V21.3929C33.0887 21.3929 33.8042 21.9286 34.0692 22.6789L35.4835 22.1793ZM32.25 19.8929C30.7558 19.8929 29.4866 20.8483 29.0165 22.1793L30.4308 22.6789C30.6958 21.9286 31.4113 21.3929 32.25 21.3929V19.8929ZM29.7238 21.6791L26.0001 21.6786L25.9999 23.1786L29.7236 23.1791L29.7238 21.6791ZM26.75 22.4286V8.14286H25.25V22.4286H26.75ZM26 8.89286H32.25V7.39286H26V8.89286ZM1 1.75H26V0.25H1V1.75ZM25.25 1V22.4286H26.75V1H25.25ZM26 21.6786L13.3477 21.6791L13.3478 23.1791L26 23.1786L26 21.6786ZM14.055 22.1793C13.5848 20.8483 12.3157 19.8929 10.8214 19.8929V21.3929C11.6601 21.3929 12.3756 21.9286 12.6406 22.6789L14.055 22.1793ZM10.8214 19.8929C9.32719 19.8929 8.05803 20.8483 7.58791 22.1793L9.00227 22.6789C9.26727 21.9286 9.98275 21.3929 10.8214 21.3929V19.8929ZM8.29529 21.6791L6.35735 21.6786L6.35694 23.1786L8.29489 23.1791L8.29529 21.6791ZM32.25 21.3929C33.3151 21.3929 34.1786 22.2563 34.1786 23.3214H35.6786C35.6786 21.4279 34.1436 19.8929 32.25 19.8929V21.3929ZM34.1786 23.3214C34.1786 24.3865 33.3151 25.25 32.25 25.25V26.75C34.1436 26.75 35.6786 25.215 35.6786 23.3214H34.1786ZM32.25 25.25C31.1849 25.25 30.3214 24.3865 30.3214 23.3214H28.8214C28.8214 25.215 30.3565 26.75 32.25 26.75V25.25ZM30.3214 23.3214C30.3214 22.2563 31.1849 21.3929 32.25 21.3929V19.8929C30.3565 19.8929 28.8214 21.4279 28.8214 23.3214H30.3214ZM10.8214 21.3929C11.8866 21.3929 12.75 22.2563 12.75 23.3214H14.25C14.25 21.4279 12.715 19.8929 10.8214 19.8929V21.3929ZM12.75 23.3214C12.75 24.3865 11.8866 25.25 10.8214 25.25V26.75C12.715 26.75 14.25 25.215 14.25 23.3214H12.75ZM10.8214 25.25C9.75631 25.25 8.89286 24.3865 8.89286 23.3214H7.39286C7.39286 25.215 8.92788 26.75 10.8214 26.75V25.25ZM8.89286 23.3214C8.89286 22.2563 9.75631 21.3929 10.8214 21.3929V19.8929C8.92788 19.8929 7.39286 21.4279 7.39286 23.3214H8.89286ZM7.25 10.9643H4.57143V12.4643H7.25V10.9643ZM7.25 16.3214H6.35714V17.8214H7.25V16.3214ZM7.25 5.60714H2.78571V7.10714H7.25V5.60714ZM29.0165 22.1793C28.8899 22.5375 28.8214 22.9223 28.8214 23.3214H30.3214C30.3214 23.0948 30.3602 22.8789 30.4308 22.6789L29.0165 22.1793ZM35.6786 23.3214C35.6786 22.9223 35.6101 22.5375 35.4835 22.1793L34.0692 22.6789C34.1398 22.8789 34.1786 23.0948 34.1786 23.3214H35.6786ZM7.58791 22.1793C7.46137 22.5375 7.39286 22.9223 7.39286 23.3214H8.89286C8.89286 23.0948 8.93163 22.8789 9.00227 22.6789L7.58791 22.1793ZM14.25 23.3214C14.25 22.9223 14.1815 22.5375 14.055 22.1793L12.6406 22.6789C12.7112 22.8789 12.75 23.0948 12.75 23.3214H14.25Z" fill="#C1BCB4"/>
	                    </svg>
	                </div>
	                <span>Free ship cho đơn hàng trên 500.000vnđ</span>
	            </div>
	            <div class="list-prd-head">
	                <?php
                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            
                    ?>
	                <div class="item-prd-card">
	                    <div class="aavrta"><a href="<?= $_product->get_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url($product_id) ?>" class="img-fluid w-100" alt="<?= $_product->get_name(); ?>"></a></div>
	                    <div class="info">
	                        <h4><a href="<?= $_product->get_permalink(); ?>"><?= $_product->get_name(); ?></a></h4>
	                        <p>Có công xịt dưỡng có ngày tóc xinh.</p>
	                        <p>
	                        	<?php 
                            	if ( $product->is_type( 'variable'  )) :
	                                if (count($_product->get_attributes()) > 0) :
	                                    $attr = $_product->get_attributes();
	                                    echo $attr['dung-tich'];
	                                endif; 
                                endif; 
                                ?>
                            </p>
	                        <div class="bottom">
	                            <div class="left">
	                                <div class="quantity">
	                                    <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/add-cart.png" class="img-fluid" alt="<?= $_product->get_name(); ?>">
	                                </div>
	                            </div>
	                            <div class="right">
	                                <div class="price"><?= number_format($cart_item['line_total'], 0, '', '.'); ?>đ</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <?php
                        }}
                    ?>
	            </div>
	            <div class="d">
	                <div class="note-cart">Mua thêm 10K để nhận quà 0Đ</div>
	                <div class="total-cart">
	                    <p>TẠM TÍNH</p>
	                    <p><?= number_format(WC()->cart->subtotal, 0, '', '.'); ?>vnđ</p>
	                </div>
	                <div class="paynow">
	                    <a href="thanh-toan">Thanh toán</a>
	                </div>
	            </div>
	        </div>
	    </div>
	</header>

	<div class="fix-menu-mobile text-center d-none">
	    <ul>
	        <li><a href=""><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/menu-1.png" class="img-fluid" alt=""></a></li>
	        <li><a href=""><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/menu-2.png" class="img-fluid" alt=""></a></li>
	        <li><a href=""><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/menu-3.png" class="img-fluid" alt=""></a></li>
	        <li><a href=""><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/menu-4.png" class="img-fluid" alt=""></a></li>
	    </ul>
	</div>

			
	