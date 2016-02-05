<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ilc
 */

?>

	</div><!-- #content -->
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Above the Footer')) : ?>
		[ do default stuff if no widgets ]
	<?php endif; ?>
<?php $twitter_url = get_theme_mod('twitter', ''); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-branding">
				<?php if( get_theme_mod( 'ilc_logo') != "" ): ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img id="logo" alt="<?php bloginfo( 'name' ); ?>" src="<?php echo get_theme_mod( 'ilc_logo' ); ?>"></a>
      	<?php endif; ?>
			</div><!-- .site-branding -->
			<div class="secondary-navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_id' => 'secondary-menu' ) ); ?>
				<div class="social-icons">
					<?php my_social_media_icons(); ?>
  			</div>
			</div>
		</div>
		<div class="site-info">
			<p>&copy; 2005 - <?php echo date("Y") ?> International Lutheran Council. All rights reserved.</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
