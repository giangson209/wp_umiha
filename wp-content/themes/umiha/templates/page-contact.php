<?php /* Template Name: Contact */ ?>
<?php get_header(); ?>
<main>
    <section class="box-contact">
        <div class="container">
            <div class="content-contact">
                <div class="row">
                    <div class="col-md-6">
                        <div class="avarta"><img src="<?php the_field('anh'); ?>" class="img-fluid w-100" alt=""></div>
                    </div>
                    <div class="col-md-6">
                        <div class="content-txt-contact">
                            <div class="side-contact">
                                <div class="txt-contact">
                                    <?php the_field('mo_tả'); ?>
                                </div>
                                <div class="frm-contact">
                                    <div class="t-head"><?php the_title(); ?></div>
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
