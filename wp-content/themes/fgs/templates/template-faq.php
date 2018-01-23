<?php
/**
 * Template Name: FAQ
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

<?php if (have_rows('faqs')) : ?>
	<div class="row faqs">
		<div class="small-12 columns">
			<ul class="accordion" data-accordion data-allow-all-closed="true" data-multi-expand="true">
				<?php while(have_rows('faqs')) : the_row(); ?>
					<li class="accordion-item" data-accordion-item>
						<a href="#" class="accordion-title"><?php the_sub_field('question') ?></a>
						<div class="accordion-content" data-tab-content >
							<?php the_sub_field('answer') ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</div>
<?php endif; ?>

<?php get_footer(); ?>