<?php
/**
 * The template for displaying Work archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
				$args = array(
					'post_type'      => 'fwd-work',
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							 'taxonomy'  => 'fwd-work-category',
							 'field'     => 'slug',
							 'terms'     => 'web'
						)
					)
				);

				$query = new WP_Query($args);

				if($query->have_posts()){
						while($query->have_posts()){
							echo '<section><h2>Web</h2>';
							$query->the_post();
							?>
							<article>
								<a href="<?php the_permalink();?>">
									<h2><?php the_title(); ?></h2>
									<?php the_post_thumbnail('large'); ?>
								</a>
								<?php the_excerpt(); ?>

							</article>

							<?php
						}

						wp_reset_postdata();
						echo '</section>';
				}
			?>
			<?php
				$args = array(
					'post_type'      => 'fwd-work',
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							 'taxonomy'  => 'fwd-work-category',
							 'field'     => 'slug',
							 'terms'     => 'photo'
						)
					)
				);

				$query = new WP_Query($args);

				if($query->have_posts()){
						while($query->have_posts()){
							echo '<section><h2>Photo</h2>';
							$query->the_post();
							?>
							<article>
								<a href="<?php the_permalink();?>">
									<h2><?php the_title(); ?></h2>
									<?php the_post_thumbnail('large'); ?>
								</a>
								<?php the_excerpt(); ?>

							</article>

							<?php
						}

						wp_reset_postdata();
						echo '</section>';
				}
			?>


		<?php
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
