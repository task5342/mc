<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);

$current_category = single_cat_title("", false);

//下層ページ：背景画像
$title_bg_img = SCF::get('背景画像 - 下層ページタイトル',46);
$title_bg_img = wp_get_attachment_image_src($title_bg_img,'full');
$title_bg_img_url = esc_url($title_bg_img[0]);

//ページタイトル
if(is_page('company')) {
	$title = "会社情報";
} else if (is_page( array('contact', 13, 16) )){
	$title = "お問い合わせ";
} else if (is_page( 'sitemap' )){
	$title = "サイトマップ";
} else if (is_page( 'privacy' )){
	$title = "プライバシーポリシー";

} else if(is_post_type_archive('products') || $current_category == '一般機械器具' || $current_category == '船舶用機械器具' ) {
//} else if (is_singular( 'products' ) || is_post_type_archive('products') || is_tax( 'products' )){
	$title = "製品案内";
} else if (is_404()){
	$title = "404 Not Found";
} else if (is_single()) {
	$title = "お知らせ・ニュース";
	//$title = get_the_title();
} else {
	$title = "お知らせ・ニュース";
}


?>
<h2 class="contents-title under" style="background-image: url(<?php echo $title_bg_img_url; ?>);"><?php echo $title; ?></h2>
