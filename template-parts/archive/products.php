<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();

$id = get_the_ID();

?>

	<div class="news-list-inr">
		<a href="<?php the_permalink(); ?>" class="clearfix">
			<div class="thumbnail">
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail();
				}else {
					echo '<img src="' . $temp_url . '/assets/img/top/news_thumbnail_def.jpg" />';
				}
				$cat = get_the_category();
				$catname = $cat[0]->cat_name;
				$catslug = $cat[0]->slug;
				?>
			</div>
			<div class="text">
				<p class="meta"><span class="date"><?php the_time('Y.m.d'); ?></span><span class="cat"><?php echo $catname; ?></span></p>
				<h3><?php the_title(); ?></h3>
				<p><?php
				if(mb_strlen(get_the_excerpt(), 'UTF-8')>50){
					$excerpt= mb_substr(strip_tags($post-> post_content),0,44);
					echo $excerpt.'...';
				}else{
					echo mb_substr(strip_tags($post-> post_content),0,44);
				}
				?></p>
			</div>
		</a>
	</div>

