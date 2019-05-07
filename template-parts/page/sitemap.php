<?php

//BASE URL
$home_url = get_home_url();

?>
<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3><?php the_title(); ?></h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>
<div class="container">
	<div class="row inr">

		<div class="col-sm-3 col-xs-12">
			<h3><a href="<?php echo $home_url; ?>">トップページ</a></h3>
		</div>
		<div class="col-sm-3 col-xs-12">
			<h3><a href="<?php echo $home_url; ?>/products/plant-etc/">製品案内</a></h3>
			<?php wp_nav_menu( array('menu' => '製品案内', 'container' => '')); ?>
		</div>
		<div class="col-sm-3 col-xs-12">
			<h3><a href="<?php echo $home_url; ?>/company/">会社情報</a></h3>
			<?php wp_nav_menu( array('menu' => '会社情報', 'container' => '')); ?>
		</div>
		<div class="col-sm-3 col-xs-12">
			<h3>その他</h3>
			<ul>
				<?php wp_nav_menu( array('menu' => 'その他', 'container' => '')); ?>
			</ul>
		</div>

	</div>
</div>

