<!-- navigation -->
<?php
    $querydown = DB::run() -> query("SELECT `c`.*, (SELECT SUM(`count`) FROM `cats` WHERE `parent`=`c`.`id`) AS `subcnt`, (SELECT COUNT(*) FROM `downs` WHERE `category_id`=`id` AND `active`=? AND `time` > ?) AS `new` FROM `cats` `c` ORDER BY sort ASC;", [1, SITETIME-86400 * 5]);
    $downs = $querydown -> fetchAll();
?>

<ul id="nav" align="center">
<li><a href="/">Главная</a>
    <ul class="subs">
        <li><a href="/book">Гостевая</a></li>
        <li><a href="/mail">Обратная связь</a></li>
    </ul>
</li>
    
<li><a href="/load">Категории</a>
    <ul class="subs">
    <?php
        if (count($downs) > 0) {    
            $output = [];
                foreach ($downs as $row) {
                    $id = $row['id'];
                    $fp = $row['parent'];
                    $output[$fp][$id] = $row;
                }

        $totalnew = DB::run() -> querySingle("SELECT count(*) FROM `downs` WHERE `active`=? AND `time`>?;", [1, SITETIME-3600 * 120]);
        echo '<li><a href="/load/fresh"><b>Свежие ('.$totalnew.')</b></a></li>';

            foreach($output[0] as $key => $data) {
                echo '<li><a href="/load/down?cid='.$data['id'].'"><b>'.$data['name'].' ';
                $subcnt = (empty($data['subcnt'])) ? '' : '/'.$data['subcnt'];
                $new = (empty($data['new'])) ? '' : '/<span style="color:#ff0000">+'.$data['new'].'</span>';
                echo '('.$data['count'] . $subcnt . $new.')</b></a></li>';
                    if (isset($output[$key])) {
                        foreach($output[$key] as $odata) {
                            $subcnt = (empty($odata['subcnt'])) ? '' : '/'.$odata['subcnt'];
                            $new = (empty($odata['new'])) ? '' : '/<span style="color:#ff0000">+'.$odata['new'].'</span>';
                            echo '<li><a href="/load/down?cid='.$odata['id'].'"><b>'.$odata['name'].' ';
                            echo '('.$odata['count'] . $subcnt . $new.')</b></a></li>';
                        }
                    }
            }
        } else {
            echo '<li><a href="/load/fresh"><b>Свежие (0)</b></a></li>';
        }
    ?>
    </ul>
</li>

<li><a href="/news">Новости</a>
    <ul class="subs">
        <li><a href="/news/rss">RSS подписка</a></li>
    </ul>
</li>

<li><a href="/votes">Голосования</a>
    <ul class="subs">
        <li><a href="/votes/history">Архив голосований</a></li>
    </ul>
</li>

<li><a href="/rules">Правила</a>
    <ul class="subs">
        <li><a href="/razban">Исправительная</a></li>
    <li><a href="/page/stat">О проекте</a></li>
</ul>
</li>

<li><a href="/searchuser">Поиск пользователя</a>
    <ul class="subs">
        <li><a href="/userlist">Список юзеров (<?=stats_users()?>)</a></li>
        <li><a href="/adminlist">Администрация сайта (<?=stats_admins()?>)</a></li>
    </ul>
</li>

<div id="lavalamp"></div>
</ul>
