<?php
$se = get_query_var('s') ? get_query_var('s') : '';
global $wpdb; 
$table = $wpdb->prefix . 'posts'; 
$sql = "SELECT * FROM {$table} WHERE `post_type` = 'product' AND ( `post_title`  LIKE '%$se%') ";
$data = $wpdb->get_results( $sql, ARRAY_A);
$post_id = array(0);
if ( $data ) {
	foreach($data as $val) {
		$post_id[] = $val['ID'];
	}
}

$query = array(
	'post__in'       => $post_id,
    'post_type' 	 => 'product',
    'post_status'	 => 'publish',
    'posts_per_page' => 1,
    'order'			 => 'DESC',
    'paged' 		 => isset($_GET['page']) ? $_GET['page'] : 1,
);
get_header();
?>
<main>
    <section class="box-about bn-prd-1">
        <div class="container">
            <div class="caption-about">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="title-caption">Tìm kiếm: <?= $se; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="div">
        <section class="box-product">
            <div class="container">
                <div class="row align-items-center">
                    <?php $the_query = new wp_query($query); ?>
                    <?php if( $the_query->have_posts() ): ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-md-3">
                        <div class="item-slide">
                            <div class="item-prd text-center">
                                <div class="avarta">
                                    <?php  
                                        $attachment_ids = $product->get_gallery_image_ids();
                                        if ( is_array( $attachment_ids ) && !empty($attachment_ids) ) {
                                            $first_image_url = wp_get_attachment_url( $attachment_ids[0] );
                                        }else{
                                            $first_image_url = get_the_post_thumbnail_url();
                                        }
                                    ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php the_post_thumbnail_url() ?>" class="img-fluid w-100 hide-hver" alt="<?php the_title(); ?>">
                                        <img src="<?= $first_image_url; ?>" class="img-fluid w-100 show-hver" alt="<?php the_title(); ?>">
                                        <?= add_percentage_to_sale_badge($product) === '' ? '' : '<span>'.add_percentage_to_sale_badge($product).'</span>'; ?>
                                    </a>
                                    <div class="icon-eye"><a href="<?php the_permalink(); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/eye.png" class="img-fluid" alt="<?php the_title(); ?>"></a></div>
                                </div>
                                <div class="info">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php 
                                        if ( $product->is_type( 'variable'  )) :
                                            $attr = get_post_meta($post->ID, '_product_attributes', true);
                                            echo $attr['dung-tich']['value'];
                                        endif; 
                                        ?>
                                    </ul>
                                    <div class="price">
                                        <?= $product->get_price_html(); ?>
                                    </div>
                                </div>
                                <div class="btn-add-cart" data-id="<?= get_the_ID(); ?>">
                                    <a href="javascript:void(0)">Cho 1 vào giỏ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; wp_reset_postdata(); ?>
                    <div class="pagination-prd">
						<?php
                            $total_pages = $the_query->max_num_pages;
                            if ($total_pages > 1){
                                $current_page = max(1, get_query_var('page'));
                                echo paginate_links(array(
                                    'base' => add_query_arg( 'page', '%#%' ),
                                    'total' => $total_pages,
                                    'prev_text'    => '<i class="fa fa-angle-left"></i>',
                                    'next_text'    => '<i class="fa fa-angle-right"></i>',
                                    'current' => $current_page,
                                    'type' => 'list'
                                ));
                            }
                        ?>
					</div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once(get_stylesheet_directory()."/templates/contact.php"); ?>
</main>

<?php
get_footer();
