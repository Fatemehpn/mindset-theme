<?php
/**
 * The template for displaying home page
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
			// get_template_part( 'template-parts/content', 'page' );
		?>

	<section class="home-intro">
		<?php
			the_post_thumbnail('large');
		?>
		<?php
			if(function_exists('get_field')){
				// check if it has something in it
					if(get_field('top_section')){
							the_field('top_section');
					}
			}
		?>
	</section>
	<?php
		$args = array(
			'post_type'      => 'fwd-work',
			'posts_per_page' => 4
		);
		
		$query = new WP_Query($args);
		
		if($query->have_posts()){
			?>
			<section class="home-work">
				<h2><?php esc_html_e('Featured Works','fwd'); ?></h2>
				<?php
				while($query->have_posts()){
					$query->the_post();
					?>
					<article>
						<a href="<?php the_permalink();?>">
							<?php the_post_thumbnail('medium'); ?>
							<h3><?php the_title(); ?></h3>
						</a>

					</article>
					<?php
				}
				?>
				</section>
				<?php
				wp_reset_postdata();
		}
		?>

	<section class="home-work">  </section>

	<section class="home-left">
		<?php
			if(function_exists('get_field')){
				if(get_field('left_section_heading')){
					echo '<h2>';
					the_field('left_section_heading');
					echo '</h2>';
				}

				if(get_field('left_section_content')){
					echo '<p>';
					the_field('left_section_content');
					echo '</p>';
				}
				
			
			}
		?>
	</section>

	<section class="home-right">
		<?php
					if(function_exists('get_field')){
						if(get_field('right_section_heading')){
							echo '<h2>';
							the_field('right_section_heading');
							echo '</h2>';
						}
		
						if(get_field('right_section_content')){
							echo '<p>';
							the_field('right_section_content');
							echo '</p>';
						}
					}
		?>
	</section>
	<section class="home-slider"></section>
	<section class="home-blog">
		<h2><?php esc_html_e('Latest blog posts', 'fwd'); ?></h2>  
		<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 4,
			);
			// make the request to db
			$blog_query = new WP_Query($args);

			// make sure if it found something from db
			if($blog_query -> have_posts()){
					while($blog_query -> have_posts()){
							$blog_query -> the_post();	
							?>
							<article>
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
									<p><?php 
											echo esc_html(get_the_date()); 
									?></p>
									<?php 
									the_post_thumbnail('landscape-blog');
									?>
								</a>
							</article>

							<?php
					}
					wp_reset_postdata();
			}
		?>
	</section>

			
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
