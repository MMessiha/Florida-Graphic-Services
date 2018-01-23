<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<div class="row footer-top">
		<div class="medium-9 small-12 columns">
			<?php
			if (has_nav_menu('footer-menu')) {
				wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu','depth'=>1));
			}
			?>
		</div>
		<div class="medium-3 small-12 columns text-center medium-text-right footer-socials">
			<?php if ($header = get_field('socials_header', 'options')): ?>
				<h5><?php echo $header; ?></h5>
			<?php endif ?>
			<?php if (have_rows('socials', 'options')): ?>
			  <ul>
			     <?php  while (have_rows('socials', 'options')): the_row(); ?>
			           <li>
			              <a href="<?php the_sub_field('social_profile_link'); ?>" target="_blank">
			                 <i class="fa fa-<?php the_sub_field('social_network'); ?>"></i>
			              </a>
			           </li>
			     <?php endwhile; ?>
			  </ul>
			<?php endif;?>
		</div>
	</div>
	<?php if ($copyright = get_field('copyright', 'options')): ?>
		<div class="row columns copyright"><?php echo $copyright; ?></div>
	<?php endif ?>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
