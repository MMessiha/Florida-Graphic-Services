<?php
/*
*	Header Image Part
*/
 ?>

<?php $image = get_the_post_thumbnail_url(get_the_ID(), 'full_hd') ?>
<div class="header-image matchHeight" <?php bg($image) ?>>
	<div class="row columns matchHeight header-image-caption">
		<h1 class="page-title"><?php the_title(); ?></h1>
	</div>
</div>