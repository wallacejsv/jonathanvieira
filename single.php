<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>

		<main id="content" class="<?php echo odin_classes_page_sidebar(); ?>" tabindex="-1" role="main">



			<div class="title-top-timeline">

				<div class="item">
					<a href="<?php echo home_url('/'); ?>" style="color:#000;text-decoration:none;"><h1 style="color:#000;text-decoration:none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Linha do tempo</h1></a>
				</div>
				<div class="item">
					<div class="hamburguer-nav">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
				</div>
			</div>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content-single', get_post_format() );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</main><!-- #main -->

<?php
get_sidebar();
get_footer();
