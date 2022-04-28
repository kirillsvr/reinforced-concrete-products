<?php

/**
* 
*/
class SProduct
{
	
	function __construct()
	{
		
	}

	static public function productsInCart(){

	}

	public static function getPriceView(){
		return number_format(get_field('price'), 0, ',', '.');
	}


	public static function getCartPermalink(){
		$pages = get_pages(
        array(
            'meta_key' => '_wp_page_template',
            'meta_value' => 'page-cart.php'
        )
    );
    $cart_id = $pages[0]->ID;
    echo get_permalink( $cart_id );
	}



	public static function getCartProductNum(){
		$cartProducts = json_decode(str_replace("\\", "", $_COOKIE['cart_products']));
		if($cartProducts){
			$i = 0;
			foreach ($cartProducts as $product) {
				$i++;
			}
			return $i;
		}
		return 0;
	}



	public static function getCartTable(){
		$cartProducts = json_decode(str_replace("\\", "", $_COOKIE['cart_products']));
		if($cartProducts) :
			$sum = 0;
			echo '<table class="cart-table">';
			echo '<thead>';
			echo '<tr>';
			echo '<td></td>';
			echo '<td>Наименование продукции</td>';
			echo '<td>Цена</td>';
			echo '<td>Количество</td>';
			echo '<td>Сумма</td>';
			echo '<td></td>';
			echo '</tr>';
			echo '</thead>';
			$i = 1;
			echo '<tbody>';
			foreach ($cartProducts as $product) :
				$price = get_post_meta($product->id, 'price', true);
				$curSum = $price*$product->numb;
				$sum += $curSum;
				
				?>
				<tr data-product-id="<?=$product->id?>" class="ct-single-product">
					<td><?php echo get_the_post_thumbnail($product->id, 'full'); ?></td>
					<td class="cart-table-title">
						<?=get_the_title($product->id)?>
					</td>
					<td><span><?=$price?></span> руб.</td>
					<td>
						<div class="more-less-wrp">
							<span class="minus">--</span>
							<input type="text" class="product-number-input" maxlength="4" data-price="<?=$price?>" value="<?=$product->numb?>" data-number="<?=$product->numb?>" readonly>
							<span class="plus">+</span>
						</div>
					</td>
					<td class="cart-table-sum-td"><span><?=$curSum?></span> руб.</td>
					<td><span class="cart-delete">+</span></td>
				</tr>
		<?php $i++; endforeach;
			echo '</tbody>';
			echo '</table>';
			echo '<p class="cart-sum">Итого: <span>'.$sum.'</span> руб.</p>';
		endif;
	}




}