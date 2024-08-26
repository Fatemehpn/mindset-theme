<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			$args = array(
				'post_type'      => 'fwd-service',
				'posts_per_page' => -1,
				'orderBy' => 'title',
				'order' =>'ASC'
			);
			
			$query = new WP_Query($args);
			
			if($query->have_posts()){
				?>
			
				<section class="services">
					<h2><?php esc_html_e('Our Services','fwd'); ?></h2>
					<nav>
						<ul style="list-style:none">
					<?php
					while($query->have_posts()){
						$query->the_post();
						?>
						<li><a href="#<?php the_ID(); ?>"><?php the_title(); ?></a></li>
						<?php
					}
					wp_reset_postdata();
					?>
					</ul>
					</nav>

					<?php
					?>
					<?php
					$query = new WP_Query($args);
					while($query->have_posts()){
						$query->the_post();
						?>
						<article id="<?php the_ID();?>">
						<h3><?php the_title(); ?></h3>
						<?php
						if(function_exists('get_field')){
							// check if it has something in it
								if(get_field('service')){
										the_field('service');
								}
						}
						?>
							</article>
							<?php
					}
					?>
					</section>
					<?php
					wp_reset_postdata();
			}


			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
