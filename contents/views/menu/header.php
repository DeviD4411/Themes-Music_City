<!-- menu header -->
<div class="usmenu">
    <?php
    if (is_user()){
        echo user_gender($log).' '; echo profile(App::user('login')).'';
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
    }
    ?>
</div>
