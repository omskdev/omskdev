<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package omskdev
 */

get_header();
?>

	<main id="primary" class="container relative mx-auto px-4">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

			the_post_navigation(
				array(
					'prev_text' => '<span>' . esc_html__( 'Previous:', 'omskdev' ) . '</span> <span>%title</span>',
					'next_text' => '<span>' . esc_html__( 'Next:', 'omskdev' ) . '</span> <span>%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
