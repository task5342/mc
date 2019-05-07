<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();


//スライダー
$pic_slider_group = SCF::get ('スライダー設定',733);
?>
<section id="mainvisual_container">
	<div id="wrap">
		<ul id="slider">
			<?php
			foreach ( $pic_slider_group as $slider ) {
				$pic_slider = wp_get_attachment_image_src($slider["メイン画像"],'full');
				$pic_slider_url = esc_url($pic_slider[0]);
				if(!empty($pic_slider_url)) {
					if(!empty($slider["リンク先URL"])) {
						echo '<li class="slide-item"><a href="' . $slider["リンク先URL"] . '" target="_blank"><img src="' . $pic_slider_url . '" alt=""></a></li>';
					}else{
						echo '<li class="slide-item"><img src="' . $pic_slider_url . '" alt=""></li>';
					}
				}
			}
			?>
		</ul>
		<ul id="thumbnail_slider" class="clearfix">
			<?php
			foreach ( $pic_slider_group as $slider ) {
				$pic_slider = wp_get_attachment_image_src($slider["サムネイル画像"],'full');
				$pic_slider_url = esc_url($pic_slider[0]);
				if(!empty($pic_slider_url)) {
					if(!empty($slider["リンク先URL"])) {
						echo '<li class="thumbnail-item"><a href="' . $slider["リンク先URL"] . '" target="_blank"><img src="' . $pic_slider_url . '" alt=""></a></li>';
					}else{
						echo '<li class="thumbnail-item"><img src="' . $pic_slider_url . '" alt=""></li>';
					}
				}
			}
			?>
		</ul>
	</div>
</section>
