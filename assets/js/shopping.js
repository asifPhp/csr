$('document').ready(function(){
	
	/* 
	1) footer must have this html code 
	<div style="display:none;" class="footer_cart"><ul class="product_cart_info" style="display:none"></ul></div>
	
	2) Shopping cart must have this class on table tbody tag
	.cart_body
	
	3) Header and shopping cart where we need to show cart number, must have this class
	.cart_number
	
	3) Header and shopping cart where we need to total cart price, must have this class
	.cart_total_price
	*/
	import_cookie_into_li();
	import_in_cart_table();
	
	$('body').on('click','.addtocart',function() {
		var price = parseFloat($(this).attr('price'));
		var discount = parseFloat($(this).attr('discount'));
		var finalprice = parseFloat($(this).attr('finalprice'));
		var quantity = parseInt($(this).attr('quantity'));
		var product_name = ($(this).attr('product_name'));
		var product_img = ($(this).attr('product_img'));
		var product_id = parseInt($(this).attr('product_id'));
		
		var footer_li_cart = '<li>\n\
							<span class="product_id">'+product_id+'</span>\n\
							<span class="product_img">'+product_img+'</span>\n\
							<span class="product_name">'+product_name+'</span>\n\
							<span class="quantity">'+quantity+'</span>\n\
							<span class="discount">'+discount+'</span>\n\
							<span class="price">'+price+'</span>\n\
							<span class="finalprice">'+finalprice+'</span>\n\
						</li>';
		
		/*updating quantity and total price in header*/
		var cart_number = parseInt($('.cart_number').text());
		cart_number = cart_number+ 1;
		$('.cart_number').text(cart_number);
		
		var cart_total_price  = parseFloat($('.cart_total_price').text()) + + (finalprice * quantity);
		$('.cart_total_price').text(cart_total_price);
		
		$('ul.product_cart_info').append(footer_li_cart);
		setCookie();
	});
	
	/**
	 * This script it used to set cookie when ever user doing action on cart
	 */
	function setCookie(){
		var product_detail=[];
		$('ul.product_cart_info li').each(function(){
			product_detail.push({
				price : $(this).find('.price').text(),
				discount : $(this).find('.discount').text(),
				finalprice : $(this).find('.finalprice').text(),
				quantity : $(this).find('.quantity').text(),
				product_name : $(this).find('.product_name').text(),
				product_img : $(this).find('.product_img').text(),
				product_id : $(this).find('.product_id').text(),
			
			});
		});
		localStorage.setItem('product_cart' , JSON.stringify(product_detail));
	}
	
	/*importing the cookie data in footer li*/
	function import_cookie_into_li(){
		var product_cart_counter = 0;
		var shoping_cart_total = 0;
		var cart_total = 0;
		var obj = JSON.parse(localStorage.getItem('product_cart'));
		//console.log(obj);
		var keySize = 0;
		for (key in obj) {
			var price = obj[key].price;
			var discount = obj[key].discount;
			var finalprice = parseFloat(obj[key].finalprice);
			var quantity = parseInt(obj[key].quantity);
			var product_name = obj[key].product_name;
			var product_img = obj[key].product_img;
			var product_id = obj[key].product_id;
			
			var li_cart = '<li>\n\
				<span class="price">'+price+'</span>\n\
				<span class="discount">'+discount+'</span>\n\
				<span class="finalprice">'+finalprice+'</span>\n\
				<span class="quantity">'+quantity+'</span>\n\
				<span class="product_name">'+product_name+'</span>\n\
				<span class="product_img">'+product_img+'</span>\n\
				<span class="product_id">'+product_id+'</span>\n\
			</li>';
			$('ul.product_cart_info').append(li_cart);
			
			/*updating quantity and total price in header*/
			product_cart_counter = parseInt(product_cart_counter) + 1;
			$('.cart_number').text(product_cart_counter);
			
			shoping_cart_total  = shoping_cart_total + (finalprice * quantity);
			$('.cart_total_price').text(shoping_cart_total.toFixed(2));
		}
	}
	
	function import_in_cart_table(){
		$('.cart_body').empty();
		var product_cart_counter = 0;
		var shoping_cart_total = 0;
		var product_cart_data = JSON.parse(localStorage.getItem('product_cart'));

		var obj = JSON.parse(localStorage.getItem('product_cart'));
		var keySize = 0;
		for (key in obj) {
			var price = parseFloat(obj[key].price);
			var discount = parseFloat(obj[key].discount);
			var finalprice = parseFloat((obj[key].finalprice));
			var quantity = parseInt((obj[key].quantity));
			var product_name = obj[key].product_name;
			var product_img = obj[key].product_img;
			var product_id = obj[key].product_id;
			
			var table_cart = '<tr price="'+price+'" discount="'+discount+'" finalprice="'+finalprice+'" quantity="'+quantity+'" product_name="'+product_name+'" product_id="'+product_id+'" product_img="'+product_img+'">\n\
						<td class="flex_item clear_fix"><h6 class="float_left">'+product_name+'</h6></td>\n\
						<td><button class="btn btn-default btn_minus"><span  class="fa fa-minus"></span></button><input type="number" readonly name="quantity" class="cart_input" min="1" value="'+quantity+'"><button class="btn btn-default btn_plus"><span  class="fa fa-plus "></span></button></td>\n\
						<td>£<span>'+((finalprice * quantity).toFixed(2))+'</span> <a class="delete-ico remove_service" href="javascript:void(0);" style="float: right; color: red !important;" value="undefined"><i class="fa fa-times " aria-hidden="true"></i></a></td>\n\
					</tr>';
			
			$('.cart_body').append(table_cart);
			
			product_cart_counter = product_cart_counter+parseInt(quantity);
			$('.cart_number').text(product_cart_counter);
			
			shoping_cart_total  = shoping_cart_total+ (finalprice * quantity);
			$('.cart_total_price').text(shoping_cart_total.toFixed(2));
		}
		if(product_cart_counter == 0){
			$('.cart_total_price').text('0.00');
			$('.cart_number').text('0');
			var table_cart = '<tr ><td colspan="2" class="flex_item clear_fix text-center"><h3 class="float_left required">CART IS EMPTY</h3></td></tr>';
			$('.cart_body').append(table_cart);
		}
	}
	
	function read_from_table_and_save_localStorage(){
		var product_detail=[];
		var remove_cart_counter=0;
		var remove_cart_total=0;
		$('.cart_body tr').each(function(){
			product_detail.push({
				price : $(this).attr('price'),
				discount : $(this).attr('discount'),
				finalprice : $(this).attr('finalprice'),
				product_name : $(this).attr('product_name'),
				product_img : $(this).attr('product_img'),
				product_id : $(this).attr('product_id'),
				quantity : parseInt($(this).find('.cart_input').val()),
			});
		});
		localStorage.setItem('product_cart' , JSON.stringify(product_detail));
	    var product_cart_data = JSON.parse(localStorage.getItem('product_cart'));
	}
	
	$("body").on("click", ".remove_service", function () {
		$(this).parent().parent().remove();
		read_from_table_and_save_localStorage();
		import_in_cart_table();
	});
	
	$('body').on('click','.btn_plus',function(){
		var quantity = $(this).closest('tr').find('.cart_input').val();
		$(this).closest('tr').find(".cart_input").val(parseInt(quantity, 10)+1);
		read_from_table_and_save_localStorage();
		import_in_cart_table();
	});
	$('body').on('click','.btn_minus',function(){
		var quantity = $(this).closest('tr').find('.cart_input').val();
		if(quantity > 1){
			$(this).closest('tr').find(".cart_input").val(parseInt(quantity, 10)-1);
			read_from_table_and_save_localStorage();
			import_in_cart_table();
		}
	});
})

