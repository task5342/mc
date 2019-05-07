<?php
get_header();

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();

$cat = get_the_category();
$cat = $cat[0];
$cat_slug = $cat->slug;
$cat_name = $cat->cat_name;

?>
	<div class="container-fluid c-page-mainv">
		<div class="page-mainv-txts">
			<h1 class="page-mainv-ltxt"><img src="<?php echo $temp_url; ?>/assets/images/information/main.png" alt="仮装×通貨女子通信 -Blog-">
			</h1>
		</div>
	</div>
	<article id="maincontent" class="information">
		<section class="currency_newpost_list clearfix">
			<div class="currency_newpost_inner clearfix">

			<div class="list-links-img mbpc-35">
				<a href="/category/exchanges/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-01.png" alt="取引所"></a>
				<a href="/category/ico/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-02.png" alt="ICO"></a>
				<a href="/category/domestic/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-03.png" alt="国内銘柄"></a>
				<a href="/category/foreign/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-04.png" alt="海外銘柄"></a>
				<a href="/category/beginners/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-05.png" alt="初心者向け"></a>
				<a href="/category/etc/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-06.png" alt="いろいろ"></a>
			</div>
			<div class="wrapper mb150">
		<?php
			$args = array(
				'numberposts' => -1,       //表示（取得）する記事の数
				'post_type' => 'post',    //投稿タイプの指定
				'category_name' => $cat_slug,
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$posts = get_posts( $args );

			echo '<ul class="girls_blog-list mbpc-30 mbsp-20 clearfix">';
			if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

				$user = get_userdata($post->post_author);
				$uid = $user->ID;
				$role = implode( ', ', $user->roles );
				$size = 'full';
				if($role == 'administrator'):
			?>
				<a href="<?php the_permalink(); ?>" class="currency_newpost_one">
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
								<div class="currency_newpost_one_head <?php echo $cat_class; ?>">
									<p>
									<?php
									echo $cat_name;
									?></p>
								</div>
								<p class="currency_newpost_date"><?php echo get_the_date(); ?></p>
								<h2 class="currency_newpost_title">
									<?php
									if(mb_strlen($post->post_title)>20) {
									  $title= mb_substr($post->post_title,0,20) ;
									    echo $title . '...';
									  } else {
									    echo $post->post_title;
									  }
									?>
								</h2>
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
				</a>
			<?php
			endif;
			endforeach; endif;
			echo '</ul>';
			wp_reset_postdata();
			?>
			</div>
			</div>
		</section>
	</article>
	<!-- maincontent -->



<?php get_footer();
