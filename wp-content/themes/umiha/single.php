<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package umiha
 */

get_header();
?>

<main>
    <section class="blog-detail">
        <div class="container">
            <div class="content-detail-blog">
                <div class="bread-blog">
                    <ul>
                        <li><a href="/">Trang chủ</a></li>
                        <li><a href="">Blog</a></li>
                        <li><a href="javascript:void()"><?php the_title() ?></a></li>
                    </ul>
                </div>
                <div class="content-blog-detail">
                    <div class="content-detail">
                        <div class="detail">
                            <div class="detail-title-top">
                                <h1><?php the_title() ?></h1>
                                <div class="date-time">
                                    <ul>
                                        <li><?= get_the_date('d/m/Y'); ?></li>
                                        <li><?= the_author_meta( 'user_nicename', $post->post_author ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php
get_sidebar();
get_footer();
