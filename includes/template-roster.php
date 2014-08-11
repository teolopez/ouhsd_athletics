<?php
/**
 * The sections page template file
 *
 * @package ouhsd
 * @since 0.1.0
 */

/*
 * Template Name: Teams
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div id="main" class="wrapper has-sidebar">

			<h2>Hello</h2>

				<?php get_sidebar( 'section' ); ?>

			</div>

		</div>
	</article>

<?php endwhile; ?>

<?php get_footer(); ?>