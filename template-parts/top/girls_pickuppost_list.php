<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();
?>
<!-- 通貨情報注目の記事 -->
<section class="girls_pickuppost_list">
	<div class="girls_pickuppost_list_inner">
		<h3 class="post-ttl"><img src="<?php echo $temp_url; ?>/assets/images/girls_pickuppost_header.png" alt="仮装×通貨女子注目の記事"></h3>

<?php

  $args = array(
    'numberposts' => 4,       //表示（取得）する記事の数
    'category' => 1,
    'post_type' => 'post',    //投稿タイプの指定
    'orderby' => 'meta_value',
    'meta_key' => 'post_views_count',
    'order' => 'DESC'
  );

  if( $posts ) :
    foreach( $posts as $post ) : setup_postdata( $post );

    $user = get_userdata($post->post_author);
    $role = implode( ', ', $user->roles );
    $size = 'full';
    if($role != 'administrator'):
      $post_count++;
      if($post_count <= 4):

        $user = get_userdata($post->post_author);
        $uid = $user->ID;
        $size = 'full';
        $cosplayname = get_the_author_meta('コスプレネーム', $uid);
?>

<div class="girls_pickuppost_one clearfix">
<?php if (has_post_thumbnail()) : ?>
  <?php the_post_thumbnail('full'); ?>
<?php else : ?>
  <img src="<?php echo $temp_url; ?>/assets/images/noimage.png" alt="" />
<?php endif ; ?>
  <div class="girls_pickuppost_one_info">
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
    <p><?php echo $cosplayname; ?></p>
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