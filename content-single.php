<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<?php $author = get_the_author();?>

<div class="item-post">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header">

			<div class="avatar-timeline-post">
				<?php //echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
				<img src="https://secure.gravatar.com/avatar/d17fcc3d9630f041d7e89e9a82953361?s=96&d=mm&r=g"/>
				<div class="name-post-author">
					<h2><?php echo get_the_author(); ?></h2>
					<span><a href="https://instagram.com/congrega_" target="_blank">@congrega_</a> - <?php the_date(); ?></span>
				</div>
			</div>

		</header><!-- .entry-header -->

		<div class="content-timeline-timel">

			<?php

				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				$thumbPost = get_the_post_thumbnail_url();
			?>
			<?php if($thumbPost) : ?>
					<div class="img-post-index-single">
						<img src="<?php echo $thumbPost; ?>">
					</div>
				<?php endif; ?>
			<?php if ( is_search() ) : ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content">
					<?php
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
						) );
					?>
				</div><!-- .entry-content -->
			<?php endif; ?>

			<div class="footer-post">
				<?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
					<span class="comments-link"><?php comments_popup_link( __( '<i class="fa fa-comment-o" aria-hidden="true"></i>', 'odin' ), __( '1 <i class="fa fa-comment-o" aria-hidden="true"></i>', 'odin' ), __( '% <i class="fa fa-comment-o" aria-hidden="true"></i>', 'odin' ) ); ?></span>

					<button class="like__btn animated">
						<i class="like__icon fa fa-heart-o"></i>
						<span class="like__number"><?php the_field('likes_number'); ?></span>
					</button>

				<?php endif; ?>
			</div>

		</div>

	</article><!-- #post-## -->
</div>
