
$(document).ready(function(){
	if(localStorage.getItem('cart') == null){
    	localStorage.setItem('cart', 0) ;
    }else{
    	if(localStorage.getItem('cart') == 1) {
    		$('.box-card-head').addClass('active');
	    	window.onbeforeunload = function (e) {
	    		localStorage.setItem('cart', 0) ;
			};
    	}
    }
	
	$('.clc-prd').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('.clc-prd').removeClass('active');
		$('.avr-cate').removeClass('active');
		$('.txt-prd-cate').addClass('d-none');

		$(this).addClass('active');
		$("#"+tab_id).addClass('active');
		$(".txt-prd-cate[data-id="+tab_id+"]").removeClass('d-none');
		$('.box-product-cate').css('background',$(this).attr('data-color'))
	})

	$( document ).on( 'click', '.btn-add-cart', function(e) {
		e.preventDefault();
		$thisbutton = $(this),
        product_id = $thisbutton.data('id') ;
		variation_id = $('input[name=variation_id]').val() || 0;

        var data = {
            action: 'woocommerce_ajax_add_to_cart',
            product_id: product_id,
            quantity: 1,
            variation_id: variation_id
        };
        $.ajax({
            type: 'post',
            url: wc_add_to_cart_params.ajax_url,
            data: data,
            beforeSend: function (response) {
                $thisbutton.removeClass('added').addClass('loading');
            },
            complete: function (response) {
                $thisbutton.addClass('added').removeClass('loading');
            },
            success: function (response) {
                if (response.error & response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                	localStorage.setItem('cart', 1);
                    location.reload(true);
                }
            },
        });
	});

})