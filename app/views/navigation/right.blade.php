<div id="sidebar_right">
    <?php
    if (is_user()) {
        echo '<img src="/themes/Music_City/style/img/box/right.jpg" width="auto" height="146" alt="RIGHT BOX IMAGE" />';
        views('menu/right');
    } else {
        echo '<img src="/themes/Music_City/style/img/box/right.jpg" width="auto" height="146" alt="RIGHT BOX IMAGE" />';
        views('menu/right_no_user');
    }
    ?>
</div>
