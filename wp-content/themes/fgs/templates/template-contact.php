<?php
/**
 * Template Name: Contact
 */
get_header(); ?>

	<?php show_template('header-image'); ?>

<div class="row columns contact-page">
	<ul class="tabs" data-tabs id="contact-tabs">
		<li class="tabs-title is-active" id="title-contact"><a href="#contact" class="tabs-title-link" aria-selected="true"><?php echo ($header = get_field('contact_header')) ? $header : esc_html__( 'Contact us', 'fgs' ) ; ?></a></li>
		<li class="tabs-title" id="title-quote"><a href="#quote" class="tabs-title-link" ><?php echo ($header = get_field('quote_header')) ? $header : esc_html__( 'Request a quote', 'fgs' ) ; ?></a></li>
	</ul>

	<div class="tabs-content" data-tabs-content="contact-tabs">
		<div class="tabs-panel is-active" id="contact">
			<?php if ($content = get_field('contact_description')): ?>
				<?php echo $content; ?>
			<?php endif ?>
			<?php if ($form_object = get_field('contact_form')): ?>
				<div class="contact-form">
					<?php
					gravity_form_enqueue_scripts($form_object['id'], true);
					gravity_form($form_object['id'], true, true, false, '', true, 1); ?>
				</div>
			<?php endif ?>
		</div>
		<div class="tabs-panel" id="quote">
			<?php if ($content = get_field('quote_description')): ?>
				<?php echo $content; ?>
			<?php endif ?>
			<?php if ($form_object = get_field('quote_form')): ?>
				<div class="contact-form">
					<?php
					gravity_form_enqueue_scripts($form_object['id'], true);
					gravity_form($form_object['id'], true, true, false, '', true, 1); ?>
				</div>
			<?php endif ?>
		</div>
	</div>
</div>


<?php get_footer(); ?>