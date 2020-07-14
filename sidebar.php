<?php
/**
 * The sidebar containing the secondary widget area, displays on homepage, archives and posts.
 *
 * If no active widgets in this sidebar, it will shows Recent Posts, Archives and Tag Cloud widgets.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<aside id="sidebar" class="<?php echo odin_classes_page_sidebar_aside(); ?>" role="complementary">
	<?php
		// if ( ! dynamic_sidebar( 'main-sidebar' ) ) {
		// 	the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ) );
		// 	the_widget( 'WP_Widget_Archives', array( 'count' => 0, 'dropdown' => 1 ) );
		// 	the_widget( 'WP_Widget_Tag_Cloud' );
		// }
	?>

	<?php if( wp_is_mobile() ) : ?>
		<div class="close-nav"><i class="fa fa-times" aria-hidden="true"></i></div>
	<?php endif; ?>

	<div class="nav-sidebar">
		<nav>
			<ul>
				<li><a href="<?php echo home_url('/'); ?>"><i class="fa fa-home" aria-hidden="true"></i> Blog</a></li>
				<li><a href="<?php echo home_url('/about'); ?>"><i class="fa fa-smile-o" aria-hidden="true"></i> About</a></li>
				<li><a href="https://github.com/wallacejsv/" target="_blank"><i class="fa fa-github" aria-hidden="true"></i> Github</a></li>
				<li><a href="https://www.instagram.com/jonathanvieiira/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a></li>
				<li><a href="https://www.linkedin.com/in/wallace-jonathan-da-silva-6b2189a5/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a></li>
			</ul>
		</nav>
		<div class="bt-publicar">
			<a href="https://jonathanvieira.com.br/portifolio" target="_blank"><button>Jobs</button></a>
		</div>
	</div>

	<?php
		function contributors() {
			global $wpdb;

			$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");

			foreach($authors as $author) {
			echo "<li class='autors'>";
			echo "<a href=\"".get_bloginfo('url')."/?author=";
			echo $author->ID;
			echo "\">";
			echo get_avatar($author->ID);
			echo "</a>";
			echo '<div>';
			echo "<a href=\"".get_bloginfo('url')."/?author=";
			echo $author->ID;
			echo "\">";
			the_author_meta('display_name', $author->ID);
			echo "</a>";
			echo "</div>";
			echo "</li>";
			}
		}
	?>

	<div class="nav-sidebar nav-sidebar-autor">
		<nav>
			<ul>
				<li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Autor</a></li>
				<?php contributors(); ?>
			</ul>
		</nav>
	</div>

</aside><!-- #sidebar -->
