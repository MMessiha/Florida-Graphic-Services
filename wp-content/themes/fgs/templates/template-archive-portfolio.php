<?php
/**
 * Template Name: Archive Portfolio
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

<?php $categories = get_field('portfolio_categories'); ?>

<?php if ($categories): ?>
	<div class="row columns archive-portfolio">
		<?php $i=1; ?>
		<ul class="tabs <?php echo ((count($categories)) < 2) ? 'hidden' : '' ?> " data-tabs id="archive-tabs">
			<?php foreach ($categories as $cat): ?>
				<li class="tabs-title <?php echo ($i == 1) ? 'is-active' : '' ?>"><a href="#<?php echo $cat->slug ?>" class="tabs-title-link" aria-selected="<?php echo ($i == 1) ? 'true' : 'false' ?>"><?php echo $cat->name ?></a></li>
				<?php $i++; ?>
			<?php endforeach; ?>
		</ul>
		<div class="tabs-content" data-tabs-content="archive-tabs">
			<?php $i=1; ?>
			<?php foreach ($categories as $cat): ?>
				<div class="tabs-panel <?php echo ($i == 1) ? 'is-active' : '' ?>" id="<?php echo $cat->slug ?>">

					<?php $arg = array(
						'order'		    => 'DESC',
						'orderby'	    => 'date',
						'posts_per_page'    => -1,
						'tax_query' => array(
							array(
								'taxonomy' => $cat->taxonomy,
								'field'    => 'slug',
								'terms'    => $cat->slug
							)
						)
					);
					$the_query = new WP_Query( $arg );
					if ( $the_query->have_posts() ) : ?>
						<?php $post_count = 1; ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php if ($post_count > 5) {
									$hidden = 'hidden';
								} else {
									$hidden = '';
								} ?>
								<div id="<?php echo $post->post_name ?>" <?php post_class("portfolio-post clearfix " . $hidden); ?>>
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
						<?php if ($post_count > 6): ?>
							<div class="view-more text-center">
								<button class="view-more-btn"><img class="fs-bgi-left" src="<?php echo get_stylesheet_directory_uri() . '/images/view-more.png' ?>" alt=""></button>
							</div>
						<?php endif ?>
					<?php endif; wp_reset_query(); ?>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif ?>




<?php get_footer(); ?>