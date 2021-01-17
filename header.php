<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile# fb: http://ogp.me/ns/fb#">

<head>
    <meta charset="utf-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- header addons -->
    <meta property="og:image" content="http://example.com/ogp.jpg" />  
    <meta property="og:image:secure_url" content="https://secure.example.com/ogp.jpg" />  
    <meta property="og:image:type" content="image/jpeg" />  
	<meta property="og:image:width" content="400" />  
    <meta property="og:image:height" content="300" />  
    <meta property="og:image:alt" content="A shiny red apple with a bite taken out" />
    <!-- header addons end -->

    
    <link rel="preload" href="<?= _assets(); ?>/libs/normalize.css" as="style">
    <link rel="preload" href="<?= _assets(); ?>/js/main.js" as="script" />
    <link rel="preload" href="<?= _assets(); ?>/css/main.css" as="style" />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-LightItalic.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Regular.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Thin.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-ThinItalic.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-BlackItalic.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Bold.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Italic.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Black.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-BoldItalic.eot" as="font" type="font/woff2" crossorigin />
    <link rel="preload" href="<?= _assets(); ?>/fonts/TTDrugs-Light.eot" as="font" type="font/woff2" crossorigin />
 

    <?php wp_head(); ?>
   
</head>
<body>
<div id="app" class="wrap">

<?php 
    get_template_part('template-parts/_header');
?>

