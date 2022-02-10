<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package omskdev
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> lang="ru">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="bg-gray-100">
	<a href="#primary" class="sr-only focus:not-sr-only"><?php esc_html_e('Skip to content', 'omskdev'); ?></a>

	<header id="masthead" class="bg-white shadow">
		<nav id="site-navigation">
			<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
				<div class="relative flex items-center justify-between h-16">
					<div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
						<!-- Mobile menu button-->
						<button type="button"
								class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
								aria-controls="mobile-menu" aria-expanded="false">
							<span class="sr-only">Open main menu</span>
							<!--
							  Icon when menu is closed.

							  Heroicon name: outline/menu

							  Menu open: "hidden", Menu closed: "block"
							-->
							<svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
								 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M4 6h16M4 12h16M4 18h16"/>
							</svg>
							<!--
							  Icon when menu is open.

							  Heroicon name: outline/x

							  Menu open: "block", Menu closed: "hidden"
							-->
							<svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
								 viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
									  d="M6 18L18 6M6 6l12 12"/>
							</svg>
						</button>
					</div>
					<div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
						<div class="flex-shrink-0 flex items-center">
							<?php the_custom_logo(); ?>
						</div>

						<?php
						wp_nav_menu(
								array(
										'container_id' => 'primary-menu',
										'container_class' => 'hidden sm:block sm:ml-6',

										'theme_location' => 'menu-1',
										'items_wrap' => '<ul class="flex space-x-4"><li id="item-id" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><?php __( \'Menu:\', \'omskdev\' ); ?></li>%3$s</ul>',

										'fallback_cb' => false,
								)
						);
						?>

					</div>
				</div>
			</div>

			<!-- Mobile menu, show/hide based on menu state. -->
			<div class="sm:hidden" id="mobile-menu">
				<div class="px-2 pt-2 pb-3 space-y-1">

				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->




