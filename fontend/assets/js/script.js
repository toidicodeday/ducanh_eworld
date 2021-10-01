$(document).ready(function() {
	$('.add-to-cart').click(function() {
		var product_id = $(this).attr('data-id');

		$.ajax({
			url: 'index.php?controller=cart&action=add',
			method: 'GET',
			dataType: 'html',
			data: {
				product_id: product_id
			},
			success: function(data) {
				$('.ajax-message')
					.html('Thêm sản phẩm thành công')
					.addClass('ajax-message-active');

				setTimeout(function(){
                    $('.ajax-message')
                        .removeClass('ajax-message-active');
                }, 2000);

				var cart_total = $('.cart-item').html();
				cart_total++;
				$('.cart-item').html(cart_total);

				// console.log(jQuery.parseJSON(data));
			}
		});
	});

})

