<?php
get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	if(is_page('information')) {
		get_template_part( 'template-parts/page/information');
	} else if(is_page('blog')) {
		get_template_part( 'template-parts/page/blog');
	} else if(is_page('profile')) {
		get_template_part( 'template-parts/page/profile');
	} else if(is_page('faq')) {
		get_template_part( 'template-parts/page/faq');
	} else if(is_page('recruit')) {
		get_template_part( 'template-parts/page/recruit');
	} else if(is_page('about-aflac')) {
		get_template_part( 'template-parts/page/about-aflac');
	} else {
		get_template_part( 'template-parts/page/page');
	}

endwhile; // End of the loop.
?>

<?php get_footer();
