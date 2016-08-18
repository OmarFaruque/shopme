<?php
/*
* index
*/
get_header();
?>
<div class="index_page">
	<?php if(have_posts()): while(have_posts()): the_post(); ?>
		<h3 class="page-title"><?= get_the_title(); ?></h3>
		<?php the_content(); ?>
	<?php endwhile; endif; ?>
</div>


<?php get_footer( ); ?>