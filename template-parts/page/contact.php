<?php

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();

//電話・FAXでのお問い合わせ
$tel1 = SCF::get ('TEL1',2);
$tel2 = SCF::get ('TEL2',2);
$reception_time = SCF::get ('受付時間',2);
$fax = SCF::get ('FAX',2);
?>
<div class="subtit bg_gray_light input_only">
	<div class="container">
		<div class="row">
			<h3>お電話・FAXでのお問い合わせ</h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>

<div class="container input_only">
	<div class="row">
		<div class="contact-area">
			<div class="container">
				<div class="contact-area-inr">
					<div class="row">
						
						<p class="text-center">お急ぎの方はお電話にてお問い合わせください</p>
						
						<div class="col-xs-12 contact-area_item">
							<div class="contact-area_item-inr">
								<span class="cirlce">TEL</span><p><?php echo $tel1; ?><br><?php echo $tel2; ?></p><span class="tC">受付時間：<?php echo $reception_time; ?></span>
							</div>
							<div class="contact-area_item-inr">
								<span class="cirlce">FAX</span><p><?php echo $fax; ?></p>
							</div>
						</div>
					<!-- /.row --></div>
				<!-- /.contact-area-inr --></div>
			<!-- /.container --></div>
		</div>				
		
	<!-- .row --></div>
<!-- .container --></div>

<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3>メールでのお問い合わせ</h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>

<div class="form-area">
	<div class="container">
		<?php the_content(); ?>
	<!-- .container --></div>
</div>	
			
