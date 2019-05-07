<?php
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

function twentyseventeen_setup() {
	load_theme_textdomain( 'twentyseventeen' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;

	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	$starter_content = array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			'sidebar-2' => array(
				'text_business_info',
			),

			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function aflac_ac_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	
	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	//wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	
}
add_action( 'wp_enqueue_scripts', 'aflac_ac_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );




/*---------------------------------------------------------------------------
 * JS読み込み
 *---------------------------------------------------------------------------*/
function my_deregister_script() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		//wp_enqueue_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array(),'3.3.1');
	}
}
add_action('wp_print_scripts','my_deregister_script',100);

/*---------------------------------------------------------------------------
 * CSS読み込み
 *---------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', function() {
    $child_theme = wp_get_theme();
/*    wp_enqueue_style( 'kasou-navitune', get_theme_file_uri( 'assets/css/navitune.css' ), [], $child_theme->Version );
    wp_enqueue_style( 'kasou-drawer', get_theme_file_uri( 'assets/css/drawer.css' ), [], $child_theme->Version );
    wp_enqueue_style( 'kasou-reset', get_theme_file_uri( 'assets/css/reset.css' ), [], $child_theme->Version );
*/	if(is_home()) {
/*	    wp_enqueue_style( 'kasou-slick', get_theme_file_uri( 'assets/css/slick.css' ), [], $child_theme->Version );
	    wp_enqueue_style( 'kasou-slick-theme', get_theme_file_uri( 'assets/css/slick-theme.css' ), [], $child_theme->Version );
*/		//wp_enqueue_style( 'kasou-swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.2/css/swiper.min.css', [], $child_theme->Version );
	}
//    wp_enqueue_style( 'kasou-main', get_theme_file_uri( 'assets/css/main.css' ), [], $child_theme->Version );

    wp_enqueue_style( 'kasou-style', get_theme_file_uri( 'assets/css/styles.css?ver=201912171549' ), [], $child_theme->Version );
    //wp_enqueue_style( 'kasou-responsive', get_theme_file_uri( 'assets/css/responsive.css' ), [], $child_theme->Version );

//    wp_enqueue_script( 'kasou-js-slick', get_template_directory_uri() . 'assets/js/slick.min.js', array( 'jquery' ), '20190101', true );
}, 10 );



/*-----------------------------------------------------------------------------
  指定文字列を削除して、返す
  ・第2引数：配列指定可能
 *---------------------------------------------------------------------------*/
function slush_delete($str, $delete_word) {
	str_replace($delete_word, '', $str);
	return $str;
}


/*-----------------------------------------------------------------------------
  グローバルメニュー
  ・title属性が入って入れば、spanで囲んで表示
 *---------------------------------------------------------------------------*/
add_filter( 'walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4 );
function description_in_nav_menu($item_output, $item){
  return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<br /><span>{$item->attr_title}</span><", $item_output);
}

/*-----------------------------------------------------------------------------
  メニュー
  ・余分なスペースを削除
 *---------------------------------------------------------------------------*/
function remove_whitespace_wp_nav_menu( $items ) {
    return preg_replace( '/>(\s|\n|\r)+</', '><', $items );
}
add_filter( 'wp_nav_menu_items', 'remove_whitespace_wp_nav_menu' );

/*-----------------------------------------------------------------------------
  メニュー
  ・余分なid・classを削除
 *---------------------------------------------------------------------------*/
//add_filter( 'nav_menu_css_class', 'my_css_attributes_filter', 100, 1 );
add_filter( 'nav_menu_item_id', 'my_css_attributes_filter', 100, 1 );
//add_filter( 'page_css_class', 'my_css_attributes_filter', 100, 1 );
function my_css_attributes_filter( $var ) {
  return is_array($var) ? array_intersect($var, array( 'current-menu-item' )) : '';
}


/*-----------------------------------------------------------------------------
  スラッグが日本語になる場合は、post-記事IDの形式に変換
 *---------------------------------------------------------------------------*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );


/*-----------------------------------------------------------------------------
  タイトルタグ設定
 *---------------------------------------------------------------------------*/
function wp_document_title_separator( $separator ) {
  $separator = '|';
  return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );


function change_title_tag( $title ) {
	
	$site_name = get_bloginfo( 'name' );
	$page_title = get_the_title();

  if ( is_singular( 'products' ) ) {
		$title = $page_title.' - 製品案内｜'.$site_name;
		
  } elseif ( is_singular( 'post' ) ) {
		$title = $page_title.' - お知らせ・ニュース｜'.$site_name;
		
  }
  return $title;
}
add_filter( 'pre_get_document_title', 'change_title_tag' );




/*-----------------------------------------------------------------------------
  管理画面：メニュー変更
 *---------------------------------------------------------------------------*/
function change_menus () {
    global $menu;
    global $submenu;

    //名称変更
	//$menu[27][0] = '店舗案内';	 //MW WP Form
	//$submenu['edit.php?post_type=mw-wp-form'][5][0] = 'お問い合わせフォーム一覧'; // MW WP Formをお問い合わせフォーム一覧に変更

    //削除
    //unset($menu[25]); // コメント

}
add_action('admin_menu', 'change_menus');




/*-----------------------------------------------------------------------------
  管理：製品案内一覧にカテゴリ列を追加
 *---------------------------------------------------------------------------*/
function my_manage_posts_columns_products_category($columns) {
  $columns['products_cat'] = "製品カテゴリ";
  return $columns;
}
function my_add_column_products_category($column_name, $post_id) {
  if( $column_name == 'products_cat' ) {
    $tax = wp_get_object_terms($post_id, 'products_cat');
    $stitle = $tax[0]->name;
  }
 
  if ( isset($stitle) && $stitle ) {
    echo esc_attr($stitle);
  }
}

add_filter( 'manage_edit-products_columns', 'my_manage_posts_columns_products_category' );
add_action( 'manage_products_posts_custom_column', 'my_add_column_products_category', 10, 2 );

/*-----------------------------------------------------------------------------
  管理：不要なメニューを削除
 *---------------------------------------------------------------------------*/
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
	global $current_user;
	global $submenu;
 //	 var_dump($submenu);

	get_currentuserinfo();
	if($current_user->ID != "1"){
		remove_menu_page( 'index.php' );                  //ダッシュボードを隠します
		remove_menu_page( 'edit-comments.php' );          //コメントメニューを隠します
		remove_menu_page( 'themes.php' );                 //外観メニューを隠します
		remove_menu_page( 'plugins.php' );                //プラグインメニューを隠します
		remove_menu_page( 'tools.php' );                  //ツールメニューを隠します
		remove_menu_page( 'options-general.php' );        //設定メニューを隠します
		remove_menu_page( 'edit.php?post_type=smart-custom-fields' );

		remove_menu_page( 'edit.php?post_type=mw-wp-form' );	//mw-wp-form
		remove_menu_page( 'cptui_main_menu' );								//CPT UI

		remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); // 投稿：タグ
		remove_submenu_page( 'users.php', 'users.php' ); // ユーザー：ユーザー一覧
		remove_submenu_page( 'users.php', 'user-new.php' ); // ユーザー：新規追加
	}
}


/*-----------------------------------------------------------------------------
  管理：投稿をニュースに変更
 *---------------------------------------------------------------------------*/
function change_post_menu_label() {
 global $menu;
 global $submenu;
 $menu[5][0] = 'ブログ';
 $submenu['edit.php'][5][0] = 'ブログ記事一覧';
 $submenu['edit.php'][10][0] = '新しい記事';
 $submenu['edit.php'][16][0] = 'タグ';
 //echo ";
}
function change_post_object_label() {
 global $wp_post_types;
 $labels = &$wp_post_types['post']->labels;
 $labels->name = 'ブログ';
 $labels->singular_name = 'ブログ';
 $labels->add_new = _x('追加', 'ブログ');
 $labels->add_new_item = '記事の新規追加';
 $labels->edit_item = '記事の編集';
 $labels->new_item = '新しい記事';
 $labels->view_item = '記事を表示';
 $labels->search_items = '記事を検索';
 $labels->not_found = '記事が見つかりませんでした';
 $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );


/*-----------------------------------------------------------------------------
  管理：メニューの順番を変更
 *---------------------------------------------------------------------------*/
function custom_menu_order($menu_old) {
    if (!$menu_old) return true;
 
    return array(
        'index.php', // ダッシュボード
        'edit.php', // お知らせ
        'edit.php?post_type=shop', // 店舗案内
        'edit.php?post_type=faq', // よくあるご質問
        'edit.php?post_type=page', // 会社案内、採用情報など
        'edit-comments.php', // コメント
        'separator1', // 区切り線１
        'upload.php', // メディア
        'link-manager.php', // リンク
        'users.php', // ユーザー
        'separator2', // 区切り線２
        'themes.php', // テーマ
        'plugins.php', // プラグイン
        'tools.php', // ツール
        'options-general.php', // 設定
        'separator-last', // 区切り線３
    );
}
add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');

/*-----------------------------------------------------------------------------
  管理：特定の固定ページの本文を削除
 *---------------------------------------------------------------------------*/
function notices_post_type() {
		global $post;
		$post_id = $post->ID;

		if($post_id == 2 || $post_id == 46) {
			remove_post_type_support( 'page', 'editor' );	//本文
		}
}
add_action( 'admin_notices', 'notices_post_type' );

/*-----------------------------------------------------------------------------
  管理：記事の表示オプション制御
 *---------------------------------------------------------------------------*/
function my_remove_meta_boxes() {

	//記事
	remove_meta_box('authordiv', 'post', 'normal'); // オーサー
	//remove_meta_box('categorydiv', 'post', 'normal'); // カテゴリー
	remove_meta_box('commentstatusdiv', 'post', 'normal'); // ディスカッション
	remove_meta_box('commentsdiv', 'post', 'normal'); // コメント
	remove_meta_box('formatdiv', 'post', 'normal'); // フォーマット
	remove_meta_box('pageparentdiv', 'post', 'normal'); // ページ属性
	//remove_meta_box('postcustom', 'post', 'normal'); // カスタムフィールド
	remove_meta_box('postexcerpt', 'post', 'normal'); // 抜粋
	//remove_meta_box('postimagediv', 'post', 'normal'); // アイキャッチ
	remove_meta_box('revisionsdiv', 'post', 'normal'); // リビジョン
	//remove_meta_box('slugdiv', 'post', 'normal'); // スラッグ
	remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // タグ
	remove_meta_box('trackbacksdiv', 'post', 'normal'); // トラックバック

	//固定ページ
	remove_meta_box('pageparentdiv', 'page', 'normal'); // ページ属性

}
add_action('admin_menu', 'my_remove_meta_boxes');



/*-----------------------------------------------------------------------------
  パンくずリスト
 *---------------------------------------------------------------------------*/
function breadcrumb(){
  global $post;
  $str = '';
  $pNum = 2;
  $str.= '<div id="breadcrumb">';
  $str.= '<div class="container">';
  $str.= '<ul>';
  $str.= '<li ><a href="'.home_url('/').'" class="home"><span>HOME</span></a></li>';

  /* 通常の投稿ページ  */
  if(is_singular('post')){
    $categories = get_the_category($post->ID);
    $cat = $categories[0];

    if($cat->parent != 0){
      $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_category_link($ancestor).'"><span>'.get_cat_name($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><a href="'. get_category_link($cat-> term_id). '"><span>'.$cat->cat_name.'</span></a></li>';
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* カスタムポスト */
  elseif(is_single() && !is_singular('post')){
    $cp_name = get_post_type_object(get_post_type())->label;
    $cp_url = home_url('/').get_post_type_object(get_post_type())->name;
  
    $str.= '<li><a href="'.$cp_url.'"><span>'.$cp_name.'</span></a></li>';
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* 固定ページ */
  elseif(is_page()){
    $pNum = 2;
    if($post->post_parent != 0 ){
      $ancestors = array_reverse(get_post_ancestors($post->ID));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_permalink($ancestor).'"><span>'.get_the_title($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><span>'. $post->post_title.'</span></li>';
  }

  /* カテゴリページ */
  elseif(is_category()) {
    $cat = get_queried_object();
    $pNum = 2;
    if($cat->parent != 0){
      $ancestors = array_reverse(get_ancestors($cat->cat_ID, 'category'));
      foreach($ancestors as $ancestor){
        $str.= '<li><a href="'. get_category_link($ancestor) .'"><span>'.get_cat_name($ancestor).'</span></a></li>';
      }
    }
    $str.= '<li><span>'.$cat->name.'</span></li>';
  }

  /* タグページ */
  elseif(is_tag()){
    $str.= '<li><span>'. single_tag_title('', false). '</span></li>';
  }

  /* 時系列アーカイブページ */
  elseif(is_date()){
    if(get_query_var('day') != 0){
      $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
      $str.= '<li><a  href="'.get_month_link(get_query_var('year'), get_query_var('monthnum')).'"><span>'.get_query_var('monthnum').'月</span></a></li>';
      $str.= '<li><span>'.get_query_var('day'). '</span>日</li>';
    } elseif(get_query_var('monthnum') != 0){
      $str.= '<li><a href="'. get_year_link(get_query_var('year')).'"><span>'.get_query_var('year').'年</span></a></li>';
      $str.= '<li><span>'.get_query_var('monthnum'). '</span>月</li>';
    } else {
      $str.= '<li><span>'.get_query_var('year').'年</span></li>';
    }
  }

  /* 投稿者ページ */
  elseif(is_author()){
    $str.= '<li><span>投稿者 : '.get_the_author_meta('display_name', get_query_var('author')).'</span></li>';
  }

  /* 添付ファイルページ */
  elseif(is_attachment()){
    $pNum = 2;
    if($post -> post_parent != 0 ){
      $str.= '<li><a href="'.get_permalink($post-> post_parent).'"><span>'.get_the_title($post->post_parent).'</span></a></li>';
    }
    $str.= '<li><span>'.$post->post_title.'</span></li>';
  }

  /* 検索結果ページ */
  elseif(is_search()){
    $str.= '<li><span>「'.get_search_query().'」で検索した結果</span></li>';
  }

  /* 404 Not Found ページ */
  elseif(is_404()){
    $str.= '<li><span>お探しの記事は見つかりませんでした。</span></li>';
  }

  /* その他のページ */
  else{
    $str.= '<li><span>'.wp_title('', false).'</span></li>';
  }
  $str.= '</ul>';
  $str.= '</div>';
  $str.= '</div>';

  echo $str;
}



function get_taxonomies_by_blog_post($taxonomy, $blog_id, $post_id) {
    // ブログを切り替える
    //switch_to_blog($blog_id);
    global $wpdb;
    // クエリ作成
    $query = "
    SELECT *
    FROM $wpdb->term_relationships
    LEFT JOIN $wpdb->term_taxonomy
        ON $wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id
    LEFT JOIN $wpdb->terms
        ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id
    WHERE $wpdb->term_relationships.object_id = %d
        AND $wpdb->term_taxonomy.taxonomy = %s
    ";
    // プレースホルダ
    $args = array($post_id, $taxonomy);
    // データを取得
    $taxonomies = $wpdb->get_results( $wpdb->prepare( $query, $args ) );
    // ブログを戻す
    //restore_current_blog();
    return $taxonomies;
}

function faq_list_index($cnt_max) {
	$blog_id = 1;
	//switch_to_blog($blog_id);
	$args = array(
		'numberposts' => -1,
		'post_type' => 'faq',
		'order' => 'DESC'
	);
	$cnt = 0;
	$arr = get_posts( $args );
	foreach($arr as $v ){
		$cat = get_taxonomies_by_blog_post('faq_cat', $blog_id, $v->ID);
		if($cnt < $cnt_max) {
			echo '<li><a href="/faq/#faq' . $v->ID . '"><span class="cat">'.$cat[0]->name.'</span>' . $v->post_title.'</a></li>';
			$cnt ++;
		}
		/*
		if($cat[0]->slug == $faq_cat && $cnt < $cnt_max) {
			echo '<li><a href="/faq/#faq' . $v->ID . '">' . $v->post_title.'</a></li>';
			$cnt ++;
		}
		*/

	}
	wp_reset_postdata();
	//restore_current_blog();
}

function faq_list_faqpage_bk($faq_cat, $cnt_max) {
	$blog_id = 1;
	//switch_to_blog($blog_id);
	$args = array(
		'numberposts' => -1,
		'post_type' => 'faq'
	);
	$cnt = 0;
	$arr = get_posts( $args );
	foreach($arr as $v ){
		$cat = get_taxonomies_by_blog_post('faq_cat', $blog_id, $v->ID);

		if($cat[0]->slug == $faq_cat && $cnt < $cnt_max) {
			echo '<dl id="faq' . $v->ID . '">';
			echo '<dt>'.$v->post_title.'<span></span></dt>';
			echo '<dd>'.$v->post_content.'</dd>';
			echo '</dl>';
			$cnt ++;
		}
	}
	wp_reset_postdata();
	//restore_current_blog();
}

function faq_list_faqpage() {

	$terms = get_terms('faq_cat');


	foreach ( $terms as $term ) {
	?>
	<h3 id="<?php echo esc_html($term->slug); ?>" class="title-h3"><?php echo esc_html($term->name); ?></h3>
	<?php

		$args = array(
			'numberposts' => -1,
			'post_type' => 'faq',
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'faq_cat',
					'field' => 'slug',
					'terms' => array( $term->slug ),
				),
			),
			'orderby' => 'date',
			'order' => 'ASC'
		);

		$arr = get_posts( $args );
		foreach($arr as $v ){
			$cat = get_taxonomies_by_blog_post('faq_cat', $blog_id, $v->ID);

			if($cat[0]->slug == $term->slug) {
				echo '<dl id="faq' . $v->ID . '">';
				echo '<dt>'.$v->post_title.'<span></span></dt>';
				echo '<dd>'.$v->post_content.'</dd>';
				echo '</dl>';
			}
		}
	}
	wp_reset_postdata();
	//restore_current_blog();
}

//サムネイルのサイズ指定削除
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
 
function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//概要（抜粋）の文字数調整
function my_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');

function new_excerpt_more($more) {
	return '…';
}
add_filter('excerpt_more', 'new_excerpt_more');



//記事ランキング　カスタマイズ
function custom_single_popular_post( $content, $p, $instance ){
     $thumb_id = get_post_thumbnail_id( $post->ID );
     $img = wp_get_attachment_image_src( $thumb_id, 'full' );
     $output = '<li><a href="' . get_the_permalink($p->id) . '" title="' . esc_attr($p->title) . '"><span class="num"></span><span class="box"><span class="img"><img src="' . $img . '" title="' . esc_attr($p->title) . '" width="100" height="70"></span><span class="title"><strong>' . $p->title . '</strong></span></span></a></li>';
     return $output;
}
add_filter( 'wpp_post', 'custom_single_popular_post', 10, 3 );


function twpp_change_excerpt_length( $length ) {
  return 36;
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );




//アクセス数の取得
function get_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return "0 views";
    }
    return $count . '';
}
 
//アクセス数の保存
function set_post_views( $postID ) {
    $count_key = 'post_views_count';
    $count = get_post_meta( $postID, $count_key, true );
    if ( $count == '' ) {
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    } else {
        $count ++;
        update_post_meta( $postID, $count_key, $count );
    }
}