<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);


?>
<div id="recording">
    <div class="container">
        <h2>RECORDING</h2>
        <p class="lead">私たちが行うレコーディングの流れを簡単にご説明します。<br>詳しい内容や制作料金などはお気軽にお問い合わせください。</p>
        <dl>
            <dt>Step.1</dt><dd>どんな曲でどんな音にしたいのか話しあって目標を見定めます。その他の相談もOK！</dd>
            <dt>Step.2</dt><dd>予算から曲数、日程を決めます。</dd>
            <dt>Step.3</dt><dd>レコーディングまでの心構え、練習ポイントをおさらいします。</dd>
            <dt>Step.4</dt><dd>レコーディング本番。〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇〇</dd>
            <dt>Step.5</dt><dd>ミックス確認、場合によってはマスタリングも行います。</dd>
        </dl>

        <ul id="lightSlider">
            <?php
            if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post );

                $works__id = get_the_id();
                $works__date = get_the_date('Y.m.d');
                $works__title = $post->post_title;
                $works__recording = SCF::get('レコーディングに表示', $works_id);
                $works__category = SCF::get('カテゴリ', $works_id);
                $works__part = SCF::get('担当', $works_id);
                $works__artist_client = SCF::get('アーティスト・クライアント名', $works_id);
                $works__etc = SCF::get('補足', $works_id);
                $works__img_cover = SCF::get('ジャケット画像', $works_id);
                $works__url_youtube = SCF::get('リンク - Youtube', $works_id);
                $works__url_itunes = SCF::get('リンク - iTunes', $works_id);
                $works__url_spotify = SCF::get('リンク - Spotify', $works_id);

                if(!empty($works__recording)):
            ?>
            <li>
                <div class="works--box">
                    <div class="works--box_header">
                        <span class="cat">作曲</span>
                        <ul class="sns_icon">
                        <?php if(!empty($works__url_youtube)): ?><li><a href="https://www.instagram.com/macaroni_and_cheese_official/" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_instagram.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_instagram.png 1x,<?php echo $temp_url; ?>/assets/img/icon_instagram@2x.png 2x" alt=""></a></li><?php endif; ?>
                        <?php if(!empty($works__url_itunes)): ?><li><a href="https://www.youtube.com/playlist?list=PL7MvnsrywT8Ez-SQ8jWPVZZ9L-P9tbldi&app=desktop" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_youtube.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_youtube.png 1x,<?php echo $temp_url; ?>/assets/img/icon_youtube@2x.png 2x" alt=""></a></li><?php endif; ?>
                        <?php if(!empty($works__url_spotify)): ?><li><a href="" target="_blank"><img src="<?php echo $temp_url; ?>/assets/img/icon_spotify.png" srcset="<?php echo $temp_url; ?>/assets/img/icon_spotify.png 1x,<?php echo $temp_url; ?>/assets/img/icon_spotify@2x.png 2x" alt=""></a></li><?php endif; ?>
                        </ul>
                    </div>
                    <div class="works--box_contents">
                        <h3 class="works_name"><?php echo $works__title; ?></h3>
                        <p class="spec01"><?php echo $works__artist_client; ?></p>
                        <p class="spec02"><?php echo $works__etc; ?></p>
                    </div>
                </div>
            </li>
            <?php
                endif;
                endforeach; endif;
                wp_reset_postdata();
            ?>
        </ul>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#lightSlider").lightSlider({
                    controls: true,
                });
            });
        </script>

    </div>
</div>