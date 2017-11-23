<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front page by default.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package theme
 */

get_header(); ?> 

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<section class="main-banner"> 
				<div class="banner-content">
					<h1>Digital transformation driven by 
					out-thought solutions.</h1>

					<p>We scale your business helping you stay out in front with agile and responsive approaches.</p>

					<a href="#" class="lg secondary-btn-outline">Read more</a>
					<a href="#" class="lg primary-btn">Get Started</a>
				</div>
			</section>


			<?php
			/*
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			*/
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
//get_footer();
