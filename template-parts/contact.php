<?php
$temp_url = get_template_directory_uri();
$post_type_name = esc_html(get_post_type_object(get_post_type())->name);


?>
    <div id="contact">
        <h2>CONTACT</h2>
        <p>お仕事のご相談、ご依頼などお気軽に問い合わせください。</p>

        <?php echo do_shortcode( '[contact-form-7 id="130" title="CONTACT"]' ); ?>

    </div>
</main>