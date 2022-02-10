<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package omskdev
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('prose prose-slate bg-white shadow hover:shadow-xl duration-300 rounded-xl p-10 pt-5 mt-10'); ?>>
	<header>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div>
				<?php
				//omskdev_posted_on();
				//omskdev_posted_by();
				?>
			</div>
		<?php endif; ?>
	</header>

	<?php omskdev_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div>' . esc_html__( 'Pages:', 'omskdev' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer>
		<?php //omskdev_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
