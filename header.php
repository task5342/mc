<?php
//BASE URL
$home_url = get_home_url();
$temp_url = get_stylesheet_directory_uri();


if ( is_home() || is_front_page() ) {
	$wrapper_class = ' top';
	$header_class = ' class="visible-xs"';
}else{
	$wrapper_class = ' lower_layer';
	$header_class = '';
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>



<link rel="stylesheet" href="https://use.typekit.net/yzs1ipz.css">
<link rel="stylesheet" type="text/css" href="<?php echo $temp_url; ?>/assets/css/bulma.css" class="versionedAsset">
<link type="text/css" rel="stylesheet" href="<?php echo $temp_url; ?>/assets/css/lightslider.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $temp_url; ?>/assets/css/style.css" class="versionedAsset">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<?php echo $temp_url; ?>/assets/js/lightslider.js"></script>

</head>

<body class="post-template tag-css">

<header id="header" class="">
    <h1><a href=""><img src="<?php echo $temp_url; ?>/assets/img/logo.png" srcset="<?php echo $temp_url; ?>/assets/img/logo.png 1x,<?php echo $temp_url; ?>/assets/img/logo@2x.png 2x" alt=""></a></h1>
    <ul>
        <li><a href="#works">WORKS</a></li>
        <li><a href="#recording">RECORDING</a></li>
        <li><a href="#contact">CONTACT</a></li>
    </ul>
</header><!-- /header -->