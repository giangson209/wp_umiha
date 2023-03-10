<?php /* Template Name: Products */ ?>
<?php

get_header();
?>
<main>
    <div class="div">
        <?php
            $terms = get_terms('product_cat', array('orderby' => 'slug', 'hide_empty' => false, 'parent' => 0)); 
            foreach ($terms as $term) {
        ?>
        <section class="box-product">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="txt-content-prd">
                            <h4><?= $term->name; ?></h4>
                            <div class="desc"><?= $term->description; ?></div>
                            <div class="view-more"><a href="<?= get_term_link($term); ?>">Xem thêm</a></div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="slide-prd-hot">
                            <?php
                            $query = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'posts_per_page' => 6,
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
                                        <?php 
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
                                        ?>
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
        <?php
            }
        ?>
    </div>
    <?php require_once("contact.php"); ?>
</main>

<?php
get_footer();
?>

<script>
    $('.slide-prd-hot').slick({
        autoplay:true,
        arrow:false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        nextArrow: '',
        prevArrow: '',
        responsive: [
            {
                breakpoint: 1023,
                settings: {
                    slidesToShow: 2,
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

