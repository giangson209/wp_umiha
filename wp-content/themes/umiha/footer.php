<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package umiha
 */

?>

<footer>
    <div class="fter-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 f-top-3">
                    <div class="logo text-center">
                        <a href="/">
                            <img src="<?php the_field('logo','option'); ?>"> 
                        </a>
                    </div>
                </div>
                <div class="col-md-9 f-top-9">
                    <div class="fter-right">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="item-fter">
                                    <div class="t-fter">Giới thiệu về Umiha</div>
                                    <div class="link-fter">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'footer1',
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="item-fter">
                                    <div class="t-fter">Hướng dẫn mua hàng</div>
                                    <div class="link-fter">
                                        <?php
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'footer2',
                                            )
                                        );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="item-fter">
                                    <div class="t-fter"><?= nl2br(get_field('ten_cong_ty','option')); ?></div>
                                    <div class="link-fter">
                                        <ul>
                                            <li>
                                                <label>Địa chỉ: </label>
                                                <p><?php the_field('dia_chi','option'); ?></p>
                                            </li>
                                            <li>
                                                <label>GPĐKKD <span>số 000000000 do </span> </label>
                                                <p>Sở KHĐT Tp.Hà Nội cấp 09/04/2020</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="item-fter fter-regis">
                                    <div class="t-fter">Đăng ký hợp tác - phân phối</div>
                                    <div class="desc-fter">Trở thành đối tác đối tác độc quyền của UMIHA ngay!</div>
                                    <div class="btnmain"><a href="lien-he">Đăng ký</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fter-bottom text-uppercase text-center">
        <div class="container">
            <div class="list-info">
                <div class="item-info-bot">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer3',
                        )
                    );
                    ?>
                </div>
                <div class="item-info-bot">
                    <ul>
                        <li><span>Mua hàng</span></li>
                        <?php while ( has_sub_field('mua_hang','option') ) : ?>
                        <li><a href="<?php the_sub_field('link') ?>" target="_blank"><img src="<?php the_sub_field('image') ?>" class="img-fluid" alt=""></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="item-info-bot">
                    <ul>
                        <li><span>Mạng xã hội</span></li>
                        <?php while ( has_sub_field('mang_xa_hoi','option') ) : ?>
                        <li><a href="<?php the_sub_field('link') ?>" target="_blank"><img src="<?php the_sub_field('image') ?>" class="img-fluid" alt=""></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="item-info-bot">
                    <ul>
                        <li><a href="<?php the_field('link_bct','option') ?>" target="_blank"><img src="<?php the_field('bo_cong_thuong','option') ?>" class="img-fluid"></a></li>
                        <li>©  2022 UMIHA. <br>All Rights Reserved.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/lib/slick.min.js"></script> 
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/tags.js"></script> 
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/private.js"></script> 
<!-- <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/custom.js"></script>  -->
<?php wp_footer(); ?>

</body>
</html>
