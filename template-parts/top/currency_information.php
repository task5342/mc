<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();
?>

		<section id="currency_newpost">
			<div class="currency_newpost_bg">
				<div class="currency_newpost_bgcol">
					<h2 class="hidden_sp"><img src="<?php echo $temp_url; ?>/assets/images/currency_newpost_header.png" alt="最新通貨情報"></h2>
					<h2 class="hidden_pc"><img src="<?php echo $temp_url; ?>/assets/images/currency_newpost_header_sp.png" alt="最新通貨情報"></h2>
					<div class="currency_newpost_inner clearfix">
						<section class="currency_newpost_list clearfix">

<?php
	$args = array(
		'numberposts' => 50,       //表示（取得）する記事の数
		'post_type' => 'post',    //投稿タイプの指定
		'orderby' => 'date',
		'order' => 'DESC'
	);
	$posts = get_posts( $args );
	$post_count = 0;
	if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

		$user = get_userdata($post->post_author);
		$uid = $user->ID;
		$role = implode( ', ', $user->roles );
		$size = 'full';
		if($role == 'administrator'):
			$post_count++;
			if($post_count <= 6):
	?>

		<section class="currency_newpost_one">
			<div class="currency_newpost_one_inner">
				<div class="cuurency_newpost_one_info clearfix">
					<div class="currency_newpost_one_infotxt">
						<?php
							$cat = get_the_category();
							$cat = $cat[0];
							$cat_name = $cat->cat_name;
							$cat_class = 'head_stlipe01';
							if($cat_name == '取引所') {
								$cat_class = "head_stlipe01";
							} else if($cat_name == 'ICO') {
								$cat_class = "head_stlipe02";
							} else if($cat_name == '国内銘柄') {
								$cat_class = "head_stlipe03";
							} else if($cat_name == '海外銘柄') {
								$cat_class = "head_stlipe04";
							} else if($cat_name == '初心者向け') {
								$cat_class = "head_stlipe05";
							} else if($cat_name == 'いろいろ') {
								$cat_class = "head_stlipe06";
							}
						?>
						<div class="currency_newpost_one_head  <?php echo $cat_class; ?>"><p>
							<?php
							echo $cat_name;
							?></p></div>
						<p class="currency_newpost_date"><?php echo get_the_date(); ?></p>
						<h3 class="currency_newpost_title"><a href="<?php the_permalink(); ?>">				<?php
						if(mb_strlen($post->post_title)>13) {
						  	$title= mb_substr($post->post_title,0,13);
						    echo $title . '...';
						  } else {
						    echo $post->post_title;
						  }
						?></a></h3>
					</div>
					<?php if (has_post_thumbnail()) : ?>
						<?php the_post_thumbnail('full'); ?>
					<?php else : ?>
						<img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
					<?php endif ; ?></div>
				<div class="currency_newpost_one_content">
					<p><?php
					$excerpt = get_the_excerpt();
					echo $excerpt;
					?></p>
				</div>
			</div>
		</section>
	<?php
	endif; endif;
	endforeach; endif;
	wp_reset_postdata();
	?>
	</section>

	<!-- 通貨情報注目の記事 -->
	<?php
	get_template_part( 'template-parts/top/currency_pickuppost_list');
	?>


			</div>
			<div class="morebtn hidden_sp">
				<a href="<?php echo $home_url; ?>/information/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_pink02.png" alt="もっと見る"></a>
			</div>
			<div class="morebtn hidden_pc">
				<a href="<?php echo $home_url; ?>/information/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_pink02_sp.png" alt="もっと見る"></a>
			</div>
		</div>
	</div>
</section>