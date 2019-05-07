<?php

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();


?>
	<div class="container-fluid c-page-mainv">
		<div class="page-mainv-txts">
			<h1 class="page-mainv-ltxt">
				<img src="<?php echo $temp_url; ?>/assets/images/blog/main.png" alt="仮装×通貨女子通信- Brog -">
			</h1>
		</div>
	</div>
	<article id="maincontent">
		<section id="girls_blog">
			<div class="wrapper mb150">


		<?php
			$args = array(
				'numberposts' => -1,       //表示（取得）する記事の数
				'post_type' => 'post',    //投稿タイプの指定
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$posts = get_posts( $args );

			echo '<ul class="girls_blog-list mbpc-30 mbsp-20 clearfix">';
			if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

				$user = get_userdata($post->post_author);
				$uid = $user->ID;
				$role = implode( ', ', $user->roles );
				$cosplayname = get_the_author_meta('コスプレネーム', $uid);
				$main_image = get_the_author_meta('メイン画像', $uid );
				$size = 'full';
				if($role != 'administrator'):
			?>

				<li class="item">
					<a href="<?php the_permalink(); ?>">
						<div class="img">
							<?php if( $main_image ) echo wp_get_attachment_image( $main_image, $size ); ?>
						</div>
						<div class="desc">
							<div class="ttl"><?php echo $cosplayname; ?></div>
							<div class="info">
								<div class="info-left">
									<p class="exerpt">
										<?php //echo get_the_title(); ?>
										<?php
										if(mb_strlen($post->post_title)>10) {
										  $title= mb_substr($post->post_title,0,10) ;
										    echo $title . '...';
										  } else {
										    echo $post->post_title;
										  }
										?>
									</p>
									<time class="post-time"><?php echo human_time_diff(get_the_time('U'),current_time('timestamp')).'前'; ?></time>
								</div>
									<?php
									// 投稿記事の取得
									$args = array(
									  'post_type'   => 'post',
									  'author'	    => $user->ID,
									  'numberposts' => 1,
									);
									?>
								<div class="info-right">
									<?php if (has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('full'); ?>
									<?php else : ?>
										<img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
									<?php endif ; ?>
								</div>
							</div>
						</div>
					</a>
				</li>
			<?php
			endif;
			endforeach; endif;
			echo '</ul>';
			wp_reset_postdata();
			?>
			</div>
		</section>
	</article>
	<!-- maincontent -->

