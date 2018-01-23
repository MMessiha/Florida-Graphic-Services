<?php
/**
 * Template Name: Services
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

<?php if (have_rows('services')) : ?>
	<div class="row page-services">
		<?php while(have_rows('services')) : the_row(); ?>
			<div class="large-6 medium-12 columns">
				<?php $image = get_sub_field('image');
					if ($image):
						$image = $image['sizes']['large'];
					else :
						$image = get_stylesheet_directory_uri() . '/images/no-thumb.jpg';
					endif ?>
				<div class="page-services-item" <?php bg($image) ?>>
					<?php if ($title = get_sub_field('title')): ?>
						<h4 class="page-services-item-title"><?php echo $title; ?></h4>
					<?php endif ?>
						<div class="page-services-item-content">
							<div class="ps-content-wrapper">
								<?php if ($title): ?>
									<h4><?php echo $title; ?></h4>
								<?php endif ?>
								<?php if ($content = get_sub_field('content')): ?>
									<?php echo $content; ?>
								<?php endif ?>
							</div>
						</div>

				</div>
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>

<?php get_footer(); ?>