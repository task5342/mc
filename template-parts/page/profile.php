<?php

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();


/* カスタムフィールド取得 ----------------------------- */



?>


	<div class="container-fluid c-page-mainv mbpc-25">
		<div class="page-mainv-txts">
			<h1 class="page-mainv-ltxt">
				<img src="<?php echo $temp_url; ?>/assets/images/profile/img_main.png" alt="仮装×通貨女子 -Virtual × currency girls-">
			</h1>
		</div>
	</div>
	<article id="maincontent">
		<section>
			<div class="wrapper mbpc-100">
				<!--
				<div class="content-tab">
					<ul class="tabs">
						<li class="tab-link current" data-tab="tab-1">
							<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab01.png" alt="">
							<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab01_sp.png" alt="">
						</li>
						<li class="tab-link " data-tab="tab-2">
							<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab02.png" alt="">
							<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab02_sp.png" alt="">
						</li>
						<li class="tab-link w65" data-tab="tab-3">
							<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab03.png" alt="">
							<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab03_sp.png" alt="">
						</li>
						<li class="tab-link w65" data-tab="tab-4">
							<img class="pc" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab04.png" alt="">
							<img class="sp" src="<?php echo $temp_url; ?>/assets/images/profile/img_tab04_sp.png" alt="">
						</li>
					</ul>
				</div>
			-->
				<div class="currency_newpost_bg">
					<div id="tab-1" class="tab-content current currency_newpost_bgcol">
						<ul class="popular_girls_inner fix clearfix">
							<!--投稿者一覧を表示-->
							<?php
							//$users = get_users( array('orderby'=>ID,'order'=>ASC) );
							$users = get_users(
								array(
									'role'=>'author',
									'orderby'=>'ID',
									'order'=>'ASC',)
							);
							foreach($users as $user):
							    $uid = $user->ID;

							    $cosplayname = get_the_author_meta('コスプレネーム', $uid);
								$twitter_url = get_the_author_meta('twitter_url', $uid);
								$youtube_url = get_the_author_meta('youtube_url', $uid);
								$instagram_url = get_the_author_meta('instagram_url', $uid);

								$size = 'full';
								$main_image = get_field('メイン画像', 'user_'. $uid );

							    echo '<li class="popular_girls_one">';
							        echo '<h2 class="none">仮装通貨アカウント名</h2>';
							        echo '<a href="/author/'.$user->user_login.'">';
							        if( $main_image ) echo wp_get_attachment_image( $main_image, $size );
							        echo '</a>';
							        echo '<div class="popular_girls_one_info">';
							            echo '<h3><a href="/author/'.$user->user_login.'">'.$cosplayname.'</a></h3>';
										echo '<ul class="clearfix">';
											echo '<li><a href="'.$twitter_url.'"><img src="'.$temp_url.'/assets/images/snsicon_twitter30.png" alt="tw"></a></li>';
											echo '<li><a href="'.$instagram_url.'"><img src="'.$temp_url.'/assets/images/snsicon_insta30.png" alt="insta"></a></li>';
											echo '<li><a href="'.$youtube_url.'"><img src="'.$temp_url.'/assets/images/snsicon_youtube30.png" alt="ytb"></a></li>';
										echo '</ul>';
							        echo '</div>';
							    echo '</li>';
							endforeach;
							 ?>
						</ul>
					</div>

				</div>
			</div>
		</section>
	</article>
	<!-- maincontent -->

