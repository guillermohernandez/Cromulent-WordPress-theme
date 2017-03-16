<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

        <div class="jumbotron jumbotron-fluid wow fadeInLeft">
         <div class="container-fluid">
         <h1 class="display-3"><p><?php the_field('services_title'); ?></p></h1>
         <p class="lead"><?php the_field('services_blurb'); ?></p>
        </div>
        </div>

        <div class="jumbotron jumbotron-fluid wow fadeInLeft">
         <div class="container-fluid">
         <h1 class="display-3"><p><?php the_field('services_title_2'); ?></p></h1>
         <p class="lead"><?php the_field('services_blurb_2'); ?></p>
        </div>
        </div>

        <div class="jumbotron jumbotron-fluid wow fadeInLeft">
         <div class="container-fluid">
         <h1 class="display-3"><p><?php the_field('services_title_3'); ?></p></h1>
         <p class="lead"><?php the_field('services_blurb_3'); ?></p>
        </div>
        </div>

        <div class="jumbotron jumbotron-fluid wow fadeInLeft">
         <div class="container-fluid">
         <h1 class="display-3"><p><?php the_field('services_title_4'); ?></p></h1>
         <p class="lead"><?php the_field('services_blurb_4'); ?></p>
        </div>
        </div>

        <div class="jumbotron jumbotron-fluid wow fadeInLeft">
         <div class="container-fluid">
         <h1 class="display-3"><p><?php the_field('services_title_5'); ?></p></h1>
         <p class="lead"><?php the_field('services_blurb_5'); ?></p>
        </div>
        </div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
