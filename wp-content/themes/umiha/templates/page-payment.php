<?php /* Template Name: Payment */ ?>
<?php get_header(); ?>
<?php
$order_id = wc_get_order_id_by_order_key($_REQUEST['key']);
$order = wc_get_order($order_id);
if(isset($_REQUEST['key'])){
?>
<main>
    <section class="box-cart-cate">
        <div class="container">
            <div class="woocommerce-order">
                <div class="row">
                <?php
                if ( $order ) :

                    do_action( 'woocommerce_before_thankyou', $order->get_id() );
                    ?>
                    <div class="col-md-6">
                    <?php if ( $order->has_status( 'failed' ) ) : ?>

                        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

                        <p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
                            <a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
                            <?php if ( is_user_logged_in() ) : ?>
                                <a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
                            <?php endif; ?>
                        </p>

                    <?php else : ?>

                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

                        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                            <li class="woocommerce-order-overview__order order">
                                <?php esc_html_e( 'Order number:', 'woocommerce' ); ?>
                                <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                            </li>

                            <li class="woocommerce-order-overview__date date">
                                <?php esc_html_e( 'Date:', 'woocommerce' ); ?>
                                <strong><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                            </li>

                            <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                                <li class="woocommerce-order-overview__email email">
                                    <?php esc_html_e( 'Email:', 'woocommerce' ); ?>
                                    <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                                </li>
                            <?php endif; ?>

                            <li class="woocommerce-order-overview__total total">
                                <?php esc_html_e( 'Total:', 'woocommerce' ); ?>
                                <strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                            </li>

                            <?php if ( $order->get_payment_method_title() ) : ?>
                                <li class="woocommerce-order-overview__payment-method method">
                                    <?php esc_html_e( 'Payment method:', 'woocommerce' ); ?>
                                    <strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
                                </li>
                            <?php endif; ?>

                        </ul>

                    <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>
                    </div>
                <?php else : ?>
                    <div class="container">
                        <div class="text-center">
                            <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/images/404.jpg">
                        </div>
                    </div>
                <?php endif; ?>
                </div>

            </div>
        </div>
    </section>
</main>
<?php
}else{
?>
<main>
    <section class="box-payment">
        <div class="container">
            <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	            <div class="row justify-content-center">
	                <div class="col-md-6">
                    <?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
	                    <div class="form-payment">
	                        <div class="list-frm">
	                            <div class="item-frm-pay">
	                                <div class="row">
	                                    <div class="col-md-12">
	                                        <label>Thông tin cá nhân</label>
                                            <input type="text" class="txt_field" name="billing_first_name" placeholder="*Họ & tên" id="billing_first_name" required autocomplete="given-name" />
	                                    </div>
	                                    <div class="col-md-6">
                                            <input type="tel" class="txt_field" placeholder="*Số điện thoại" name="billing_phone" id="billing_phone" required autocomplete="tel" />
	                                    </div>
	                                    <div class="col-md-6">
                                            <input type="email" placeholder="Email" class="txt_field " name="billing_email" id="billing_email" required autocomplete="email" />
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="item-frm-pay">
	                                <div class="row">
	                                    <div class="col-md-12 mb-0">
	                                        <label>Địa chỉ giao hàng</label>
	                                    </div>
	                                    <div class="col-md-4">
	                                        <input type="text" placeholder="*Quận" class="txt_field" name="billing_city" id="billing_city" required >
	                                    </div>
	                                    <div class="col-md-4">
	                                        <input type="text" placeholder="Huyện" class="txt_field" name="billing_huyen" id="billing_huyen" required >
	                                    </div>
	                                    <div class="col-md-4">
	                                        <input type="text" placeholder="Phường/xã" class="txt_field"  name="billing_state" id="billing_state" required >
	                                    </div>
	                                    <div class="col-md-12">
	                                        <input type="text" placeholder="*Địa chỉ đầy đủ: Ví dụ: Số nhà 5, ngõ xx... " class="txt_field"  name="billing_address_1" id="billing_address_1" required >
	                                    </div>
	                                    <div class="col-md-12">
	                                        <input type="text" placeholder="Ghi chú giao hàng" class="txt_field" name="billing_note" id="billing_note">
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="item-frm-pay">
	                                <div class="row">
	                                    <div class="col-md-12 mb-0">
	                                        <label>Phương thức thanh toán</label>
	                                    </div>
	                                    <div class="col-md-12">
	                                    	<?php
			                                $gateways = WC()->payment_gateways->get_available_payment_gateways();
			                                $enabled_gateways = [];
			                                if( $gateways ) {
			                                    foreach( $gateways as $gateway ) {
			                                        if( $gateway->enabled == 'yes' ) {
			                                ?>
	                                        <?php
	                                            if( $gateway->id == 'bacs' ) {
	                                        ?>
	                                        <div class="item-method">
	                                            <input type="radio" id="1002" name="payment_method" class="method-rad" checked  value="<?= $gateway->id; ?>" >
	                                            <label for="1002">
	                                                <span class="icon">
	                                                    <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                                        <g clip-path="url(#clip0_1894_27661)">
	                                                        <path d="M7.02816 13.9507H5.8851C5.2795 13.9524 4.69921 14.179 4.27098 14.5811C3.84275 14.9832 3.60139 15.5281 3.59961 16.0968V17.1702C3.60139 17.7388 3.84275 18.2838 4.27098 18.6859C4.69921 19.088 5.2795 19.3146 5.8851 19.3163H7.02816C7.63376 19.3146 8.21406 19.088 8.64229 18.6859C9.07051 18.2838 9.31188 17.7388 9.31365 17.1702V16.0968C9.31204 15.5281 9.07073 14.9831 8.64246 14.5809C8.2142 14.1788 7.63381 13.9522 7.02816 13.9507ZM8.17121 17.1702C8.17041 17.4546 8.04972 17.7272 7.83553 17.9283C7.62134 18.1294 7.33107 18.2428 7.02816 18.2435H5.8851C5.58225 18.2426 5.29207 18.1292 5.07791 17.9281C4.86376 17.727 4.74302 17.4546 4.74205 17.1702V16.0968C4.74318 15.8125 4.86399 15.5402 5.07813 15.3392C5.29227 15.1382 5.58235 15.0249 5.8851 15.024H7.02816C7.33107 15.0248 7.62134 15.1381 7.83553 15.3393C8.04972 15.5404 8.17041 15.813 8.17121 16.0974V17.1702Z" fill="#464646"/>
	                                                        <path d="M11.5996 15.1313H24.4567V16.2047H11.5996V15.1313Z" fill="#464646"/>
	                                                        <path d="M11.5996 17.2778H21.5993V18.3512H11.5996V17.2778Z" fill="#464646"/>
	                                                        <path d="M29.1428 -0.000361087H6.85724C6.48099 -0.00381801 6.10778 0.0632219 5.75945 0.196836C5.41112 0.33045 5.09466 0.527955 4.8286 0.777795C4.56253 1.02764 4.3522 1.32479 4.20991 1.65188C4.06762 1.97897 3.99623 2.32942 3.99991 2.68273V3.75551H2.85686C2.48063 3.75205 2.10745 3.8191 1.75916 3.95272C1.41086 4.08634 1.09444 4.28385 0.828429 4.5337C0.562414 4.78355 0.352141 5.08071 0.209918 5.4078C0.0676953 5.73489 -0.00362181 6.08532 0.000141543 6.43861V19.3165C-0.00362181 19.6698 0.0676953 20.0203 0.209918 20.3474C0.352141 20.6744 0.562414 20.9716 0.828429 21.2215C1.09444 21.4713 1.41086 21.6688 1.75916 21.8024C2.10745 21.9361 2.48063 22.0031 2.85686 21.9996H25.1424C25.5187 22.0031 25.8919 21.9361 26.2402 21.8024C26.5886 21.6688 26.905 21.4713 27.1711 21.2215C27.4371 20.9716 27.6475 20.6745 27.7898 20.3474C27.932 20.0203 28.0034 19.6699 27.9998 19.3165V18.2432H29.1428C29.5191 18.2466 29.8923 18.1796 30.2406 18.046C30.5889 17.9124 30.9054 17.7149 31.1715 17.465C31.4375 17.2152 31.6478 16.918 31.7901 16.5909C31.9324 16.2639 32.0038 15.9134 32.0001 15.5601V2.68216C32.0037 2.3289 31.9323 1.97851 31.79 1.65148C31.6476 1.32446 31.4373 1.02737 31.1712 0.777594C30.9052 0.527815 30.5888 0.330362 30.2405 0.196783C29.8922 0.0632049 29.519 -0.00381679 29.1428 -0.000361087ZM2.85686 4.82887H25.1424C25.3687 4.82497 25.5935 4.86394 25.8033 4.94346C26.0132 5.02297 26.2038 5.1414 26.3639 5.29166C26.5239 5.44193 26.65 5.62094 26.7347 5.818C26.8194 6.01507 26.8609 6.22614 26.8567 6.43861V8.04835H1.14258V6.43861C1.13843 6.22614 1.17993 6.01507 1.26461 5.818C1.34929 5.62094 1.47541 5.44193 1.63543 5.29166C1.79545 5.1414 1.98609 5.02297 2.19595 4.94346C2.40581 4.86394 2.63059 4.82497 2.85686 4.82887ZM25.1424 20.9263H2.85686C2.63059 20.9302 2.40581 20.8912 2.19595 20.8117C1.98609 20.7322 1.79545 20.6138 1.63543 20.4635C1.47541 20.3132 1.34929 20.1342 1.26461 19.9371C1.17993 19.7401 1.13843 19.529 1.14258 19.3165V11.2678H26.8567V19.3165C26.8609 19.529 26.8194 19.7401 26.7347 19.9371C26.65 20.1342 26.5239 20.3132 26.3639 20.4635C26.2038 20.6138 26.0132 20.7322 25.8033 20.8117C25.5935 20.8912 25.3687 20.9302 25.1424 20.9263ZM30.8571 15.5601C30.8612 15.7726 30.8197 15.9836 30.7351 16.1807C30.6504 16.3778 30.5243 16.5568 30.3642 16.707C30.2042 16.8573 30.0136 16.9757 29.8037 17.0552C29.5939 17.1348 29.3691 17.1737 29.1428 17.1698H27.9998V6.43803C28.0034 6.08477 27.9319 5.73438 27.7896 5.40736C27.6472 5.08033 27.4369 4.78325 27.1708 4.53347C26.9048 4.28369 26.5884 4.08623 26.2401 3.95266C25.8918 3.81908 25.5186 3.75206 25.1424 3.75551H5.14297V2.68216C5.13881 2.46969 5.18032 2.25862 5.265 2.06155C5.34968 1.86449 5.4758 1.68548 5.63582 1.53521C5.79584 1.38495 5.98647 1.26652 6.19633 1.18701C6.4062 1.10749 6.63098 1.06852 6.85724 1.07242H29.1428C29.3691 1.06852 29.5939 1.10749 29.8037 1.18701C30.0136 1.26652 30.2042 1.38495 30.3642 1.53521C30.5243 1.68548 30.6504 1.86449 30.7351 2.06155C30.8197 2.25862 30.8612 2.46969 30.8571 2.68216V15.5601Z" fill="#464646"/>
	                                                        </g>
	                                                        <defs>
	                                                        <clipPath id="clip0_1894_27661">
	                                                        <rect width="32" height="22" fill="white"/>
	                                                        </clipPath>
	                                                        </defs>
	                                                    </svg>
	                                                </span>
	                                                <span>
	                                                    Thẻ ATM/Internet Banking <br>Chuyển khoản
	                                                    <p>Thông tin tài khoản thanh toán</p>
	                                                    <!-- <?php
	                                                    foreach ($gateway->account_details as $key => $way) {
	                                                    ?>
	                                                    <p>Chủ tài khoản: <?= $way['account_name']; ?></p>
	                                                    <p>Ngân hàng: <?= $way['sort_code']; ?> - <?= $way['sort_code']; ?></p>
	                                                    <p>Số tài khoản: <?= $way['account_number']; ?></p>
	                                                    <?php
	                                                    }
	                                                    ?> -->
	                                                </span>
	                                            </label>
	                                        </div>
	                                        <?php
	                                            }
	                                        ?>
	                                        <?php
	                                            if( $gateway->id == 'cod' ) {
	                                        ?>
	                                        <div class="item-method">
	                                            <input type="radio" id="1001" name="payment_method" class="method-rad"  value="<?= $gateway->id; ?>" >
	                                            <label for="1001">
	                                                <span class="icon">
	                                                    <svg width="40" height="24" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
	                                                    <g clip-path="url(#clip0_1894_27643)">
	                                                        <path d="M39.92 10.746C39.9086 10.4979 39.8166 10.2603 39.6578 10.0689C38.2132 8.39629 36.7169 6.68554 35.211 4.98813C35.0532 4.82379 34.8381 4.72614 34.6102 4.7154C33.5884 4.70205 32.5513 4.70396 31.5487 4.70396H30.7584C30.5671 4.70396 30.3892 4.70396 30.1844 4.69442H30.1691V2.46491C30.1691 0.983014 29.3521 0.17627 27.873 0.17627H7.47191C5.99282 0.17627 5.17578 0.990643 5.17578 2.46491C5.17578 4.57808 5.17578 6.69126 5.17578 8.80443V13.109C5.17578 14.6729 5.17578 16.2349 5.17578 17.7988C5.17578 18.9297 5.94116 19.7861 7.01842 19.8814C7.20977 19.8986 7.40111 19.9043 7.59245 19.9043C7.74744 19.9043 7.90434 19.9043 8.05742 19.9043C8.21049 19.9043 8.37313 19.9043 8.53195 19.9043H8.67545V18.3366H7.50635C6.86726 18.3366 6.74097 18.2107 6.74097 17.5737V2.52212C6.74097 1.8546 6.85004 1.7459 7.50635 1.7459H27.7888C28.4547 1.7459 28.5637 1.8527 28.5637 2.50877V11.8369H9.09067V13.4103H38.3414V17.5966C38.3414 18.1821 38.2189 18.3023 37.6162 18.308C37.3751 18.308 37.134 18.308 36.891 18.308H36.4088V19.8853H37.6277C39.1087 19.8853 39.9238 19.069 39.9238 17.5966C39.9334 15.4072 39.9353 13.0708 39.92 10.746ZM38.3892 11.8045H30.1882V6.29075C30.2552 6.29075 30.3203 6.2793 30.3796 6.2793H31.0933C32.0271 6.2793 32.9933 6.2793 33.9424 6.28884C34.0907 6.29955 34.2304 6.36241 34.3366 6.46621L34.6619 6.82858C35.8348 8.13691 37.0498 9.49865 38.1921 10.8642C38.3127 11.0092 38.3376 11.2666 38.3624 11.5413C38.3739 11.6252 38.3816 11.7148 38.395 11.7987L38.3892 11.8045Z" fill="#464646"/>
	                                                        <path d="M14.094 15.0791C12.9365 15.0791 11.8264 15.5374 11.0078 16.3533C10.1893 17.1691 9.72949 18.2756 9.72949 19.4294C9.72949 20.5832 10.1893 21.6897 11.0078 22.5056C11.8264 23.3214 12.9365 23.7797 14.094 23.7797H14.1055C14.6804 23.7793 15.2496 23.6658 15.7805 23.4459C16.3114 23.226 16.7936 22.9039 17.1995 22.4981C17.6045 22.0955 17.9254 21.6168 18.1435 21.0897C18.3616 20.5626 18.4726 19.9976 18.4701 19.4275C18.4665 18.273 18.0039 17.167 17.1836 16.3519C16.3634 15.5368 15.2523 15.0791 14.094 15.0791V15.0791ZM16.8704 19.4275C16.8722 19.7913 16.8016 20.1519 16.6627 20.4883C16.5238 20.8248 16.3193 21.1304 16.0611 21.3876C15.8029 21.6448 15.4961 21.8484 15.1585 21.9866C14.8208 22.1248 14.4591 22.195 14.094 22.1929V22.1929C13.3557 22.1929 12.6475 21.9006 12.1254 21.3802C11.6033 20.8598 11.31 20.1539 11.31 19.418C11.31 18.682 11.6033 17.9762 12.1254 17.4558C12.6475 16.9354 13.3557 16.643 14.094 16.643H14.1055C14.8421 16.6485 15.5465 16.9446 16.0646 17.4664C16.5827 17.9882 16.8725 18.6933 16.8704 19.4275V19.4275Z" fill="#464646"/>
	                                                        <path d="M30.9916 15.0787C30.4185 15.0795 29.8511 15.1927 29.3218 15.412C28.7926 15.6314 28.3119 15.9524 27.9071 16.3569C27.0897 17.1738 26.6313 18.281 26.6328 19.4347C26.6343 20.5885 27.0956 21.6944 27.9152 22.5092C28.7348 23.324 29.8456 23.7809 31.0031 23.7793V23.7793C31.866 23.7754 32.7084 23.5171 33.4242 23.0369C34.1401 22.5567 34.6974 21.8761 35.0259 21.0808C35.3545 20.2856 35.4396 19.4112 35.2706 18.5678C35.1016 17.7244 34.686 16.9497 34.0761 16.3413C33.6716 15.9376 33.1906 15.6181 32.661 15.4013C32.1315 15.1846 31.5641 15.0749 30.9916 15.0787V15.0787ZM33.7891 19.4424C33.7815 20.1767 33.4834 20.8784 32.9595 21.3949C32.4357 21.9113 31.7284 22.2007 30.9916 22.2002V22.2002C30.4409 22.1966 29.9036 22.0302 29.4478 21.7222C28.9919 21.4142 28.638 20.9783 28.4307 20.4697C28.2234 19.9612 28.1721 19.4027 28.2833 18.8651C28.3944 18.3275 28.6631 17.8348 29.0552 17.4494C29.3129 17.1914 29.62 16.9878 29.9583 16.8505C30.2965 16.7132 30.659 16.6451 31.0242 16.6502C31.7624 16.6558 32.4683 16.9528 32.9873 17.4761C33.5063 17.9995 33.796 18.7065 33.7929 19.4424H33.7891Z" fill="#464646"/>
	                                                        <path d="M16.1111 4.26868H19.0846V2.69334H16.1647C15.9979 2.69082 15.8311 2.69846 15.6653 2.71623C14.4464 2.8688 13.6695 3.70797 13.6389 4.90759C13.6083 6.10722 13.6064 7.34881 13.6389 8.6171C13.6714 9.88538 14.5095 10.7474 15.782 10.8047C16.7387 10.8466 17.7796 10.8676 18.92 10.8676H19.4673C20.5809 10.8676 21.5051 10.1429 21.6199 9.19879C21.6861 8.49386 21.7008 7.78505 21.6639 7.07799C21.6639 6.77474 21.6466 6.46006 21.6466 6.15109V6.00805H20.1389L22.1901 3.96735L21.042 2.89359L17.5978 6.33608L16.8994 5.4912L15.7915 6.53634L17.705 8.44354L20.137 6.01949V6.83959C20.137 7.35834 20.137 7.87138 20.137 8.38251C20.137 8.95467 19.8518 9.23693 19.2682 9.23884H15.9542C15.3514 9.23884 15.1467 9.03668 15.1467 8.44354C15.1467 7.52427 15.1467 6.60309 15.1467 5.68192V5.22228C15.1448 4.52806 15.4069 4.27059 16.1111 4.26868Z" fill="#464646"/>
	                                                        <path d="M26.2595 18.3438H18.8545V19.8695H26.2595V18.3438Z" fill="#464646"/>
	                                                        <path d="M4.11929 8.60205H0.642578V10.1507H4.11929V8.60205Z" fill="#464646"/>
	                                                        <path d="M4.12286 6.67578H1.28906V8.20535H4.12286V6.67578Z" fill="#464646"/>
	                                                        <path d="M4.12667 4.72656H1.94727V6.25995H4.12667V4.72656Z" fill="#464646"/>
	                                                        <path d="M12.5273 19.9441L13.5797 21.0102L15.6348 18.9199L14.5728 17.8652L12.5273 19.9441Z" fill="#464646"/>
	                                                        <path d="M29.4707 19.9383L30.4427 20.9606L32.536 18.8855L31.5468 17.8633L29.4707 19.9383Z" fill="#464646"/>
	                                                    </g>
	                                                    <defs>
	                                                        <clipPath id="clip0_1894_27643">
	                                                            <rect width="39.2886" height="23.6111" fill="white" transform="translate(0.642578 0.166504)"/>
	                                                        </clipPath>
	                                                    </defs>
	                                                </svg>
	                                                </span>
	                                                <span>COD <br>
		                                                Trả tiền mặt khi nhận hàng
		                                            </span>
	                                            </label>
	                                        </div>
	                                        <?php
	                                            }
	                                        ?>
			                                <?php
			                                        }
			                                    }
			                                }
			                                ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-4">
	                    <div class="side-pay">
	                        <div class="t-pay">Đơn hàng</div>
	                        <div class="card-payment">
	                            <?php
	                                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	                                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
	                                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
	                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
	                                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
	                                    
	                            ?>
	                            <div class="item-prd-pay">
	                                <div class="avarta"><a href="<?= $_product->get_permalink(); ?>"><img src="<?= get_the_post_thumbnail_url($product_id) ?>" class="img-fluid w-100" alt="<?= $_product->get_name(); ?>"></a></div>
	                                <div class="info">
	                                    <div class="top">
	                                        <a href="<?= $_product->get_permalink(); ?>"><?= $_product->get_name(); ?></a>

	                                        <p>Có công xịt dưỡng có ngày tóc xinh.</p>
	                                    </div>
	                                    <div class="price"><?= number_format($cart_item['line_total'], 0, '', '.'); ?>đ</div>
	                                </div>
	                            </div>
	                            <?php
	                                }}
	                            ?>
	                        </div>
	                        <div class="price-pay">
	                            <ul>
	                                <li>
	                                    <span>Tạm tính</span>
	                                    <span><?= number_format(WC()->cart->subtotal, 0, '', '.'); ?> vnđ</span>
	                                </li>
	                                <!-- <li>
	                                    <span>Phí vận chuyển</span>
	                                    <span>22.000 vnđ</span>
	                                </li> -->
	                                <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
	                                <li>
	                                    <span>Khuyến mãi ( <?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?> )</span>
	                                    <span>-<?= number_format(WC()->cart->get_coupon_discount_amount( $coupon->get_code(), WC()->cart->display_cart_ex_tax ), 0, '', '.'); ?> vnđ</span>
	                                </li>
									<?php endforeach; ?>
	                            </ul>
	                        </div>
	                        <div class="total-pay">
	                            <p>Tổng cộng</p>
	                            <p><?= number_format(WC()->cart->total, 0, '', '.'); ?> vnđ</p>
	                        </div>
	                        <div class="btn-payment">
	                            <input type="submit" class="btn_pay" value="Thanh toán ngay">
	                            <p>Click vào <a href="/san-pham">đây</a> để tiếp tục mua sắm</p>
	                            <?php do_action( 'woocommerce_review_order_after_submit' ); ?>
                                <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </form>
        </div>
    </section>
    <?php require_once("contact.php"); ?>
</main>
<?php
}
?>
<?php get_footer(); ?>
