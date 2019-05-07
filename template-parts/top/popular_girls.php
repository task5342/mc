<?php
$home_url = get_home_url();
$temp_url = get_template_directory_uri();
?>
<!-- 人気の仮装×通貨女子 -->
		<section id="popular_girls">
			<h2 class="hidden_sp"><img src="<?php echo $temp_url; ?>/assets/images/popular_girls_header.png" alt="人気の仮装×通貨女子"></h2>
			<h2 class="hidden_pc"><img src="<?php echo $temp_url; ?>/assets/images/popular_girls_header_sp.png" alt="人気の仮装×通貨女子"></h2>
			<div class="popular_girls_inner clearfix">

<!-- 著者別ランキング-->

<?php
    $count_key = 'post_views_count';

    //著者一覧を取得
    $users =get_users( array('orderby'=>'ID','order'=>'ASC') );

    //全著者ループ
    $count_user = array();
    foreach($users as $user) {

        //echo ($user->display_name)." ";

        //処理するユーザー指定
        query_posts( array ( 'author' => $user->ID, 'posts_per_page' => -1 , 'orderby'=>'ID', 'order'=>'ASC' ) );

        //各著者の投稿ループし、アクセス数を計算
        while ( have_posts() ) {
            the_post();
            $post_count = get_post_meta( get_the_ID(), $count_key, true ); //投稿のアクセス数を取得
            //echo "ID:" . get_the_ID() . "count:" . $post_count . "<br>";
            if ($post_count <> '') {
                $count_user[$user->ID]=$count_user[$user->ID] + $post_count; //投稿のアクセス数をインクリメント(+1)
            }
        }
        //echo "<br>";
        //著者の投稿ループし、アクセス数を計算(ここまで)
  
        //著者ごとのアクセス数を表示
        /*
        if ( $count_user[$user->ID] <> '' ) {
            echo $count_user[$user->ID]."<BR>";
        } else {
            echo "<BR>";
        }
        */
        //著者別ののアクセス数を表示(ここまで)
  
    }
    //全著者ループ終了
  
    //echo "<BR>ソートした結果を出力(小さい順に)<BR>";
    //昇順ソート
    asort($count_user,SORT_NUMERIC);
  
    //昇順ソート結果を出力(5個出力の場合)
    $disp_count=6;
    $n=0;
    foreach ($count_user as $userid => $val) {
        $thisUser = get_userdata( $userid );

        $role = implode( ', ', $thisUser->roles );

        $author_id = $userid;
        $cosplayname = get_the_author_meta('コスプレネーム', $author_id);

        $twitter_url = get_the_author_meta('twitter_url', $author_id);
        $youtube_url = get_the_author_meta('youtube_url', $author_id);
        $instagram_url = get_the_author_meta('instagram_url', $author_id);

        //echo get_avatar( $userid, 50, , "プロフィール画像" );
        //echo $thisUser->display_name."(".$thisUser->first_name." ".$thisUser->last_name."):". "<br>";
        //echo $val."(views)<BR>";
        //echo get_avatar( $userid, 50) . "<br>";
        if($role != 'administrator'):
            $n++;
?>
                <div class="popular_girls_one">
                    <?php
                        $size = 'full';
                        $profile_image = get_field('プロフィール画像', 'user_'. $author_id );
                    ?>
                    <img src="<?php echo $profile_image;?>" style="height: auto; width: 100%; max-width: none;">
                    <div class="popular_girls_one_info">
                        <h3><a href="/author/<?php echo $thisUser->user_login; ?>"><?php echo $cosplayname; ?></a></h3>
                        <ul class="clearfix">
                            <li><a href="<?php echo $twitter_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_twitter30.png" alt=""></a></li>
                            <li><a href="<?php echo $instagram_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_insta30.png" alt=""></a></li>
                            <li><a href="<?php echo $youtube_url; ?>" target="_blank"><img src="<?php echo $temp_url; ?>/assets/images/snsicon_youtube30.png" alt=""></a></li>
                        </ul>
                    </div>
                    <div class="popular_girls_rankicon"><img src="<?php echo $temp_url; ?>/assets/images/populargirl_icon_rank0<?php echo $n; ?>.png" alt=""></div>
                </div>
<?php
            if ($n==7) {break;}
        endif;


    }
    wp_reset_query();
 
?>
			</div>
			<div class="morebtn hidden_sp">
				<a href="/profile/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_pink01.png" alt="もっと見る"></a>
			</div>
			<div class="morebtn hidden_pc">
				<a href="/profile/" class="rollover"><img src="<?php echo $temp_url; ?>/assets/images/morebtn_pink01_sp.png" alt="もっと見る"></a>
			</div>
		</section>