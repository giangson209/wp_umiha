<?php /* Template Name: Question */ ?>
<?php get_header(); ?>
<main>
    <section class="box-banner-bread">
        <div class="avarta-bread"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/bn-3.png" class="img-fluid w-100" alt=""></div>
        <div class="caption-bread text-center">
            <div class="container">
                <h1>Hỏi đáp thường gặp</h1>
            </div>
        </div>
    </section>
    <section class="box-faq">
        <div class="container">
            <div class="title-faq text-center text-uppercase"><?php the_title(); ?></div>
            <div class="tab-blog">
                <ul>
                    <li><a href="javascript:void(0)" data-tab="tab-1" class="clc-tab active"><?php the_field('tieu_de_1') ?></a></li>
                    <li><a href="javascript:void(0)" data-tab="tab-2" class="clc-tab"><?php the_field('tieu_de_2') ?></a></li>
                    <li><a href="javascript:void(0)" data-tab="tab-3" class="clc-tab"><?php the_field('tieu_de_3') ?></a></li>
                </ul>
            </div>
            <div class="content-blog">
                <div class="tab-content active" id="tab-1">
                    <div class="content-faq">
                        <div class="list-faq">
                            <?php while ( has_sub_field('danh_sach_1') ) : ?>
                            <div class="item-faq">
                                <div class="head-faq">
                                    <?php the_sub_field('cau_hoi') ?>
                                    <div class="icon">
                                        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5176 13.9606L1.01758 7.89844L11.5176 1.83626L11.5176 13.9606Z" stroke="#4F4F4F"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="answer">
                                    <?php the_sub_field('tra_loi') ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="tab-2">
                    <div class="content-faq">
                        <div class="list-faq">
                            <?php while ( has_sub_field('danh_sach_2') ) : ?>
                            <div class="item-faq">
                                <div class="head-faq">
                                    <?php the_sub_field('cau_hoi') ?>
                                    <div class="icon">
                                        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5176 13.9606L1.01758 7.89844L11.5176 1.83626L11.5176 13.9606Z" stroke="#4F4F4F"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="answer">
                                    <?php the_sub_field('tra_loi') ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-content" id="tab-3">
                    <div class="content-faq">
                        <div class="list-faq">
                            <?php while ( has_sub_field('danh_sach_3') ) : ?>
                            <div class="item-faq">
                                <div class="head-faq">
                                    <?php the_sub_field('cau_hoi') ?>
                                    <div class="icon">
                                        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.5176 13.9606L1.01758 7.89844L11.5176 1.83626L11.5176 13.9606Z" stroke="#4F4F4F"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="answer">
                                    <?php the_sub_field('tra_loi') ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php require_once("banner.php"); ?>
    <?php require_once("contact.php"); ?>
</main>
<?php get_footer(); ?>
