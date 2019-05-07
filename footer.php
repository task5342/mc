<?php

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();

?>
<?php
$defaults = array(
	'container'       => '',
	'items_wrap'      => '%3$s',
);
?>
<footer>
    <div class="container">
        <p class="logo"><img src="<?php echo $temp_url; ?>/assets/img/logo_min.png" srcset="<?php echo $temp_url; ?>/assets/img/logo_min.png 1x,<?php echo $temp_url; ?>/assets/img/logo_min@2x.png 2x" alt="m&c"></p>
        <p class="copyright">Copyright © Macaroni&Cheese.All Rights Reserved.</p>
				<?php
					//snsicon
					get_template_part( 'template-parts/snsicon');
				?>
    </div>
</footer>


<!-------------------------------- footer -------------------------------->
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script src="<?php echo $temp_url; ?>/assets/js/drawer.js" charset="utf-8"></script>
<script>
$(function(){
	jQuery('.drawer').drawer();
	jQuery('#main_nav li').each(function(){
		jQuery('a', this).attr({
			'data-label': jQuery('img', this).attr('alt')
		});
	});
});
</script>
<!-------------------------------- footer -------------------------------->
</body>
</html>






