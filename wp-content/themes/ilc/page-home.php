<?php
/**
 * Template Name: Home
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ilc
 */

get_header(); ?>
	<?php //putRevSlider( 'news-gallery-post-based5' ); ?>
	<div id="primary" class="content-home">
		<main id="main" role="main">
			<div id="home-posts" class="latest-posts">
				<div class="container">
				<h2>Latest Posts</h2>
					<?php
					$args = array( 'posts_per_page' => 2, 'category' => 1, 'category__not_in' => 442 );
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="post-container">
							<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
?>
						<a href="<?php the_permalink(); ?>"><div class="post-image" style="background: url(<?php bloginfo('template_directory'); ?>/images/ilc-post-bg.png); background: url(<?php echo $src[0]; ?> ); background-size:cover; background-position: center top"> </div></a>
						<div class="post-content">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<p><?php $content = get_the_content();
					      $content = strip_tags( strip_shortcodes( $content ) );
					      echo substr($content, 0, 140);
					?>…
					</p><a class="button" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More <i class="fa fa-chevron-right"></i></a>
						</div>
					</div>
					<?php endforeach; 
					wp_reset_postdata();?>
						
					
				</div>
			</div><!-- #home-posts -->

			<div class="home-about">
				<div class="post-container">
				<?php
			while ( have_posts() ) : the_post();
				
				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
