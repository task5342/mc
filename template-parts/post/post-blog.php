<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();

$id = get_the_ID();

$cat = get_the_category();
$catname = $cat[0]->cat_name;
$catslug = $cat[0]->slug;


//$blogusers = get_users();
//echo $blogusers[0]->ID;

$author_id = get_the_author_meta( 'ID' );

$user_name = get_the_author();
$number = get_the_author_meta('ナンバー');
$cosplayname = get_the_author_meta('コスプレネーム');
$birthday = get_the_author_meta('バースデー');
$address = get_the_author_meta('出身地');
$age = get_the_author_meta('年齢');
$pr = get_the_author_meta('自己pr');
$twitter_url = get_the_author_meta('twitter_url');
$youtube_url = get_the_author_meta('youtube_url');
$instagram_url = get_the_author_meta('instagram_url');


$size = 'full';
$blog_header_image = get_field('ブログヘッダー画像', 'user_'. $author_id );
$blog_header_image_sp = get_field('ブログヘッダー画像（スマホサイト）', 'user_'. $author_id );
?>
	<div class="page-head-banner">
		<div class="bg-img">
			<?php if( $blog_header_image ) echo wp_get_attachment_image( $blog_header_image, $size, false, array( 'class' => 'pc' )); ?>
			<?php if( $blog_header_image_sp ) echo wp_get_attachment_image( $blog_header_image_sp, $size, false, array( 'class' => 'sp' ) ); ?>
		</div>
		<div class="content">
			<h1 class="mbpc-20 mbsp-10">
				<span class="txt-lg"><?php echo $user_name; ?><br>OFFICIAL BROG</span>
				<span class="txt-sm"><?php echo $cosplayname;?> オフィシャルブログ</span>
			</h1>
			<img src="<?php echo $temp_url; ?>/assets/images/blog/detail/main-visual-txt.png" alt="仮装×通貨女子" width="122">
		</div>
	</div>
	<article id="maincontent" class="bg-wooden ptpc-40 ptsp-20 pbpc-80 pbsp-40">
		<div class="blocks">
			<section class="wysiwyg">
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
  $term = array_pop(get_the_terms($post->ID, $tax)); //現在のターム
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
					<?php if(isset($next_id)){ ?><li><?php get_the_permalink($next_id); ?></li><?php } ?>
					<?php if(isset($prev_id)){  ?><li><?php get_the_permalink($prev_id); ?></li><?php } ?>
				</ul>
			</nav>
			<?php } ?>
			</div>

		</div>
	</article>