<?php
/**
 * Navigation menu.
 *
 * @package renome
 */

?>

<nav class="nav header__nav">
	<button class="hamburger nav__toggle" aria-haspopup="true" aria-expanded="false" aria-controls="site-navigation">
		<span class="hamburger__inner">
			<span class="hamburger__title">
				<?php esc_html_e( 'Toggle nav', 'renome' ); ?>
			</span>
		</span>
	</button>
	<div class="nav__menu" id="site-navigation">
		<div class="nav__scrollpane">
			<?php get_template_part( 'template-parts/search/search', 'mobile' ); ?>

			<?php
			wp_nav_menu(
				array(
					'menu_class'     => 'nav__list nav__list_horizontal',
					'container'      => '',
					'depth'          => 2,
					'walker'         => new Renome\Walker_Nav_Menu(),
					'theme_location' => 'main-menu',
				)
			);
			?>
		</div>
	</div>
</nav>
