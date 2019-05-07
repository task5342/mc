<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);


?>
<ul class="sns_icon">
    <li><a href="https://twitter.com/mandc_official" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_twitter.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_twitter.png 1x,<?php echo $temp_url; ?>/assets/img/icon_twitter@2x.png 2x" alt=""></a></li>
    <li><a href="https://www.instagram.com/macaroni_and_cheese_official/" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_instagram.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_instagram.png 1x,assets/img/icon_instagram@2x.png 2x" alt=""></a></li>
    <li><a href="https://www.youtube.com/playlist?list=PL7MvnsrywT8Ez-SQ8jWPVZZ9L-P9tbldi&app=desktop" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_youtube.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_youtube.png 1x,<?php echo $temp_url; ?>/assets/img/icon_youtube@2x.png 2x" alt=""></a></li>
    <li><a href="" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_spotify.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_spotify.png 1x,<?php echo $temp_url; ?>/assets/img/icon_spotify@2x.png 2x" alt=""></a></li>
</ul>