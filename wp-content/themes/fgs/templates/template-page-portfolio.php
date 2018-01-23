<?php
/**
 * Template Name: Portfolio
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

	<?php $categories = get_field('portfolio_categories'); ?>
	<?php if (have_posts()) : ?>
		<div class="row">
			<!-- BEGIN of page content -->
			<div class="small-12 columns">
				<main class="main-content">
					<?php while (have_posts()) : the_post(); ?>
						<article <?php post_class(); ?>>
							<?php the_content('',true); ?>
						</article>
					<?php endwhile; ?>
				</main>
			</div>
			<!-- END of page content -->
		</div>
	<?php endif; ?>

	<?php $arg = array(
        'post_type'	    => 'fgs_portfolio',
        'order'		    => 'DESC',
        'orderby'	    => 'date',
        'posts_per_page'    => -1,
        'meta_query' => array(
        		array(
					'key'     => 'gallery',
					'compare' => 'EXISTS',
				)
        ),

   );
   $the_query = new WP_Query( $arg );
   if ( $the_query->have_posts() ) : ?>
   	<?php $i = 0;
   	?>

      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php
				$images = get_field('gallery');

					$portfolio[$i]['id'] = $post->ID;
					$portfolio[$i]['slug'] = $post->post_name;
					$portfolio[$i]['title'] = $post->post_title;
					$portfolio[$i]['images'] = $images;

				$i++;
			?>
      <?php endwhile; ?>
   <?php endif; wp_reset_query(); ?>

<?php if ($portfolio): ?>
	<div class="row columns page-portfolio">
		<ul class="tabs" data-tabs id="portfolio-tabs">
			<?php $i = 1; ?>
			<?php foreach ($portfolio as $item): ?>
				<li class="tabs-title matchHeight <?php echo ($i == 1) ? 'is-active' : ''; ?>"><a href="#portfolio-<?php echo $item['id'] ?>" class="tabs-title-link" aria-selected="false"><?php echo $item['title'] ?></a></li>
				<?php $i++; ?>
			<?php endforeach; ?>
		</ul>
		<div class="tabs-content" data-tabs-content="portfolio-tabs">
			<?php $i = 1; ?>
			<?php foreach ($portfolio as $item): ?>
				<div class="tabs-panel  <?php echo ($i == 1) ? 'is-active' : ''; ?>" id="portfolio-<?php echo $item['id'] ?>">
					<div class="portfolio-slider">
						<?php foreach ($item['images'] as $image): ?>
							<?php show_template('portfolio-slider-item', array('image'=>$image)); ?>
						<?php endforeach ?>
					</div>
					<div class="portfolio-thumbnails">
						<?php $i = 0; ?>
						<?php foreach ($item['images'] as $image): ?>
							<div class="portfolio-thumbnail" data-index="<?php echo $i; ?>" <?php bg($image['sizes']['medium']) ?>></div>
							<?php $i++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif ?>

<?php get_footer(); ?>