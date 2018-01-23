<?php
/**
 * Index
 *
 * Standard loop for the search result page
 */
get_header(); ?>

	<?php $image = get_field('header_image', 'options'); ?>
	<div class="header-image matchHeight" <?php bg($image['sizes']['full_hd']) ?>>
		<?php if ($title = get_field('search_page_title', 'options')): ?>
			<div class="row columns matchHeight header-image-caption">
				<h1 class="page-title"><?php echo $title; ?></h1>
			</div>
		<?php endif ?>
	</div>

	<!-- BEGIN of search results -->
	<div class="row columns posts-list">
		<main class="main-content archive-portfolio">
			<?php global $wp_query; ?>
			<?php get_search_form(); ?>
			<?php if (have_posts()) : ?>
				<?php $post_count = 1; ?>
				<?php while (have_posts()) : the_post(); ?>
					<?php if ($post_count > 5) {
									$hidden = 'hidden';
								} else {
									$hidden = '';
								} ?>
								<div id="portfolio-<?php the_ID(); ?>" <?php post_class("portfolio-post clearfix " . $hidden); ?>>
									<div title="<?php the_title_attribute(); ?>" class="portfolio-post-thumbnail">
										<?php if ( has_post_thumbnail()) : ?>
											<?php the_post_thumbnail('portfolio_thumb', array('class' => 'img-responsive')); ?>
										<?php else : ?>
											<img src="<?php echo get_stylesheet_directory_uri() . '/images/no-thumb.jpg' ?>" alt="" class="img-responsive">
										<?php endif; ?>
									</div>
									<div class="portfolio-post-content">
										<h3 class="header-line portfolio-title text-left"><?php the_title(); ?></h3>
										<div class="portfolio-description">
											<?php if ($description = get_field('description', $post->ID)): ?>
												<?php echo $description; ?>
											<?php endif ?>
										</div>
										<a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e('VIEW PORTFOLIO', 'fgs') ?></a>
									</div>
								</div>
							<?php $post_count++; ?>
						<?php endwhile; ?>
						<?php if ($post_count > 5): ?>
							<div class="view-more text-center">
								<button class="view-more-btn"><img class="fs-bgi-left" src="<?php echo get_stylesheet_directory_uri() . '/images/view-more.png' ?>" alt=""></button>
							</div>
						<?php endif ?>
			<?php else: ?>
				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foundation' ); ?></p>
			<?php endif; ?>
			<!-- BEGIN of pagination -->
			<?php foundation_pagination(); ?>
			<!-- END of pagination -->
		</main>
	</div>
	<!-- END of search results -->

<?php get_footer(); ?>