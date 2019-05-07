<?php
get_header();
$temp_url = get_template_directory_uri();
?>

<?php
	if (is_archive('news')) {
?>


		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="title-h2"><i class="icon-news"></i>お知らせ</h2>
						<div class="row">
		<?php
			$args = array(
				'numberposts' => -1,       //表示（取得）する記事の数
				'post_type' => 'post',    //投稿タイプの指定
				'orderby' => 'date',
				'order' => 'DESC'
			);
			$posts = get_posts( $args );
			if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
				get_template_part( 'template-parts/archive/news', get_post_format() );
			endforeach; endif;
			wp_reset_postdata();
		?>

						</div>
					</div>
				</div>
			</div>
		</section>
		
	<?
		}
	?>

<?php get_footer();
