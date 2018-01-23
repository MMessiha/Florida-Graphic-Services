<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

	<?php if ($slider = get_field('slider')): ?>
		<div class="row expanded home-slider">
			<?php
				echo do_shortcode($slider);
			?>
		</div>
	<?php endif ?>

	<div class="form-section">
		<img class="fs-bgi-left" src="<?php echo get_stylesheet_directory_uri() . '/images/arrows-shape.png' ?>" alt="">
		<img class="fs-bgi-right" src="<?php echo get_stylesheet_directory_uri() . '/images/arrows-shape2.png' ?>" alt="">
		<div class="row">
			<div class="medium-7 small-12 columns matchHeight fs-content-wrapper">
				<div class="form-section-content">
					<?php if ($content = get_field('form_content')): ?>
						<?php echo $content; ?>
					<?php endif ?>
				</div>
			</div>
			<div class="medium-5 small-12 columns form-section-columns matchHeight">
				<?php if ($form_object = get_field('form')): ?>

					<div class="form-section-form">
						<?php if ($header = get_field('form_title')): ?>
							<h3 class="gform_title"><?php echo $header; ?></h3>
						<?php endif ?>
						<?php
						gravity_form_enqueue_scripts($form_object['id'], true);
						gravity_form($form_object['id'], true, true, false, '', true, 1); ?>
					</div>
					<script type="text/javascript">
						jQuery(document).on('gform_post_render', function(e, form_id) {
							if ( jQuery('div.validation_error').length > 0 ) {
								jQuery('.matchHeight').matchHeight();
							}
						});
						jQuery(document).bind('gform_confirmation_loaded', function(event, formId){
						    jQuery('.matchHeight').matchHeight();
						});
					</script>
				<?php endif ?>
			</div>
		</div>
	</div>

	<?php if (have_rows('services')) : ?>
		<div class="services clearfix">
			<?php if ($header = get_field('services_header')): ?>
				<div class="row columns text-center services-header">
					<h2 class="header-line"><?php echo $header; ?></h2>
				</div>
			<?php endif; ?>
			<div class="services-items">
				<?php $column_count = count(get_field('services')); ?>
				<?php while(have_rows('services')) : the_row(); ?>
					<?php $category = get_sub_field('category'); ?>
					<?php $page = get_sub_field('category_page'); ?>
					<?php $image = get_field('image', $category); ?>
					<a class="services-item col-<?php echo $column_count; ?>" href="<?php echo $page . '#' . $category->slug; ?>">
						<div class="services-item-image" <?php bg($image['sizes']['large']) ?>>
							<h3 class="services-item-header underline"><?php echo $category->name; ?></h3>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

<?php $posts = get_field('portfolio'); ?>
<?php if( $posts ): ?>
	<?php $posts_count = count(get_field('portfolio')); ?>
	<?php $col_width = 12/($posts_count); ?>
	<?php if ($col_width < 3): ?>
		<?php $col_width = 3; ?>
	<?php endif ?>
	<div class="portfolio">
		<?php if ($header = get_field('portfolio_header')): ?>
			<div class="row expanded text-center portfolio-header">
				<img class="portfolio-bg-image" src="<?php echo get_stylesheet_directory_uri() . '/images/arrows-shape3.png' ?>" alt="">
				<h2 class="header-line"><?php echo $header; ?></h2>
			</div>
		<?php endif; ?>
		<div class="row expanded portfolio-items">
			<?php foreach( $posts as $p ): ?>
				<a class="portfolio-item large-<?php echo $col_width; ?> medium-6 small-12" href="<?php echo get_permalink( $p->ID ); ?>">
					<?php $image = get_the_post_thumbnail_url( $p->ID, 'large' ) ?>
					<div class="portfolio-item-image" <?php bg($image) ?>>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>



<?php $images = get_field('clients_logo');
if( $images ): ?>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('.clients-items').slick({
				arrows: false,
				dots: false,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 2500,
				slidesToShow: 8,
				slidesToScroll: 1,
				slide: '.clients-item', // Cause trouble with responsive settings
				responsive: [
					{
						breakpoint: 1367,
						settings: {
							slidesToShow: 6,
							slidesToScroll: 6,
						}
					},
					{
						breakpoint: 1025,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 4,
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
			   ]
			});
		});
	</script>
   <div class="clients">
		<?php if ($header = get_field('clients_header')): ?>
			<div class="row expanded text-center clients-header">
				<img class="clients-bg-image" src="<?php echo get_stylesheet_directory_uri() . '/images/arrows-shape4.png' ?>" alt="">
				<h2 class="header-line"><?php echo $header; ?></h2>
			</div>
		<?php endif; ?>
		<div class="clients-items">
			<?php foreach( $images as $image ): ?>
				<div class="clients-item matchHeight">
					<img class="" src="<?php echo $image['sizes']['medium_large']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endforeach; ?>
     	</div>
   </div>
<?php endif; ?>


<?php get_footer(); ?>