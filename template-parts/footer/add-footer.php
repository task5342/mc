<?php
/*---------------------------------------------------------------------------
 * フッター追加用
 *---------------------------------------------------------------------------*/
	
	//子テーマのディレクトリ絶対パス
	$temp_url = get_stylesheet_directory_uri();

?>
	<script src="<?php echo $temp_url.'/js/iscroll.min.js'; ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
	<script src="<?php echo $temp_url.'/js/transformicons.js'; ?>"></script> 
	<script src="<?php echo $temp_url.'/js/common.js'; ?>"></script>
	<script src="<?php echo $temp_url.'/js/glide.js'; ?>"></script>
	<script>transformicons.add('.tcon')</script>
