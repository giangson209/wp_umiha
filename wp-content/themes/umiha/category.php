<?php
$cat = get_queried_object();
get_header();
if ($cat->parent == 0) {
?>
<main>
    <section class="box-banner-bread">
        <div class="avarta-bread"><img src="<?= get_field('banner', $cat); ?>" class="img-fluid w-100" alt="<?= $cat->name; ?>"></div>
        <div class="caption-bread text-center">
            <div class="container">
                <h1><?= $cat->name; ?></h1>
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
                        'parent' => $cat->term_id,
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
                    </div>
                </div>
                <?php
                foreach( $categories as $key => $category ) { 
                ?>
                <div class="tab-content" id="tab-<?= $category->term_id;  ?>">
                    <div class="slide-news">
                        <div class="row">
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
    <?php require_once("templates/banner.php"); ?>
    <?php require_once("templates/contact.php"); ?>
</main>
<?php
}else{
?>
<main>
    <section class="box-banner-bread">
        <div class="avarta-bread"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/bn-2.png" class="img-fluid w-100" alt=""></div>
        <div class="caption-bread text-center">
            <div class="container">
                <h1><?= $cat->name; ?></h1>
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
                        'parent' => $cat->parent,
                        'orderby' => 'ID', 
                        'hide_empty' => false, 
                    ) ); 
                    foreach( $categories as $key => $category ) { 
                    ?>
                    <li>
                        <a href="<?= get_term_link( $category ); ?>" class="clc-tab <?= $cat->term_id == $category->term_id ? 'active' : '';  ?>"><?= $category->name ?></a>
                    </li>
                    <?php }  ?>
                </ul>
            </div>
            <div class="content-blog">
                <div class="tab-content active" id="tab-<?= $cat->term_id;  ?>">
                    <div class="slide-news">
                        <div class="row data-render">
                            <?php 
                            $list_pro = array(
                                'post_type'      => 'post',
                                'posts_per_page' => 6,
                                'cat'            => $cat->term_id,
                                'paged'          => $_GET['in'] ? $_GET['in'] : 1,
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
                    <div class="pagination clearfix">
                        <?php
                            $total_pages = $pro->max_num_pages;
                            if ($total_pages > 1){
                                $current_page = max(1, $_GET['in']);
                                echo paginate_links(array(
                                    'format' => '?in=%#%',
                                    'current' => $current_page,
                                    'aria_current' => 'page',
                                    'total' => $total_pages,
                                    'prev_text'=>'&#8592;',
                                    'next_text'=>'&#8594;',
                                ));  
                            }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <?php require_once("templates/banner.php"); ?>
    <?php require_once("templates/contact.php"); ?>
</main>  
<?php
}
get_footer();
?>
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