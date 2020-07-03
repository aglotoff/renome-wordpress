<?php
/**
 * The header for the Renome theme
 *
 * This is the template that displays all of the <head> section and everything
 * up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package renome
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>
<body class="page">
	<a class="skip-link page__skip-link" href="#content">Skip to content</a>

	<header class="header page__header" id="masthead">
		<div class="header__inner">
			<h1 class="header__logo">
				<img class="header__logo-img" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Renome" />
				<span class="header__logo-text">Renome</span>
			</h1>
			<nav class="nav header__nav">
				<button class="hamburger nav__toggle" aria-haspopup="true" aria-expanded="false" aria-controls="site-navigation">
					<span class="hamburger__inner">
						<span class="hamburger__title">Toggle nav</span>
					</span>
				</button>
				<div class="nav__menu" id="site-navigation">
					<div class="nav__scrollpane">
						<form class="mobile-search nav__search" action="#" method="post">
							<input class="mobile-search__input" type="text" name="s" placeholder="Search..." />
							<button class="mobile-search__submit" type="submit">
								<svg class="icon icon_search">
									<title>Search</title>
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#search"></use>
								</svg>
							</button>
						</form>
						<ul class="nav__list nav__list_horizontal">
							<li class="nav__item">
								<a class="nav__link nav__link_active" href="index.html">Home</a>
							</li>
							<li class="nav__item">
								<a class="nav__link" href="about.html">About</a>
							</li>
							<li class="nav__item">
								<a class="nav__link" href="menu.html">Menu</a>
							</li>
							<li class="nav__item">
								<a class="nav__link" href="reservation.html">Reservation</a>
							</li>
							<li class="nav__item">
								<a class="nav__link nav__link" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="submenu-blog">Blog<span class="nav__arrow nav__arrow_open" aria-hidden="true"></span>
								</a>
								<div class="nav__submenu" id="submenu-blog">
									<div class="nav__scrollpane">
										<a class="nav__link nav__link_back" href="javascript:void(0);" role="button">Back<span class="nav__arrow nav__arrow_close" aria-hidden="true"></span>
										</a>
										<ul class="nav__list">
											<li class="nav__item">
												<a class="nav__link nav__link_submenu" href="blog-left-sidebar.html">Blog left sidebar</a>
											</li>
											<li class="nav__item">
												<a class="nav__link nav__link_submenu" href="blog-right-sidebar.html">Blog right sidebar</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li class="nav__item">
								<a class="nav__link nav__link" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" aria-controls="submenu-features">Features<span class="nav__arrow nav__arrow_open" aria-hidden="true"></span>
								</a>
								<div class="nav__submenu" id="submenu-features">
									<div class="nav__scrollpane">
										<a class="nav__link nav__link_back" href="javascript:void(0);" role="button">Back<span class="nav__arrow nav__arrow_close" aria-hidden="true"></span>
										</a>
										<ul class="nav__list">
											<li class="nav__item">
												<a class="nav__link nav__link_submenu" href="portfolio.html">Portfolio</a>
											</li>
											<li class="nav__item">
												<a class="nav__link nav__link_submenu" href="one-page.html">One page</a>
											</li>
											<li class="nav__item">
												<a class="nav__link nav__link_submenu" href="404.html">404 page</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li class="nav__item">
								<a class="nav__link" href="shop.html">Shop</a>
							</li>
							<li class="nav__item">
								<a class="nav__link" href="contact.html">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<div class="header__actions">
				<button class="header__search-toggle">
					<svg class="icon icon_search">
						<title>Show search form</title>
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#search"></use>
					</svg>
				</button>
				<div class="mini-cart header__mini-cart">
					<button class="mini-cart__trigger" aria-haspopup="true" aria-controls="minicart" aria-expanded="false">
						<svg class="icon icon_cart">
							<title>Toggle minicart</title>
							<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#cart"></use>
						</svg>
						<span class="mini-cart__item-count">2</span>
					</button>
					<div class="mini-cart__drawer" id="minicart">
						<span class="mini-cart__total">$44.50</span>
						<a class="mini-cart__action" href="shop-cart.html">View Cart</a>
						<a class="mini-cart__action" href="shop-checkout.html">Checkout</a>
					</div>
				</div>
			</div>
		</div>
		<div class="header-search header__search" role="dialog" aria-label="Search">
			<form class="header-search__form" action="#" method="post">
				<input class="header-search__input" type="text" name="s" placeholder="Search..." />
				<button class="header-search__submit" type="submit">
					<svg class="icon icon_search">
						<title>Search</title>
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/icons.svg#search"></use>
					</svg>
				</button>
				<button class="header-search__close" type="button" aria-label="Close"></button>
			</form>
		</div>
	</header>
