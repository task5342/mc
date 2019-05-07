<?php
get_header();

//BASE URL
$home_url = get_home_url();
?>

<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyseventeen' ); ?></h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>
<div class="container">
	<div class="row inr text-center">
		<p>指定されたページまたはファイルは存在しません。<br>
		<br>
		URL、ファイル名にタイプミスがないかご確認ください。<br>
		指定されたページは削除されたか、移動した可能性があります。</p>
		<div class="btn-box"><a href="<?php echo $home_url; ?>" class="btn btn-def btn-min">トップへ戻る</a></div>
	</div>
</div>

<?php get_footer();
