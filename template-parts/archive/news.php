<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();

$id = get_the_ID();

$cat = get_the_category();
$catname = $cat[0]->cat_name;
$catslug = $cat[0]->slug;
?>


			<div class="text">
				<p class="meta"><span class="date"><?php the_time('Y.m.d'); ?></span><span class="cat"><?php echo $catname; ?></span></p>
		<a href="<?php the_permalink(); ?>" class="clearfix">
				<h3><?php the_title(); ?></h3>
		</a>
			</div>
