<?php
/**
 * Template Name: Specials
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

	<div class="row">
		<!-- BEGIN of page content -->
		<div class="small-12 columns">
			<main class="main-content">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<article <?php post_class(); ?>>
							<?php the_content('',true); ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</main>
		</div>
		<!-- END of page content -->
	</div>

<?php if (have_rows('specials')) : ?>
	<div class="row specials">
		<?php while(have_rows('specials')) : the_row(); ?>
			<div class="medium-6 small-12 columns specials-item matchHeight">
				<?php if ($title = get_sub_field('title')): ?>
					<h5 class="specials-item-title"><?php echo $title; ?></h5>
				<?php endif ?>
				<?php if ($image = get_sub_field('image')): ?>
					<a href="<?php echo $image['sizes']['large']?>" class="fancybox specials-item-image"><img src="<?php echo $image['sizes']['large']?>" alt="<?php echo $image['alt'] ?>" ></a>
				<?php endif ?>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>