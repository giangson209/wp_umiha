<?php /* Template Name: News */ ?>
<?php get_header(); ?>
<main>
    <section class="box-banner-bread">
        <div class="avarta-bread"><img src="<?= get_field('banner'); ?>" class="img-fluid w-100" alt="Blog"></div>
        <div class="caption-bread text-center">
            <div class="container">
                <h1>Blog</h1>
            </div>
        </div>
    </section>
    <section class="box-tab-blog">
        <div class="container">
            <div class="tab-blog">
                <ul>
                    <?php
                    $categories = get_categories( array(
                        'taxonomy' => 'category',   
                        'parent' => 0,
                        'orderby' => 'ID', 
                        'hide_empty' => false, 
                    ) ); 
                    foreach( $categories as $key => $category ) { 
                    ?>
                    <li>
                        <a href="javascript:void(0)" data-tab="tab-<?= $category->term_id;  ?>" class="clc-tab"><?= $category->name ?></a>
                    </li>
                    <?php }  ?>
                </ul>
            </div>
            <div class="content-blog">
                <div class="tab-content active" id="tab-0">
                    <div class="slide-news">
                        <div class="row data-render">
                            <?php 
                            $list_pro = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 6,
                                'order'          => 'DESC',
                            );
                            $pro = new WP_Query( $list_pro );
                            if ( $pro->have_posts() ) : ?>
                            <?php while ( $pro->have_posts() ) : $pro->the_post(); ?> 
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
                            <?php endwhile; ?>
                            <?php endif; wp_reset_postdata(); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                            	<div class="load-more" data-id="0" data-offset="6">
                            		<button class="load-more-btn">Xem thêm</button>
                            	</div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                foreach( $categories as $key => $category ) { 
                ?>
                <div class="tab-content" id="tab-<?= $category->term_id;  ?>">
                    <div class="slide-news">
                        <div class="row data-render">
                            <?php 
                            $list_pro = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 6,
                                'cat'            => $category->term_id,
                                'order'          => 'DESC',
                            );
                            $pro = new WP_Query( $list_pro );
                            if ( $pro->have_posts() ) : ?>
                            <?php while ( $pro->have_posts() ) : $pro->the_post(); ?> 
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
                            <?php endwhile; ?>
                            <?php endif; wp_reset_postdata(); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                            	<div class="load-more" data-id="<?= $category->term_id; ?>" data-offset="6">
                            		<button class="load-more-btn">Xem thêm</button>
                            	</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }  ?>
            </div>
        </div>
    </section>
    <?php require_once("banner.php"); ?>
    <?php require_once("contact.php"); ?>
</main>
<?php get_footer(); ?>
<script type="text/javascript">
	$('.load-more').click(function () {
    	$.ajax({ 
            type : "post", 
            dataType : "html", 
            async: false,
            url : '<?php echo admin_url('admin-ajax.php');?>', 
            data : {
                action: "loadmore",
                offset: $('.content-blog .active .load-more').attr('data-offset'),
                id: $(this).data('id'),
            },
            success: function(response) {
            	if (response != 'end') {
                    $('.content-blog .active .data-render').append(response);
                	$('.content-blog .active .load-more').attr('data-offset',$('.content-blog .active .load-more').data('offset') + 3);
                }else{
                    $('.content-blog .active .load-more').addClass('d-none');
                }
            },
            error: function( jqXHR, textStatus, errorThrown ){
                console.log( 'The following error occured: ' + textStatus, errorThrown );
            }
       });
	});
</script>