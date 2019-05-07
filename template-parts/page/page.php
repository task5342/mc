<?php

//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();

?>
		<section class="page_textonly">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="title-h2"><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</section>
