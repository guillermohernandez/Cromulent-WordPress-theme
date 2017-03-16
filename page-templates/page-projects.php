<?php
/**
 * Template Name: Projects Page Template
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

						<?php get_template_part( 'loop-templates/content', 'slim' ); ?>

							<?php 

							// args
							$args = array(
								'numberposts'	=> -1,
								'post_type'		=> 'side_projects',
							);


							// query
							$the_query = new WP_Query( $args );

							?>
							<?php if( $the_query->have_posts() ): ?>
								<div class="card-columns">

								<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<div class="card text-center nimated fadeIn">
									<a href="<?php the_permalink(); ?>">
									<img class="card-img-top img-fluid" src="<?php the_field('project_thumb'); ?>" />
									</a>
								<div class="card-block card-inverse card-primary">
								<?php the_title( '<h4 class="card-title">', '</h4>' ); ?>
								</div>
								<div class="card-footer align-bottom">
								<a href="<?php the_field('github_url'); ?>" class="btn btn-secondary">Github</a>
								<?php if( get_field('show_demo_url')): ?>
								<a href="<?php the_field('demo_url'); ?>" class="btn btn-outline-demo">View Demo</a>
								<?php endif; ?>
								</div>
								
								</div>

								

								</div>
								<?php endwhile; ?>
								</div>
							<?php endif; ?>
								<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								) );
								?>
							<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>

