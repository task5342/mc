<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();
?>
<!-- 通貨情報注目の記事 -->
<section class="currency_pickuppost_list">
	<div class="currency_pickuppost_list_inner">
		<h3 class="post-ttl"><img src="<?php echo $temp_url; ?>/assets/images/currency_pickuppost_header.png" alt="通貨情報注目の記事"></h3>
<?php

  $parent_cat_id = 156; // 任意の親カテゴリーID
  $categories = get_term_children($parent_cat_id, 'category');
  array_push($categories, $parent_cat_id);
  asort($categories);
  $arg_categories = implode(",", $categories);

  $args = array(
    'numberposts' => 4,       //表示（取得）する記事の数
    'category' => $arg_categories,
    'post_type' => 'post',    //投稿タイプの指定
    'orderby' => 'meta_value',
    'meta_key' => 'post_views_count',
    'order' => 'DESC'
  );

  if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

    $user = get_userdata($post->post_author);
    $uid = $user->ID;
    $role = implode( ', ', $user->roles );
    $size = 'full';
    if($role == 'administrator'):
      $post_count++;
      if($post_count <= 4):


      $cat = get_the_category();
      $cat = $cat[0];
      $cat_name = $cat->cat_name;
      $cat_class = 'head_stlipe01';
      if($cat_name == '取引所') {
        $cat_class = "head_stlipe01";
      } else if($cat_name == 'ICO') {
        $cat_class = "head_stlipe02";
      } else if($cat_name == '国内銘柄') {
        $cat_class = "head_stlipe03";
      } else if($cat_name == '海外銘柄') {
        $cat_class = "head_stlipe04";
      } else if($cat_name == '初心者向け') {
        $cat_class = "head_stlipe05";
      } else if($cat_name == 'いろいろ') {
        $cat_class = "head_stlipe06";
      }
?>
<div class="currency_pickuppost_one clearfix">
<?php if (has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('full'); ?>
<?php else : ?>
  <img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
<?php endif ; ?>
  <div class="currency_pickuppost_one_info">
    <p class="<?php echo $cat_class; ?>"><?php echo $cat_name; ?></p>
    <h3><a href="<?php the_permalink(); ?>">
      <?php
      if(mb_strlen($post->post_title)>13) {
          $title= mb_substr($post->post_title,0,13);
          echo $title . '...';
        } else {
          echo $post->post_title;
        }
      ?>
    </a></h3>
  </div>
</div>
<?php
      endif;
      endif;
  endforeach;
endif;
  wp_reset_postdata();

 ?>

	</div>
</section>