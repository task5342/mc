<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);


?>

<div id="works">
    <h2>WORKS</h2>
    <div class="tabPanel-widget">
    <?php
    $args = array(
        'numberposts' => -1,       //表示（取得）する記事の数
        'post_type' => 'works',    //投稿タイプの指定
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $posts = get_posts( $args );

    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $post_date_array[] = get_the_date('Y');
    endforeach; endif;
    wp_reset_postdata();

    $post_date_array_unique = array_unique($post_date_array);

    $tab_num = 0;
    foreach ($post_date_array_unique as $key => $year):
        $checked = '';
        $tab_num++;
        if(max($post_date_array_unique) == $year) $checked = ' checked="true"';
    ?>
        <label for="tab-<?php echo $tab_num; ?>" tabindex="0"></label>
        <input id="tab-<?php echo $tab_num; ?>" type="radio" name="tabs"<?php echo $checked; ?> aria-hidden="true">
        <h3><?php echo $year; ?></h3>
        <div class="worsk_wrap clearfix">
    <?php
    $args = array(
        'numberposts' => -1,       //表示（取得）する記事の数
        'post_type' => 'works',    //投稿タイプの指定
        'year' => $year,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $posts = get_posts( $args );
    if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );
        $works__id = get_the_id();
        $works__date = get_the_date('Y.m.d');
        $works__title = $post->post_title;
        $works__category = SCF::get('カテゴリ', $works_id);
        $works__part = SCF::get('担当', $works_id);
        $works__artist_client = SCF::get('アーティスト・クライアント名', $works_id);
        $works__etc = SCF::get('補足', $works_id);
        $works__img_cover = SCF::get('ジャケット画像', $works_id);
        $works__url_youtube = SCF::get('リンク - Youtube', $works_id);
        $works__url_itunes = SCF::get('リンク - iTunes', $works_id);
        $works__url_spotify = SCF::get('リンク - Spotify', $works_id);


        //楽曲提供 判定
        $works__offer = false;
        if(in_array('楽曲提供', $works__part, true)) $works__offer = true;

        //担当
        $view_part = '';
        $separate = '・';
        $no = 0;
        $last = count($works__part) - 1;
        foreach ($works__part as $part) :
            switch ($no++) {
                case $last;
                    $separate = '';
                    break;
            }
            if( $part != '楽曲提供'):
                $view_part .= $part.$separate;
            endif;
        endforeach;
    ?>
            <div class="works--box">
                <div class="works--box_header">
                    <span class="date"><?php echo $works__date; ?></span>
                    <?php if($works__offer): ?><span class="cat">楽曲提供</span><?php endif; ?>
                    <ul class="sns_icon">
                        <?php if(!empty($works__url_youtube)): ?><li><a href="https://www.instagram.com/macaroni_and_cheese_official/" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_instagram.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_instagram.png 1x,<?php echo $temp_url; ?>/assets/img/icon_instagram@2x.png 2x" alt=""></a></li><?php endif; ?>
                        <?php if(!empty($works__url_itunes)): ?><li><a href="https://www.youtube.com/playlist?list=PL7MvnsrywT8Ez-SQ8jWPVZZ9L-P9tbldi&app=desktop" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_youtube.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_youtube.png 1x,<?php echo $temp_url; ?>/assets/img/icon_youtube@2x.png 2x" alt=""></a></li><?php endif; ?>
                        <?php if(!empty($works__url_spotify)): ?><li><a href="" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_spotify.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_spotify.png 1x,<?php echo $temp_url; ?>/assets/img/icon_spotify@2x.png 2x" alt=""></a></li><?php endif; ?>
                    </ul>
                </div>
                <div class="works--box_contents">
                    <h3 class="works_name"><?php echo $works__title; ?></h3>
                    <p class="part"><?php echo $view_part; ?></p>
                    <p class="spec01"><?php echo $works__artist_client; ?></p>
                    <p class="spec02"><?php echo $works__etc; ?></p>
                    <div class="cover_img">
                    </div>
                </div>
            </div>
    <?php
    endforeach; endif;
    wp_reset_postdata();
    ?>
        </div>
    <?
    endforeach;
    ?>
    </div>
</div>
>