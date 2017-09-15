<?php
if (file_exists(HOME.'/themes/Music_City/bootstrap')) {
    $bootstraps = glob(HOME.'/themes/Music_City/bootstrap/*.php');
    foreach ($bootstraps as $bootstrap) {
        require_once $bootstrap;
    }
}
?>

<?php
header("Content-type:text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        @section('title')
            {{ App::setting('title') }}
        @show
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="image_src" href="/assets/img/images/icon.png" />
    <?= include_style() ?>
    <link rel="stylesheet" href="/themes/{{ THEME_NAME }}/style/css/theme.css" type="text/css" />
    <link rel="stylesheet" href="/themes/{{ THEME_NAME }}/style/css/menu.css" type="text/css" />
    <link rel="stylesheet" href="/themes/{{ THEME_NAME }}/style/css/slides.css" type="text/css" />
    <link rel="alternate" href="/news/rsss" title="RSS News" type="application/rss+xml" />
    <meta name="keywords" content="%KEYWORDS%" />
    <meta name="description" content="%DESCRIPTION%" />
    <meta name="generator" content="RotorCMS {{ VERSION }}" />
    <meta name="generator" content="Real Money™ -  Music City {{ THEME_VERSION }}.{{ THEME_BUILD_VERSION }}" />
</head>
<body>
<!-- Designer by DeviD - http://devid.me | http://realmoney.me -->

<div id="wrap">
    <div id="header">
        <h1 id="logo"><a href="/"><img src="/themes/{{ THEME_NAME }}/style/images/site/logo.png" alt="{{ App::setting('title') }}" /></a></h1>
        <h1 id="logo-text"><i class="fa fa-thumbs-up fa-lg text-muted"> {{ App::setting('logos') }}</i> </h1>
        <div id="header-links">
            <p>
                <!-- content menu starts here -->
                <?php contentsView('views/menu/header'); ?>
            </p>
        </div>
    </div>
    
    <!-- content navigation starts here -->
    <?php contentsView('views/navigation/main'); ?>

    <div id="content-wrap">
        <div id="sidebar">
            <!-- content right starts here -->
            <?php contentsView('views/navigation/right'); ?>
        </div>

    <!-- content slides starts here -->
    <?php contentsView('includes/slides/header'); ?>

    <div id="main">
        <div class="body_center">
        <?= render('includes/note'); ?>
