<?php
get_header();
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);
$post_slug = esc_attr($post->post_name);
?>

<?php
while ( have_posts() ) : the_post();

	$user_level = get_the_author_meta('user_level');

	//仮想×通貨女子通信
	if($user_level == 2) {
		get_template_part( 'template-parts/post/post-blog');

	//最新通過情報
	} else if($user_level == 10) {
		get_template_part( 'template-parts/post/post-information');
	}

	set_post_views( get_the_ID() );


endwhile;
?>

<?php
get_footer();
?>