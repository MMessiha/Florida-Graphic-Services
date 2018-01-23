<?php
/**
 * Template Name: About
 */
get_header(); ?>

<div class="template-about">
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

	<?php if (have_rows('menegers')) : ?>
		<div class="row menedgers">
			<?php while(have_rows('menegers')) : the_row(); ?>
				<div class="small-12 columns meneger">
					<?php the_sub_field('meneger'); ?>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php if ($content = get_field('section_1')) : ?>
		<div class="team_1">
			<img class="team-bg-image" src="<?php echo get_stylesheet_directory_uri() . '/images/rectangle1.png' ?>" alt="">
			<div class="row">
				<div class="small-12 columns team-content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($content = get_field('section_2')) : ?>
		<div class="team_2">
			<img class="team-bg-image" src="<?php echo get_stylesheet_directory_uri() . '/images/rectangle2.png' ?>" alt="">
			<div class="row">
				<div class="small-12 columns team-content">
					<?php echo $content; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>




<?php get_footer(); ?>