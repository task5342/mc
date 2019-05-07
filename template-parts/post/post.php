<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();

$id = get_the_ID();

$cat = get_the_category();
$catname = $cat[0]->cat_name;
$catslug = $cat[0]->slug;

?>


		<section class="news">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="title-h2"><i class="icon-news"></i>お知らせ</h2>
						<div class="row">
							<div class="meta">
								<span class="date"><?php the_time('Y.m.d'); ?></span>
								<span class="cat"><?php echo $catname; ?></span>
							</div>
							<div class="content">
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
							</div>
						</div>
						<div class="btn-box"><a href="<?php echo $home_url; ?>/news/" class="btn btn--border">一覧へ戻る</a></div>
					</div>
				</div>
			</div>
		</section>

