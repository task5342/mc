<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();
?>

		<section id="girls_newpost">
			<h2 class="hidden_sp"><img src="<?php echo $temp_url; ?>/assets/images/girls_newpost_header.png" alt="仮装×通貨女子最新の投稿"></h2>
			<h2 class="hidden_pc"><img src="<?php echo $temp_url; ?>/assets/images/girls_newpost_header_sp.png" alt="仮装×通貨女子最新の投稿"></h2>

			<div class="girls_newpost_inner clearfix">
				<section class="girls_newpost_list clearfix">

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
		if($role != 'administrator'):
			$post_count++;
			if($post_count <= 6):
	?>
		<div class="girls_newpost_one">
			<div class="girls_newpost_one_inner clearfix">
				<div class="girls_newpost_one_inner_img">
				<?php if (has_post_thumbnail()) : ?>
				<?php the_post_thumbnail('full'); ?>
				<?php else : ?>
				<img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
				<?php endif ; ?>
				</div>
				<div class="girls_newpost_one_inner_info">
					<p class="girls_newpost_date"><?php echo get_the_date(); ?></p>
					<h3 class="girls_newpost_title"><a href="<?php echo the_permalink(); ?>">
						<?php
						if(mb_strlen($post->post_title)>15) {
						  	$title= mb_substr($post->post_title,0,15);
						    echo $title . '...';
						  } else {
						    echo $post->post_title;
						  }
						?></a></h3>
					<p class="girls_newpost_message"><?php
					$excerpt = get_the_excerpt();
					echo $excerpt;
					?></p>
					<div class="girls_newpost_account">
						<h4><?php
						$author_id = get_the_author_meta( 'ID' );
						$cosplayname = get_the_author_meta('コスプレネーム', $author_id);
						echo $cosplayname;

						$twitter_url = get_the_author_meta('twitter_url', $author_id);
						$youtube_url = get_the_author_meta('youtube_url', $author_id);
						$instagram_url = get_the_author_meta('instagram_url', $author_id);
						?></h4>
						<ul class="clearfix">
							<li><a href="<?php echo $twitter_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_twitter30.png" alt=""></a></li>
							<li><a href="<?php echo $instagram_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_insta30.png" alt=""></a></li>
							<li><a href="<?php echo $youtube_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_youtube30.png" alt=""></a></li>
						</ul>
						<div class="girls_newpost_account_img">
							<?php
								$size = 'full';
								$profile_image = get_field('プロフィール画像', 'user_'. $author_id );
							?>
							<img src="<?php echo $profile_image;?>" style="height: 100%; width: auto; max-width: none;">
						</div>
					</div>
				</div>
			</div>
		</div>


	<?php
	endif; endif;
	endforeach; endif;
	wp_reset_postdata();
	?>
	</section>

				<!-- 仮装×通貨女子注目の記事 -->
				<?php
				get_template_part( 'template-parts/top/girls_pickuppost_list');
				?>



			</div>
			<div class="morebtn hidden_sp">
				<a href="<?php echo $home_url; ?>/blog/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_blue01.png" alt="もっと見る"></a>
			</div>
			<div class="morebtn hidden_pc">
				<a href="<?php echo $home_url; ?>/blog/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_blue01_sp.png" alt="もっと見る"></a>
			</div>
		</div>
	</div>
</section>