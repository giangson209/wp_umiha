<?php 
$product = wc_get_product( get_the_ID() );
$args_p = array (
	'post_type' => 'product', 
	'post_id' => get_the_ID(), 
    'number' => '10',
	'parent' => 0,
	'status' => 'approve',
);

if (isset($_GET['type']) && $_GET['type'] == 'image') {
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

if (isset($_GET['star-vote'])) {
    $args_p['meta_key'] = 'star';
    $args_p['meta_query'] =  array(
        array(
            'key' => 'star',
            'value' => $_GET['star-vote'],
        ),
    );
}

$comments = get_comments( $args_p ); 

get_header(); 
?>
<main>
    <section class="box-preview">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="slide-preview">
                        <div class="slide-thumbs">
                        	<?php
						    $attachment_ids = $product->get_gallery_image_ids();
						    foreach( $attachment_ids as $attachment_id ) {
					        ?>
                            <div class="item-slide">
                                <div class="item-prw"><img src="<?= wp_get_attachment_url( $attachment_id ); ?>" class="img-fluid w-100" alt="<?php the_title(); ?>"></div>
                            </div>
                            <?php
                            }
					        ?>
                        </div>
                        <div class="slide-nav">
                        	<?php
						    foreach( $attachment_ids as $attachment_id ) {
					        ?>
                            <div class="item-slide">
                                <div class="item-nav">
                                	<!-- <a href="<?= wp_get_attachment_url( $attachment_id ); ?>" data-fancybox="oto-new-2"> -->
                                		<img src="<?= wp_get_attachment_url( $attachment_id ); ?>" class="img-fluid w-100" alt="<?php the_title(); ?>">
                                	<!-- </a> -->
                                </div>
                            </div>
                            <?php
                            }
					        ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-previe">
                        <h1>Xịt dưỡng tóc</h1>
                        <div class="star-vote">
                            <ul>
                                <li>
                                    <svg width="140" height="21" viewBox="0 0 140 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 0.5L12.2451 7.40983H19.5106L13.6327 11.6803L15.8779 18.5902L10 14.3197L4.12215 18.5902L6.36729 11.6803L0.489435 7.40983H7.75486L10 0.5Z" fill="#DCB47F"/>
                                        <path d="M40 0.5L42.2451 7.40983H49.5106L43.6327 11.6803L45.8779 18.5902L40 14.3197L34.1221 18.5902L36.3673 11.6803L30.4894 7.40983H37.7549L40 0.5Z" fill="#DCB47F"/>
                                        <path d="M70 0.5L72.2451 7.40983H79.5106L73.6327 11.6803L75.8779 18.5902L70 14.3197L64.1221 18.5902L66.3673 11.6803L60.4894 7.40983H67.7549L70 0.5Z" fill="#DCB47F"/>
                                        <path d="M100 0.5L102.245 7.40983H109.511L103.633 11.6803L105.878 18.5902L100 14.3197L94.1221 18.5902L96.3673 11.6803L90.4894 7.40983H97.7549L100 0.5Z" fill="#DCB47F"/>
                                        <path d="M130 2.11804L131.77 7.56434L131.882 7.90983H132.245H137.972L133.339 11.2758L133.045 11.4894L133.157 11.8348L134.927 17.2812L130.294 13.9152L130 13.7016L129.706 13.9152L125.073 17.2812L126.843 11.8348L126.955 11.4894L126.661 11.2758L122.028 7.90983H127.755H128.118L128.23 7.56434L130 2.11804Z" stroke="#455154"/>
                                    </svg>
                                </li>
                                <li><a href=""><?= $product->get_review_count(); ?> người đánh giá</a></li>
                                <li><span><?php the_field('so_san_pham_da_ban');?> Đã bán</span></li>
                            </ul>
                        </div>
                        <div class="congd">
                            <p><?php the_field('slogan');?></p>
                        </div>
                        <div class="price">
                        	<?= $product->get_price_html(); ?>
                        </div>
                        <div class="desc">
                            <p><?php the_excerpt(); ?></p>
                        </div>
                        <div class="dungtich">
                            <span>Dung tích</span>
                            <div class="list-dt">
                        	<?php 
                            if ( $product->is_type( 'variable'  )) :
                                $attr = $product->get_available_variations();
								foreach ( $attr as $k => $at ) {
                            ?>
                                <div class="i-dt">
                                    <input type="radio" id="dt-<?= $k;?>" class="chck-rad" name="dt" data-price_html="<?= htmlentities($at['price_html']); ?>" value="<?= $at['variation_id']; ?>"> 
                                    <!-- <?= $k == 0 ? 'checked' : ''; ?> -->
                                    <label for="dt-<?= $k;?>">
                                    	<?php 
                                    		$bienthe = '';
                                    		$count = count($at['attributes']);
                                    		$i = 0;
                                    		foreach ($at['attributes'] as $key => $value) {
                                    			$bienthe .= $i == 0 ? $value : ' / '.$value;
	                                    		$i++;
                                    		}
                                    		echo $bienthe;
                                    	?>
                                    </label>
                                </div>
                            <?php 
								} 
                            endif; 
                            ?>
                            </div>
                        </div>
                        <div class="addto-cart btn-add-cart" data-id="<?= get_the_ID(); ?>">
                            <div class="quantity">
                                <div class="number-spinner">
                                    <span class="ns-btn">
										<a href="javascript:void(0)" data-dir="dwn">
										  	<span class="icon-minus">
										      	<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
										          	<line x1="3" y1="16" x2="29" y2="16" stroke="#C1BCB4" stroke-width="2"/>
										      	</svg>
										  	</span>
										</a>
                                    </span>
                                    <label>
                                        Cho
                                        <input type="text" class="pl-ns-value" value="1" maxlength="2" readonly>
                                        vào giỏ
                                    </label>
                                    <span class="ns-btn">
									    <a href="javascript:void(0)" data-dir="up">
									        <span class="icon-plus">
									            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
									                <line x1="3" y1="17" x2="29" y2="17" stroke="#C1BCB4" stroke-width="2" />
									                <line x1="16" y1="4" x2="16" y2="30" stroke="#C1BCB4" stroke-width="2" />
									            </svg>
									        </span>
									    </a>
									</span>
                                </div>
                            </div>
                        </div>
                        <div class="item-info-prw">
                            <h3><?php the_field('tieu_dề_sản_phẩm_gợi_y');?></h3>
                            <p><?php the_field('mo_tả_sản_phẩm_gợi_y');?></p>
                        </div>
                        <div class="choose-info-prw">
                            <div class="list-choose">
                                <?php
                                global $post;
								$terms = get_the_terms( $post->ID, 'product_cat' );
								foreach ($terms as $term) {
								    $product_cat_id = $term->term_id;
								    break;
								}
				                $query = array(
				                    'post_type' => 'product',
				                    'post_status' => 'publish',
				                    'posts_per_page' => 3,
				                    'post__not_in' => array(get_the_ID()),
				                    'tax_query'      => array(
										array(
											'taxonomy' => 'product_cat',
											'field'    => 'term_id',
											'terms'    => $product_cat_id,
										),
									),
				                );
				                ?>
				                <?php $the_query = new wp_query($query); ?>
				                <?php if( $the_query->have_posts() ): ?>
				                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				                <div class="prd-choose">
                                    <div class="check-choose-add"><input type="checkbox" id="c-add-<?= get_the_ID(); ?>" value="<?= get_the_ID(); ?>"><label for="c-add-<?= get_the_ID(); ?>"></label></div>
                                    <div class="avr"><img src="<?php the_post_thumbnail_url() ?>" class="img-fluid w-100" alt="<?php the_title(); ?>"></div>
                                    <div class="info">
                                        <h4><?php the_title(); ?></h4>
                                        <div class="price">
                                            <?= $product->get_price_html(); ?>
                                        </div>
                                        <div class="link-more"><a href="<?php the_permalink(); ?>">Xem thêm</a></div>
                                    </div>
                                </div>
				                <?php endwhile; ?>
				                <?php endif; wp_reset_postdata(); ?>
                            </div>
                            <div class="add-cart-all text-center">
                                <a href="javascript:void(0)">Thêm hết vào giỏ</a>
                            </div>
                        </div>
                        <div class="question-prd">
                            <h3>Câu hỏi thường gặp</h3>
                            <div class="list-quess">
                                <?php while ( has_sub_field('danh_sach_cau_hoi') ) : ?>
                                <div class="item-quess">
                                    <div class="head-quess">
                                        <span><?php the_sub_field('cau_hỏi') ?></span>
                                        <svg width="12" height="14" viewBox="0 0 12 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5 13.0622L1 7L11.5 0.937824L11.5 13.0622Z" stroke="#4F4F4F"/>
                                        </svg>
                                    </div>
                                    <div class="answer"><?php the_sub_field('tra_loi') ?></div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-detail">
        <div class="container">
            <div class="content-detail">
                <div class="txt-content-prd mw-100 text-center text-uppercase">
                    <h2>Chi tiết Sản phẩm</h2>
                </div>
                <div class="detail">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="box-review">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="txt-content-prd w-100 mw-100">
                        <h2 class="text-uppercase">Đánh giá từ khách hàng</h2>
                        <div class="star-vote">
                        	<?php 
								for ($j = 1; $j <= 5; $j++) {
									echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="22" viewBox="0 0 24 22" fill="none">
									<path d="M12.286 0.257812L14.9641 8.50025H23.6307L16.6193 13.5944L19.2974 21.8368L12.286 16.7427L5.27456 21.8368L7.95269 13.5944L0.941248 8.50025H9.60786L12.286 0.257812Z" fill="#455154"/>
									</svg>';
								}
				            ?>
                        </div>
                        <div class="total-vote">Dựa trên <?= $product->get_review_count(); ?> đánh giá</div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="tab-vote">
                        <ul>
                            <li><a href="<?php the_permalink(); ?>">Tất cả(<?= $product->get_review_count(); ?>)</a></li>
                            <li><a href="?star-vote=5">5 Sao (<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 5,),),))); ?>)</a></li>
                            <li><a href="?star-vote=4">4 Sao (<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 4,),),))); ?>)</a></li>
                            <li><a href="?star-vote=3">3 Sao (<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 3,),),))); ?>)</a></li>
                            <li><a href="?star-vote=2">2 Sao (<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 2,),),))); ?>)</a></li>
                            <li><a href="?star-vote=1">1 Sao (<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 1,),),))); ?>)</a></li>
                            <li><a href="?star-vote=0">Có bình luận(<?= count(get_comments (array ('post_type' => 'product', 'post_id' => get_the_ID(), 'parent' => 0,'status' => 'approve','meta_key' => 'star','meta_query' => array(array('key' => 'star','value' => 0,),),))); ?>)</a></li>
                            <li><a href="?type=image">Có hình ảnh/Video(<?= count(get_comments (array ('post_id' => get_the_ID(),'status' => 'approve', 'meta_key' => 'thu_vien_anh','meta_query' => array('relation' => 'AND',array('key' => 'thu_vien_anh','compare' => 'EXISTS',),array('key' => 'thu_vien_anh','value' => array(''),'compare' => 'NOT IN',),),))); ?>)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="list-vote">
                        <?php 
			                foreach ($comments as $key => $value) {
			            ?>
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
		                ?>
                    </div>
                    <div class="all-vote text-center">
                        <a href="javascript:void(0)">Đọc thêm đánh giá</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="div">
        <section class="box-product">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="txt-content-prd">
                            <h4>Sản phẩm đã xem</h4>
                            <div class="view-more mt-2"><a href="san-pham">Xem thêm</a></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="slide-prd-hot">
                            <?php
                            global $woocommerce;
							$viewed_products = ! empty( $_COOKIE['woocommerce_recently_viewed'] ) ? (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] ) : array();
							$viewed_products = array_filter( array_map( 'absint', $viewed_products ) );
			                $query = array(
			                    'post_type' => 'product',
			                    'post_status' => 'publish',
                                'post__not_in' => array(get_the_ID()),
			                    'posts_per_page' => 6,
			                    'post__in'       => $viewed_products, 
			                );
			                ?>
			                <?php $the_query = new wp_query($query); ?>
			                <?php if( $the_query->have_posts() ): ?>
			                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
			                            <!-- <?php 
			                            if ( $product->is_type( 'variable'  )) :
			                            ?>
			                            <div class="btn-add-cart">
			                                <a href="<?= $product->add_to_cart_url(); ?>">Cho 1 vào giỏ</a>
			                            </div>  
			                            <?php 
			                            else :
			                            ?>
			                            <div class="btn-add-cart" data-id="<?= get_the_ID(); ?>">
			                                <a href="javascript:void(0)">Cho 1 vào giỏ</a>
			                            </div>
			                            <?php 
			                            endif; 
			                            ?> -->
			                            <div class="btn-add-cart" data-id="<?= get_the_ID(); ?>">
			                                <a href="javascript:void(0)">Cho 1 vào giỏ</a>
			                            </div>
			                        </div>
			                    </div>
			                <?php endwhile; ?>
			                <?php endif; wp_reset_postdata(); ?>
                        </div>
                        <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <span class="slider__label sr-only"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php require_once(get_stylesheet_directory()."/templates/contact.php"); ?>
    
</main>
<?php get_footer(); ?>
<script>
    $('.slide-prd-hot').slick({
        autoplay:true,
        arrow:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        nextArrow: '',
        prevArrow: '',
    });

    var $slider = $('.slide-prd-hot');
    var $progressBar = $('.progress');
    var $progressBarLabel = $( '.slider__label' );

    $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        var calc = ( (nextSlide) / (slick.slideCount-1) ) * 100;

        $progressBar
            .css('background-size', calc + '% 100%')
            .attr('aria-valuenow', calc );

        $progressBarLabel.css('width', calc + '% 100%');
    });
    var offset = 10;
    $('.all-vote').click(function () {
        $.ajax({ 
            type : "post", 
            dataType : "html", 
            async: false,
            url : '<?php echo admin_url('admin-ajax.php');?>', 
            data : {
                action: "loadmorecomment",
                offset: offset,
                star: '<?= $_GET['star-vote'] ?? 100; ?>',
                type: '<?= $_GET['type'] ?? 100; ?>',
            },
            success: function(response) {
                if (response != 'end') {
                    $('.list-vote').append(response);
                    offset = offset + 10;
                }else{
                    $('.all-vote').addClass('d-none');
                }
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
       });
    });
</script>
