<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);


?>
    <div id="contact">
        <h2>CONTACT</h2>
        <p>お仕事のご相談、ご依頼などお気軽に問い合わせください。</p>
        <div class="form">

            <div class="field">
              <label class="label">ご用件</label>
              <div class="control">
                <label class="radio">
                  <input type="radio" name="question">
                  レコーディング
                </label>
                <label class="radio">
                  <input type="radio" name="question">
                  作詞
                </label>
                <label class="radio">
                  <input type="radio" name="question">
                  作曲
                </label>
                <label class="radio">
                  <input type="radio" name="question">
                  編曲
                </label>
                <label class="radio">
                  <input type="radio" name="question">
                  その他
                </label>
              </div>
            </div>

           <div class="field">
              <label class="label">お名前</label>
              <div class="control">
                <input class="input" type="text" placeholder="Text input">
              </div>
            </div>

            <div class="field">
              <label class="label">メールアドレス</label>
              <div class="control">
                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
              </div>
            </div>

            <div class="field">
              <label class="label">問い合わせ内容</label>
              <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
              </div>
            </div>


            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link">確認画面へ</button>
              </div>
            </div>
        </div>
    </div>
</main>