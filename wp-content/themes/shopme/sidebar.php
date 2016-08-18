<?php
/*
* Sidebar
*/
?>
<aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3 sidebar">
	<?php if(is_dynamic_sidebar('main_sidebar')){ ?>
	<ul class="list-inline">
		<?php dynamic_sidebar( 'main_sidebar' ); ?>
	</ul>
	<?php } ?>
</aside>