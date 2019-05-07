<?php
get_header();
//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();
$author_id = get_the_author_meta( 'ID' );

$number = get_the_author_meta('ナンバー');
$cosplayname = get_the_author_meta('コスプレネーム');
$birthday = get_the_author_meta('バースデー');
$address = get_the_author_meta('出身地');
$age = get_the_author_meta('年齢');
$pr = get_the_author_meta('自己pr');
$twitter_url = get_the_author_meta('twitter_url');
$youtube_url = get_the_author_meta('youtube_url');
$instagram_url = get_the_author_meta('instagram_url');


$size = 'full';
$main_image = get_field('メイン画像', 'user_'. $author_id );
$twitter_image = get_field('twitter画像', 'user_'. $author_id );
$youtube_image = get_field('youtube画像', 'user_'. $author_id );
$instagram_image = get_field('instagram画像', 'user_'. $author_id );

?>
	<article id="maincontent">
		<section class="sec-profile-detail">
			<div class="main-content">
				<div class="wrapprer">
					<div class="img-avatar">
						<?php if( $main_image ) echo wp_get_attachment_image( $main_image, $size ); ?>
					</div>
					<div class="content">
						<h1 class="ttl" style="margin-left: 30px; font-weight: bold; font-family: rounded-x-mgenplus-2c-medium, sans-serif; text-shadow: white 2px 0px 2px, white -2px 0px 2px, white 0px -2px 2px, white -2px 0px 2px, white 2px 2px 2px, white -2px 2px 2px, white 2px -2px 2px, white -2px -2px 2px, white 1px 2px 2px, white -1px 2px 2px, white 1px -2px 2px, white -1px -2px 2px, white 2px 1px 2px, white -2px 1px 2px, white 2px -1px 2px, white -2px -1px 2px, white 1px 1px 2px, white -1px 1px 2px, white 1px -1px 2px, white -1px -1px 2px;"><span class="subtit" style="font-size: 20px;">仮想×通貨女子 No.<?php echo sprintf('%03d', $number); ?></span><br><span class="name" style="color: #ff7c9b; font-size: 50px; display: inline-block; margin-top: 10px; padding-top: 10px; border-top: 4px solid #FEB1C3;"><?php echo $cosplayname; ?></span></h1>
						<ul class="list_sns mtpc-18 mtsp-10">
							<li><a href="<?php echo $twitter_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_twitter30.png" alt="tw"></a></li>
							<li><a href="<?php echo $instagram_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_insta30.png" alt="insta"></a></li>
							<li><a href="<?php echo $youtube_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/snsicon_youtube.png" alt="ytb"></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="mbpc-100 mtpc-20 mtsp-25">
				<div class="container container-02 pbpc-35 pbsp-20">
					<div class="sec-detail mbpc-20 mbsp-20">
						<div class="wrapprer">
							<p class="btn-links">
								<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_01.png" alt="プロフィール">
								<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_01_sp.png" alt="プロフィール">
							</p>
							<ul class="list-profile-detail">
								<li>
									<div class="img">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_01.png" alt="01">
									</div>
									<div class="content">
										<p class="ttl pc"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_01.png" alt="コスプレネーム">
										<p class="ttl sp"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_01_sp.png" alt="コスプレネーム">
										</p>
										<p class="txt"><?php echo $cosplayname; ?></p>
									</div>
								</li>
								<li>
									<div class="img">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_02.png" alt="02">
									</div>
									<div class="content">
										<p class="ttl pc"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_02.png" alt="バースデー">
										<p class="ttl sp"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_02_sp.png" alt="バースデー">
										</p>
										<p class="txt"><?php echo $birthday; ?></p>
									</div>
								</li>
								<li>
									<div class="img">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_03.png" alt="03">
									</div>
									<div class="content">
										<p class="ttl pc"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_03.png" alt="出身地"></p>
										<p class="ttl sp"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_03_sp.png" alt="出身地"></p>
										<p class="txt"><?php echo $address; ?></p>
									</div>
								</li>
								<li>
									<div class="img">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_04.png" alt="04">
									</div>
									<div class="content">
										<p class="ttl pc"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_04.png" alt="年齢"></p>
										<p class="ttl sp"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_04_sp.png" alt="年齢"></p>
										<p class="txt"><?php echo $age; ?></p>
									</div>
								</li>
								<li>
									<div class="img">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_05.png" alt="05">
									</div>
									<div class="content">
										<p class="ttl pc"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_05_sp.png" alt="自己PR"></p>
										<p class="ttl sp"><img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ttl_05_sp.png" alt="自己PR"></p>
										<p class="txt"><?php echo $pr; ?></p>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sec-detail mbpc-20 mbsp-20">
						<div class="wrapprer">
							<p class="btn-links">
								<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_03.png" alt="ギャラリー">
								<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_03_sp.png" alt="ギャラリー">
							</p>
							<ul class="list-profile-sns mtpc-30 mtsp-20">
								<li>
									<a class="btn-sns" href="" target="_blank">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_tw.png" alt="tw">
									</a>
									<div class="sns-content">
										<?php if( $twitter_image ) echo wp_get_attachment_image( $twitter_image, $size ); ?>
									</div>
								</li>
								<li>
									<a class="btn-sns" href="" target="_blank">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_yt.png" alt="ytube">
									</a>
									<div class="sns-content">
										<?php if( $youtube_image ) echo wp_get_attachment_image( $youtube_image, $size ); ?>
									</div>
								</li>
								<li>
									<a class="btn-sns" href="" target="_blank">
										<img src="<?php echo $temp_url; ?>/assets/images/profile/detail/ico_instagram.png" alt="insta">
									</a>
									<div class="sns-content">
										<?php if( $instagram_image ) echo wp_get_attachment_image( $instagram_image, $size ); ?>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="sec-detail">
						<div class="wrapprer">
							<p class="btn-links">
								<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_02.png" alt="個別記事一覧">
								<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/detail/btn_02_sp.png" alt="個別記事一覧">
							</p>
							<ul class="profile-item mtpc-10 mtsp-5">
								<?php
								$author = get_query_var('author');
								$paged = get_query_var('paged');
								$posts = query_posts('posts_per_page=4&author=' . $author . '&paged=' . $paged);
								?>
								<?php foreach($posts as $post): setup_postdata($post); ?>
								<li>
									<a href="<?php the_permalink(); ?>">
										<div class="img">
										    <?php if (has_post_thumbnail()) : ?>
										        <?php the_post_thumbnail('full'); ?>
										    <?php else : ?>
										        <img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
										    <?php endif ; ?>
										</div>
										<div class="content">
											<p class="date"><?php echo get_the_date(); ?></p>
											<p class="ttl pc"><?php echo get_the_title(); ?></p>
											<?php $excerpt = get_the_excerpt();

											//var_dump($excerpt);

											?>
											<p class="txt pc"><?php echo $excerpt; ?></p>
											<p class="ttl sp"><?php echo get_the_title(); ?></p>
										</div>
									</a>
								</li>
							<?php endforeach; ?>
							</ul>
							<div class="morebtn-syle02">
								<a href="#" class="rollover btn-more">もっと見る</a>
							</div>
						</div>
					</div>
				</div>
				<div class="currency_detail"></div>
			</div>
		</section>
	</article>
<?php
while ( have_posts() ) : the_post();
?>
<?php


/*
	if(is_page('information')) {
		get_template_part( 'template-parts/page/information');
	} else if(is_page('blog')) {
		get_template_part( 'template-parts/page/blog');
	} else if(is_page('profile')) {
		get_template_part( 'template-parts/page/profile');
	} else if(is_page('faq')) {
		get_template_part( 'template-parts/page/faq');
	} else if(is_page('recruit')) {
		get_template_part( 'template-parts/page/recruit');
	} else if(is_page('about-aflac')) {
		get_template_part( 'template-parts/page/about-aflac');
	} else {
		get_template_part( 'template-parts/page/page');
	}
*/

endwhile; // End of the loop.
?>

<?php get_footer();
