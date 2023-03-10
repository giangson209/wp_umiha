<?php
/**
 * umiha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package umiha
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function umiha_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on umiha, use a find and replace
		* to change 'umiha' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'umiha', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'umiha' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'umiha_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'umiha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function umiha_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'umiha_content_width', 640 );
}
add_action( 'after_setup_theme', 'umiha_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function umiha_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'umiha' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'umiha' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'umiha_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function umiha_scripts() {
	wp_enqueue_style( 'umiha-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'umiha-style', 'rtl', 'replace' );

	wp_enqueue_script( 'umiha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'umiha_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Cài Đặt Chung',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    )); 
}

function wpb_custom_new_menu() {
	register_nav_menus( array(
	    'footer1' => __( 'Footer 1' ),
	    'footer2' => __( 'Footer 2' ),
	    'footer3' => __( 'Footer 3' ),
	    'mobile' => __( 'Mobile' ),
	) );
}
add_action( 'init', 'wpb_custom_new_menu' );

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
define('ALLOW_UNFILTERED_UPLOADS', true); 

function woo(){
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woo' );

add_filter( 'woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
  	switch( $currency ) {
    	case 'VND': $currency_symbol = 'đ'; break;
  	}
  	return $currency_symbol;
}


function add_percentage_to_sale_badge( $product ) {

  	if( $product->is_type('variable')){
		$percentages = array();

		$prices = $product->get_variation_prices();

		foreach( $prices['price'] as $key => $price ){
		  	if( $prices['regular_price'][$key] !== $price ){
		      	$percentages[] = round( 100 - ( floatval($prices['sale_price'][$key]) / floatval($prices['regular_price'][$key]) * 100 ) );
		  	}
		}
		$percentage = max($percentages) . '%';

  	} elseif( $product->is_type('grouped') ){
		$percentages = array();
		$children_ids = $product->get_children();

		foreach( $children_ids as $child_id ){
		  	$child_product = wc_get_product($child_id);

		  	$regular_price = (float) $child_product->get_regular_price();
		  	$sale_price    = (float) $child_product->get_sale_price();

		  	if ( $sale_price != 0 || ! empty($sale_price) ) {
		      	$percentages[] = round(100 - ($sale_price / $regular_price * 100));
		  	}
		}
		$percentage = max($percentages) . '%';

  	} else {
		$regular_price = (float) $product->get_regular_price();
		$sale_price    = (float) $product->get_sale_price();

		if ( $sale_price != 0 || ! empty($sale_price) ) {
		  	$percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
		} else {
		  	return '';
		}
  	}
  	return $percentage;
}

function get_tax_level($id, $tax){
    $ancestors = get_ancestors($id, $tax);
    return count($ancestors)+1;
}


add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
        
function woocommerce_ajax_add_to_cart() {
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $quantity = empty($_POST['quantity']) ? 1 :  wc_stock_amount($_POST['quantity']);
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $variation_id = absint($_POST['variation_id']);
    $product_status = get_post_status($product_id);
    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        do_action('woocommerce_ajax_added_to_cart', $product_id);

        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
            wc_add_to_cart_message(array($product_id => $quantity), true);
        }
    } else {
        $data = array(
            'error' => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

        echo wp_send_json($data);
    }
    wp_die();
}


add_action('wp_ajax_woocommerce_ajax_addall_to_cart', 'woocommerce_ajax_addall_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_addall_to_cart', 'woocommerce_ajax_addall_to_cart');
        
function woocommerce_ajax_addall_to_cart() {
    $product_ids = empty($_POST['product_id']) ? 1 : $_POST['product_id'];
    foreach ($product_ids as $key => $product_id) {
    	$quantity = empty($_POST['quantity']) ? 1 :  wc_stock_amount($_POST['quantity']);
	    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
	    $variation_id = absint($_POST['variation_id']);
	    $product_status = get_post_status($product_id);
	    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
	        do_action('woocommerce_ajax_added_to_cart', $product_id);

	        if ('yes' === get_option('woocommerce_cart_redirect_after_add')) {
	            wc_add_to_cart_message(array($product_id => $quantity), true);
	        }
	    } else {
	        $data = array(
	            'error' => true,
	            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id));

	        echo wp_send_json($data);
	    }
    }
    wp_die();
}


add_action('wp_ajax_loadmore', 'get_post_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'get_post_loadmore');
function get_post_loadmore() {
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; 
    $id = isset($_POST['id']) ? (int)$_POST['id'] : 0; 
    $getposts = new WP_query(); $getposts->query('post_status=publish&showposts=3&offset='.$offset.'&cat='.$id);
    if( $getposts->have_posts() ) {
    while ($getposts->have_posts()) : $getposts->the_post(); ?>
    	<div class="col-md-4">
            <div class="item-blog">
                <div class="avarta"><a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url() ?>" class="img-fluid w-100" alt="<?php the_title(); ?>"></a></div>
                <div class="info">
                    <div class="top">
                        <div class="cate">
                            <?php 
                                $category_detail = get_the_category(get_the_ID(),array( 'fields' => 'names' ) );
                                echo $category_detail[0]->cat_name;
                            ?>
                        </div>
                        <div class="date"><?= get_the_date('d/m/Y'); ?></div>
                    </div>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="detail-link text-center">
                        <a href="<?php the_permalink(); ?>" class="text-uppercase">Đọc tiếp</a>
                    </div>
                </div>
            </div>
        </div>
    <?php 
	endwhile; 
	}else{
		echo 'end';
	}
	wp_reset_postdata();
	die(); 
}

add_action('wp_ajax_loadmorecomment', 'get_post_loadmorecomment');
add_action('wp_ajax_nopriv_loadmorecomment', 'get_post_loadmorecomment');
function get_post_loadmorecomment() {
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 10; 
    $star = $_POST['star'] < 100 ? $_POST['star'] : 100; 
    $image = isset($_POST['type']) ? $_POST['type'] : null; 

    $args_p = array (
		'post_type' => 'product', 
		'post_id' => get_the_ID(), 
	    'number' => '10',
		'parent' => 0,
	    'offset' => $offset,
		'status' => 'approve',
	);

	if (!empty($image)) {
	    $args_p['meta_key'] = 'thu_vien_anh';
	    $args_p['meta_query'] =  array(
	        'relation' => 'AND',
	        array(
	            'key' => 'thu_vien_anh',
	            'compare' => 'EXISTS',
	        ),
	        array(
	            'key' => 'thu_vien_anh',
	            'value' => array(''),
	            'compare' => 'NOT IN',
	        )
	    );
	}

	if ($star < 100) {
	    $args_p['meta_key'] = 'star';
	    $args_p['meta_query'] =  array(
	        array(
	            'key' => 'star',
	            'value' => $star,
	        ),
	    );
	}

	$comments = get_comments( $args_p ); 
    if( count($comments) ) {
    foreach ($comments as $key => $value) { ?>
    	<div class="item-vote">
            <div class="user-vote">
                <div class="avr"><img src="<?php the_field('anh_user', 'comment_'.$value->comment_ID); ?>" onerror="this.onerror=null;this.src='<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/vote-user.png';" class="img-fluid"></div>
                <div class="star">
                	<?php 
						for ($i = 1; $i <= esc_attr( get_field('star', 'comment_'.$value->comment_ID) ) ; $i++) {
							echo ' <img src="'.get_bloginfo( 'stylesheet_directory' ).'/assets/images/star.png" class="img-fluid">';
						}
						if (esc_attr( get_field('star', 'comment_'.$value->comment_ID) ) > 0) {
							for ($i = 1; $i <= 5 - esc_attr( get_field('star', 'comment_'.$value->comment_ID) ) ; $i++) {
								echo '<img src="'.get_bloginfo( 'stylesheet_directory' ).'/assets/images/star-o.png" class="img-fluid">';
							}
						}
		            ?>
                </div>
                <div class="name"><?= $value->comment_author; ?></div>
                <p><?php the_field('dia_chi', 'comment_'.$value->comment_ID); ?></p>
            </div>
            <div class="content-star">
                <div class="date"><?= date('d/m/Y', $timestamp); ?></div>
                <div class="desc">
                    <?= $value->comment_content; ?>
                </div>
                <div class="gall-vote">
                	<?php 
                	$datacmt = get_field('thu_vien_anh', 'comment_'.$value->comment_ID);
                	foreach ($datacmt ?? [] as $cmt) {
                	?>
                    <img src="<?= $cmt; ?>" class="img-fluid">
                	<?php 
                	}
                	?>
                </div>
            </div>
            <div class="quess-vote">
                <ul>
                    <li><span>Đánh giá hữu ích?</span></li>
                    <li><a href="">Có</a></li>
                    <li><a href="">Không</a></li>
                </ul>
            </div>
        </div>
    <?php 
	}
	}else{
		echo 'end';
	}
	wp_reset_postdata();
	die(); 
}