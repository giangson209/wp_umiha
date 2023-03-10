<?php /* Template Name: Home */ ?>
<?php get_header(); ?>
<main>
    <section class="box-banner text-center">
        <div class="content-banner-home">
            <div class="sllogan text-center"><img src="<?php the_field('anh_text','option') ?>" class="img-fluid"></div>
            <div class="slide-banner">
                <?php while ( has_sub_field('danh_sach') ) : ?>
                <div class="item-slide">
                    <div class="item-banner"><div class="avr"><a href="<?php the_sub_field('link') ?>"><img src="<?php the_sub_field('anh') ?>" class="img-fluid"></a></div></div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <section class="box-service">
        <div class="container">
            <div class="list-service">
                <div class="row">
                    <?php while ( has_sub_field('danh_sach_ud') ) : ?>
                    <div class="col-md-3">
                        <div class="item-service">
                            <div class="icon"><img src="<?php the_sub_field('icon') ?>" class="img-fluid" alt="<?php the_sub_field('tieu_de') ?>"></div>
                            <div class="info">
                                <h3><?php the_sub_field('tieu_de') ?></h3>
                                <div class="desc"><?php the_sub_field('mo_ta') ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="box-product-cate">
        <div class="container">
            <div class="title text-center">
                <h2>Các dòng sản phẩm</h2>
            </div>
            <div class="list-prd-cate">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <div class="list-cate-prd">
                            <ul>
                                <?php
                                    $terms = get_terms('product_cat', array('orderby' => 'slug', 'hide_empty' => false, 'parent' => 0)); 
                                    foreach ($terms as $key => $term) {
                                ?>
                                <li class="c-color"><a href="javascript:void(0)" data-tab="prd-<?= $term->term_id; ?>" data-color="<?= get_field('mau_nen_trang_chu','product_cat_'.$term->term_id); ?>" class="clc-prd <?= $key == 0 ? 'active' : ''; ?>"><?= $term->name; ?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <?php
                            foreach ($terms as $key => $term) {
                        ?>
                        <div class="avr-cate <?= $key == 0 ? 'active' : ''; ?> text-center" id="prd-<?= $term->term_id; ?>"><img src="<?= get_field('anh_san_pham_noi_bat','product_cat_'.$term->term_id); ?>" class="img-fluid" alt="<?= $term->name; ?>"></div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-3">
                        <?php
                            foreach ($terms as $key => $term) {
                        ?>
                        <div class="txt-prd-cate <?= $key == 0 ? '' : 'd-none'; ?>" data-id="prd-<?= $term->term_id; ?>">
                            <h4><?= get_field('slogan','product_cat_'.$term->term_id); ?></h4>
                            <div class="desc">
                                <?= $term->description; ?>
                            </div>
                            <div class="btn-main"><a href="<?= get_term_link( $term ); ?>">XEM THÊM</a></div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-banner-sale">
        <div class="container">
            <div class="content-banner-sale">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="txt-sale">
                            <h3 class="text-uppercase">
<!--                                --><?//= nl2br(get_field('tieu_de')); ?><!-- -->
                                bột than <br>hoạt tính
                            </h3>
                            <div class="btn-main"><a href="<?php the_field('link') ?>">XEM THÊM</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="avr"><img src="<?php the_field('banner') ?>" class="img-fluid"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="slogan"><img src="<?php the_field('anh_text','option') ?>" class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-stories">
        <div class="container">
            <div class="title text-center text-uppercase ">
                <h2><?php the_field('tieu_de') ?></h2>
            </div>
            <div class="slide-stories">
                <?php $i = 1; ?>
                <?php while ( has_sub_field('danh_sach_cc') ) : ?>
                <div class="item-slide">
                    <div class="item-stories text-center">
                        <div class="avarta"><img src="<?php the_sub_field('anh') ?>" class="img-fluid" alt="<?php the_sub_field('tieu_de') ?>"></div>
                        <div class="info">
                            <h5><?= $i; ?>. <?php the_sub_field('tieu_de') ?></h5>
                            <div class="desc">
                                <?php the_sub_field('mo_ta') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <section class="box-product-hot">
        <div class="container">
            <div class="title text-center">
                <h2>Sản phẩm bán chạy</h2>
            </div>
            <div class="slide-prd-hot">
                <?php
                $query = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'posts_per_page' => 6,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
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
    </section>
    <section class="box-review">
        <div class="container">
            <div class="title text-center">
                <h2>UMIHA’s review</h2>
            </div>
            <div class="tab-review text-center">
                <ul>
                    <li><a href="javascript:void(0)" class="clc-tab" data-tab="tab-1">Báo chí</a></li>
                    <li><a href="javascript:void(0)" class="clc-tab" data-tab="tab-2">Tiktok</a></li>
                    <li><a href="javascript:void(0)" class="clc-tab" data-tab="tab-3">Youtube</a></li>
                </ul>
            </div>
        </div>
        <div class="content-review">
            <div class="tab-content active" id="tab-1">
                <div class="slide-review">
                    <?php while ( has_sub_field('video_bao_chi') ) : ?>
                        <div class="item-slide">
                            <div class="item-review">
                                <div class="avarta">
                                    <a href="<?php the_sub_field('link') ?>"><img src="<?php the_sub_field('anh') ?>" class="img-fluid w-100" alt="<?php the_sub_field('tieu_de') ?>"></a>
                                    <div class="info text-center">
                                        <h6><?php the_sub_field('tieu_de') ?></h6>
                                        <p><?php the_sub_field('view') ?></p>
                                    </div>
                                </div>
                                <div class="view-sp"><a href="<?php the_sub_field('link_san_pham') ?>">Xem Sản phẩm được đánh giá</a></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="tab-content" id="tab-2">
                <div class="slide-review">
                    <?php while ( has_sub_field('video_tiktok') ) : ?>
                        <div class="item-slide">
                            <div class="item-review">
                                <div class="avarta">
                                    <a href="<?php the_sub_field('link') ?>"><img src="<?php the_sub_field('anh') ?>" class="img-fluid w-100" alt="<?php the_sub_field('tieu_de') ?>"></a>
                                    <div class="info text-center">
                                        <h6><?php the_sub_field('tieu_de') ?></h6>
                                        <p><?php the_sub_field('view') ?></p>
                                    </div>
                                </div>
                                <div class="view-sp"><a href="<?php the_sub_field('link_san_pham') ?>">Xem Sản phẩm được đánh giá</a></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <div class="tab-content" id="tab-3">
                <div class="slide-review">
                    <?php while ( has_sub_field('video_youtube') ) : ?>
                        <div class="item-slide">
                            <div class="item-review">
                                <div class="avarta">
                                    <a href="<?php the_sub_field('link') ?>"><img src="<?php the_sub_field('anh') ?>" class="img-fluid w-100" alt="<?php the_sub_field('tieu_de') ?>"></a>
                                    <div class="info text-center">
                                        <h6><?php the_sub_field('tieu_de') ?></h6>
                                        <p><?php the_sub_field('view') ?></p>
                                    </div>
                                </div>
                                <div class="view-sp"><a href="<?php the_sub_field('link_san_pham') ?>">Xem Sản phẩm được đánh giá</a></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="box-blog">
        <div class="container">
            <div class="title text-center">
                <h2>UMIHA’s Blog</h2>
            </div>
            <div class="slide-blog">
                <?php 
                $list_pro = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 4,
                    'order'          => 'DESC',
                );
                $pro = new WP_Query( $list_pro );
                if ( $pro->have_posts() ) : ?>
                <?php while ( $pro->have_posts() ) : $pro->the_post(); ?> 
                <div class="item-slide">
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
                <?php endwhile; ?>
                <?php endif; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php require_once("contact.php"); ?>
</main>
<?php get_footer(); ?>
<script>
    $('.slide-prd-hot').slick({
        autoplay:true,
        arrow:false,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        nextArrow: '<a href="javascript:void(0)" class="arr-next"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/arrow-circle-right.png" class="img-fluid" alt=""></a>',
        prevArrow: '<a href="javascript:void(0)" class="arr-prev"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/arrow-circle-left.png" class="img-fluid" alt=""></a>',
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
        ],
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
</script>
