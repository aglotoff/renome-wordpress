<?php
/**
 * Header actions.
 *
 * @package renome
 */

?>

<div class="header__actions">
	<button class="header__search-toggle">
		<?php Renome\svg_icon( 'search', __( 'Show search form', 'renome' ) ); ?>
	</button>

	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
		<div class="mini-cart header__mini-cart">
			<button class="mini-cart__trigger" aria-haspopup="true" aria-controls="minicart" aria-expanded="false">
				<?php Renome\svg_icon( 'cart', __( 'Toggle minicart', 'renome' ) ); ?>
				<span class="mini-cart__item-count">2</span>
			</button>

			<div class="mini-cart__drawer" id="minicart">
				<span class="mini-cart__total">$44.50</span>
				<a class="mini-cart__action" href="shop-cart.html">
					<?php esc_html_e( 'View Cart', 'renome' ); ?>
				</a>
				<a class="mini-cart__action" href="shop-checkout.html">
					<?php esc_html_e( 'Checkout', 'renome' ); ?>
				</a>
			</div>
		</div>
	<?php endif; ?>
</div>
