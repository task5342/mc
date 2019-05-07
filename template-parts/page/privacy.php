<?php

//テキスト設定
$txt_privacy01 = SCF::get ('個人情報保護方針');
$txt_privacy02 = SCF::get ('個人情報の取り扱いについて');
?>
<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3>個人情報保護方針</h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>
<div class="txt_privacy container">
	<div class="row">
	<?php echo $txt_privacy01; ?>
	</div>
</div>
<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3>個人情報の取り扱いについて</h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>
<div class="txt_privacy container">
	<div class="row">
	<?php echo $txt_privacy02; ?>
	</div>
</div>
