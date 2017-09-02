<?php
if (file_exists(HOME.'/themes/Music_City/app/functions')) {
    $files = glob(HOME.'/themes/Music_City/app/functions/*.php');
    foreach ($files as $file) {
        require_once $file;
    }
}
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
    <link rel="stylesheet" href="/themes/Music_City/style/css/theme.css" type="text/css" />
    <link rel="stylesheet" href="/themes/Music_City/style/css/nav.css" type="text/css" />
    <link rel="stylesheet" href="/themes/Music_City/style/css/slides.css" type="text/css" />
    <link rel="alternate" href="/news/rsss" title="RSS News" type="application/rss+xml" />
    <meta name="keywords" content="%KEYWORDS%" />
    <meta name="description" content="%DESCRIPTION%" />
    <meta name="generator" content="RotorCMS {{ VERSION }}" />
</head>
<body>
<!-- Designer by DeviD - http://devid.me | http://realmoney.me -->

<div id="wrap">
    <div id="header">
        <h1 id="logo"><a href="/"><img src="/themes/Music_City/style/img/logotype/logo.png" alt="{{ App::setting('title') }}" /></a></h1>
        <h1 id="logo-text"><i class="fa fa-thumbs-up fa-lg text-muted"> {{ App::setting('logos') }}</i></h1>
        <div id="header-links">
            <p>
                <div class="usmenu">
                    <?php if (is_user()){
                               echo user_gender($log).' '; echo profile($log).'';
                                   if (is_admin()){
                                            if (stats_spam()>0){
                                                echo ' | <a href="/admin/spam"><span style="color:#ff0000">Спам!</span></a>';
                                            }
                                            if (App::user('newchat')<stats_newchat()){
                                                echo ' | <a href="/admin/chat"><span style="color:#ff0000">Чат</span></a>';
                                            }
                                            echo ' | <a href="/admin">Панель управления </a>';
                                            echo ' | <a href="/menu">Меню</a>';
                                            echo ' | <a href="/logout" onclick="return logout(this)"><b>Выход</b></a>';
                                   }
                          } else {
                              echo '<b><i class="fa fa-user-circle-o"></i></b> <a href="/login'.App::returnUrl().'">Авторизация</a> | ';
                              echo '<a href="/register">Регистрация</a>';
                          } ?>
                </div>
            </p>
        </div>
    </div>
    
    <!-- content navigation starts here -->
    <?php views('navigation/index'); ?>

    <div id="content-wrap">
        <div id="sidebar">
            <!-- content right starts here -->
            <?php views('navigation/right'); ?>
        </div>

    <!-- content logotype starts here -->
    <?php views('logotype/index'); ?>

    <div id="main">
        <div class="body_center">
        <?= render('includes/note'); ?>
