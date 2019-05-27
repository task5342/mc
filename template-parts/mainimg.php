<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);
?>
<main>
	<div id="mainimg">
	    <div class="container">
	        <img src="<?php echo $temp_url; ?>/assets/img/pic_01.png" alt="">
	        <a href="" class="icon_profile"><img src="<?php echo $temp_url; ?>/assets/img/icon_profile.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_profile.png 1x,<?php echo $temp_url; ?>/assets/img/icon_profile@2x.png 2x" alt=""></a>
	    </div>
	</div>