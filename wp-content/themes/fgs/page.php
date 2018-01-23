<?php
/**
 * Page
 */
get_header(); ?>


<?php show_template('header-image'); ?>

<main class="main-content">
	<div class="main-content-page">
		<img class="main-bg-image" src="<?php echo get_stylesheet_directory_uri() . '/images/arrows-shape5.png' ?>" alt="">
		<div class="row">
			<div class="small-12 columns">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<article <?php post_class(); ?>>
								<?php the_content('',true); ?>
							</article>
						<?php endwhile; ?>
					<?php endif; ?>
			</div>
		</div>
	</div>

	<?php $content = get_field('content'); ?>
	<?php if ($content): ?>
	<?php $image = get_field('background_image'); ?>
		<div class="dark-section" <?php ($image) ? bg($image['sizes']['full_hd']) : '' ?>>
			<div class="row columns dark-section-content">
				<?php echo $content; ?>
			</div>
		</div>
	<?php endif ?>
</main>

<?php get_footer(); ?>