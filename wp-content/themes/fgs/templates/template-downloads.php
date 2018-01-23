<?php
/**
 * Template Name: Downloads
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

	<?php if (have_rows('downloads')) : ?>
		<div class="row downloads">
			<?php while(have_rows('downloads')) : the_row(); ?>
				<div class="small-12 columns downloads-item">
					<h4 class="header-line"><?php the_sub_field('header'); ?></h4>
					<?php the_sub_field('description'); ?>
					<?php if ($link = get_sub_field('link')): ?>
					<?php $title = $link['title']; ?>
						<a class="downloads-item-link left-arrow" href="<?php echo $link['url']; ?>" <?php echo ($link['target']) ? 'target="_blank"' : '' ?>" ><?php echo ($title) ? $title : esc_html__( 'Click here to download', 'fgs' ); ?></a>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>