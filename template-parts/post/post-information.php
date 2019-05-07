<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();

$id = get_the_ID();

$cat = get_the_category();
$catslug = $cat[0]->slug;

$cat = $cat[0];
$cat_name = $cat->cat_name;
$cat_class = '1';
if($cat_name == '取引所') {
	$cat_class = "1";
} else if($cat_name == 'ICO') {
	$cat_class = "2";
} else if($cat_name == '国内銘柄') {
	$cat_class = "3";
} else if($cat_name == '海外銘柄') {
	$cat_class = "4";
} else if($cat_name == '初心者向け') {
	$cat_class = "5";
} else if($cat_name == 'いろいろ') {
	$cat_class = "6";
}

?>
	<div class="container-fluid c-page-mainv margin-bottom-0">
		<div class="page-mainv-txts">
			<h1 class="page-mainv-ltxt"><img src="<?php echo $temp_url; ?>/assets/images/information/main.png" alt="仮装×通貨女子通信 -Blog-">
			</h1>
		</div>
	</div>
	<article id="maincontent" class="information information-detail information-detail-style0<?php echo $cat_class; ?>">
		<div class="currency_newpost_inner clearfix">
			<div class="list-links-img mbpc-35">
				<a href="/category/exchanges/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-01.png" alt="取引所"></a>
				<a href="/category/ico/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-02.png" alt="ICO"></a>
				<a href="/category/domestic/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-03.png" alt="国内銘柄"></a>
				<a href="/category/foreign/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-04.png" alt="海外銘柄"></a>
				<a href="/category/beginners/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-05.png" alt="初心者向け"></a>
				<a href="/category/etc/"><img src="<?php echo $temp_url; ?>/assets/images/information/btn-06.png" alt="いろいろ"></a>
			</div>
			<div class="blocks blocks-detail blocks-detail0<?php echo $cat_class; ?>">
				<section class="wysiwyg wysiwyg-style0<?php echo $cat_class; ?>">
					<div class="chess mbpc-20 mbsp-10 hidden_sp">
						<img src="<?php echo $temp_url; ?>/assets/images/information/detail<?php echo $cat_class; ?>/chess.png" alt="<?php echo $cat_name; ?>">
					</div>
					<h2>
						<strong>
							<?php the_title(); ?>
						</strong>
					</h2>
					<?php the_content(); ?>
				</section>
<?php
//現在の投稿ID取得
  $current_id = $id;


  //カテゴリ設定
  //カスタムタクソノミーなどの場合はタクソノミー名を入れましょう
  $tax = 'category';

  //現在の投稿のターム取得を取得
  $term = array_pop(get_the_terms($current_id, $tax)); //現在のターム
  $term_id = $term->term_id;
  $ancestors = get_ancestors( $term_id, $tax );
  $reversed_ancestors = array_reverse($ancestors);
  $ancestors_id = $reversed_ancestors[0]; //最上の祖先ターム

  $term_slug;
  if($ancestors){
    //祖先があればその最上のターム
    $term_slug = get_term($ancestors_id)->slug;
  }else{
    //祖先が無ければ現在のターム
    $term_slug = $term->slug;
  }

  //同タームの一覧取得
  $args = array(
    //ソートなどしたければここに追記
    'post_type' => get_post_type(),
    $tax => $term_slug,
    'numberposts' => -1
  );
  $post_list = get_posts( $args );



  //変数の用意
  $next_id;
  $prev_id;
  $prev_flag;

  //取得した投稿リストをループし前後のIDを取得
  if ( $post_list ) :
  foreach ( $post_list as $post ) :
    if($prev_flag == 1){
      $prev_id = $post->ID;
      $prev_flag = '';
    }
    if($current_id == $post->ID){
      $next_id = $next;
      $prev_flag = 1;
    }
    $next = $post->ID;
  endforeach;
  endif; wp_reset_postdata();

  /*
   * これで
   * $next_id に次の記事の投稿IDが
   * $prev_id に前の記事の投稿IDが入ります
  */
			?>
			<?php if(isset($next_id) || isset($prev_id)){ //どちらかがあれば出力 ?>
			<nav class="post-navi mtpc-100 mtsp-50" role="navigation">
				<ul>
					<?php if(isset($next_id)){ ?><li><a href="<?php echo get_the_permalink($next_id); ?>"><span class="arrow left"></span>︎　前のページ</a></li><?php } ?>
					<?php if(isset($prev_id)){  ?><li><a href="<?php echo get_the_permalink($prev_id); ?>">次のページ　<span class="arrow right"></span>︎</a></li><?php } ?>
				</ul>
			</nav>
			<?php } ?>
			</div>

		</div>
	</article>
