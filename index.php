<?php
get_header();

//mainimg
get_template_part( 'template-parts/mainimg');
?>

<div id="sns_icon">
	<?php
		//snsicon
		get_template_part( 'template-parts/snsicon');
	?>
  <p>SCROLL</p>
</div>

<?php
//works
get_template_part( 'template-parts/works');


//RECORDING
get_template_part( 'template-parts/recording');

//CONTACT
get_template_part( 'template-parts/contact');


?>

<?php get_footer();
