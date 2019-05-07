<?php
get_header();

$temp_url = get_template_directory_uri();

$term = $wp_query->queried_object;

$term_id = $term->term_id;
$taxonomy = 'products_cat';
$taxonomy_img = SCF::get_term_meta( $term_id, $taxonomy, '製品カテゴリ画像' );
$taxonomy_img = wp_get_attachment_image_src($taxonomy_img, 'full');
$taxonomy_img_url = esc_url($taxonomy_img[0]);
?>

<div class="subtit bg_gray_light">
	<div class="container">
		<div class="row">
			<h3><?php echo $term->name; ?></h3>
		<!-- .row --></div>
	<!-- .container --></div>
</div>

<div class="container">
	<div class="business-information row">
		<div class="col-sm-6">
			<p><?php echo term_description(); ?></p>
		</div>
		<div class="col-sm-6">
			 <img src="<?php echo $taxonomy_img_url; ?>" alt="">
		</div>
	<!-- .row --></div>

	<div class="business-information-products row">
		<ul>
			<?php
			$args = array(
				'numberposts' => -1,       //表示（取得）する記事の数
				'post_type' => 'products',    //投稿タイプの指定
				'tax_query' => array(
			      'relation' => 'OR',
			      array(
			          'taxonomy' => 'products_cat',
			          'field' => 'slug',
			          'terms' => $term->slug,
			      ),
			  )
			);
			$posts = get_posts( $args );
			if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
				$products_img = wp_get_attachment_image_src(SCF::get('製品画像'),'full');
				$products_img_url = esc_url($products_img[0]);
				$products_name = get_the_title();
				$products_info = SCF::get('製品紹介');
			?>
			<li class="col-xs-12 col-sm-4"><a href="<?php echo $products_img_url; ?>" data-group="products_image" data-modaal-desc="<?php echo $products_name; ?>" data-modaal-info="<?php echo $products_info; ?>" class="products_image"><img src="<?php echo $products_img_url; ?>" alt=""><p><?php echo $products_name; ?></p></a></li>
			<?php
				endforeach; endif;
				wp_reset_postdata();
			?>	

		</ul>
	<!-- .row --></div>
<!-- .container --></div>

<div class="bg_gray_light">
	<div class="container">
	<div class="business-information-related bg_gray_light row">
		<div class="subtit"><h3>その他の事業</h3></div>
		<ul>
			<?php
				$terms = get_terms('products_cat');
				foreach ( $terms as $term ) {
					$taxonomy_img = SCF::get_term_meta( $term->term_id, 'products_cat', '製品カテゴリ画像' );
					$taxonomy_img = wp_get_attachment_image_src($taxonomy_img, 'full');
					$taxonomy_img_url = esc_url($taxonomy_img[0]);
				  $title = esc_html($term->name);
				  $tag_term_link = get_term_link($term);
				  ?>
					<li class="col-xs-6 col-sm-5"><a href="<?php echo $tag_term_link; ?>"><img src="<?php echo $taxonomy_img_url; ?>" alt=""><div class="img_overlay"></div><div class="caption"><?php echo $title; ?></div></a></li>
				  <?php
				}
				wp_reset_postdata();
			?>			
		</ul>
	<!-- .row --></div>
<!-- .container --></div>
<!-- .bg_gray_light --></div>


<?php get_footer();
