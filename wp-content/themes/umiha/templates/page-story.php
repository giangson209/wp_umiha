<?php /* Template Name: Story */ ?>
<?php get_header(); ?>
<main>
    <section class="box-about">
        <div class="container">
            <div class="caption-about">
                <div class="row">
                    <div class="col-md-3">
                        <div class="title-caption"><?php the_field('tieu_de') ?></div>
                    </div>
                    <div class="col-md-3">
                        <div class="txt-caption">
                            <?php the_field('noi_dung') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-trip">
        <div class="container">
            <div class="title text-uppercase text-center">
                <h2><?php the_field('tieu_de_2') ?></h2>
            </div>
            <div class="slide-trip">
                <?php while ( has_sub_field('danh_sach') ) : ?>
                <div class="item-slide">
                    <div class="item-trip text-center">
                        <div class="top"><?= nl2br(get_sub_field('tieu_de')) ?></div>
                        <div class="year"><?php the_sub_field('nam') ?></div>
                        <div class="bot"><?php the_sub_field('mo_ta') ?></div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <section class="box-value">
        <div class="container">
            <div class="content-giatri">
                <div class="title text-uppercase mb-0">
                    <h2><?php the_field('tieu_de_3') ?></h2>
                </div>
                <div class="wrap-value">
                    <div class="desc-value">
                        <?php the_field('mo_ta') ?>
                    </div>
                    <div class="list-giatri">
                        <?php while ( has_sub_field('danh_sach_bai') ) : ?>
                        <div class="item-giatri">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="txt-gtri">
                                        <div class="t-giatri"><?php the_sub_field('tieu_de') ?></div>
                                        <div class="desc"><?php the_sub_field('mo_ta') ?></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="avarta"><img src="<?php the_sub_field('ảnh') ?>" class="img-fluid w-100" alt="<?php the_sub_field('tieu_de') ?>"></div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-contact">
        <div class="container">
            <div class="content-contact">
                <div class="row">
                    <div class="col-md-6">
                        <div class="avarta"><img src="<?php the_field('banner_4') ?>" class="img-fluid w-100" alt=""></div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-txt-contact">
                            <div class="side-contact">
                                <div class="txt-contact">
                                    <?php the_field('content_4') ?>
                                </div>
                                <div class="frm-contact">
                                    <div class="t-head">Liên hệ chúng tôi</div>
                                    <div class="list-frm">
                                        <?= do_shortcode('[contact-form-7 id="175" title="Contact"]'); ?>
                                    </div>
                                </div>
                            </div>
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
