<!-- menu right no_user -->
<div class="b"><i class="fa fa-user-circle-o"></i> <b><?= App::setting('guestsuser') ?></b></div>
    <i class="fa fa-circle-o fa-lg text-muted"></i> <a href="/login<?= App::returnUrl() ?>">Авторизация</a><br>
    <i class="fa fa-circle-o fa-lg text-muted"></i> <a href="/register">Регистрация</a><br>
    <i class="fa fa-circle-o fa-lg text-muted"></i> <a href="/lostpassword">Забыли пароль?</a><br>
    
<div class="b"><i class="fa fa-line-chart fa-lg text-muted"></i> <b>TOP 10</b></div>
    <?= top(); ?>
    <i class="fa fa-line-chart text-muted"></i> <a href="/load/top">Топ популярных файлов</a><br>
    <i class="fa fa-search text-muted"></i>  <a href="/load/search">Поиск в файлах</a><br>

<div class="b"><i class="fa fa-list-alt fa-lg text-muted"></i> <a href="/load"><b>Категории раздела</b></a></div>
    <?php 
    $querydown = DB::run() -> query("SELECT `c`.*, (SELECT SUM(`count`) FROM `cats` WHERE `parent`=`c`.`id`) AS `subcnt`, (SELECT COUNT(*) FROM `downs` WHERE `category_id`=`id` AND `active`=? AND `time` > ?) AS `new` FROM `cats` `c` ORDER BY sort ASC;", [1, SITETIME-86400 * 5]);
    $downs = $querydown -> fetchAll();

if (count($downs) > 0) {
    $output = [];

foreach ($downs as $row) {
    $id = $row['id'];
    $fp = $row['parent'];
    $output[$fp][$id] = $row;
}

$totalnew = DB::run() -> querySingle("SELECT count(*) FROM `downs` WHERE `active`=? AND `time`>?;", [1, SITETIME-3600 * 120]);
echo '<i class="fa fa-music"></i> <b><a href="/load/fresh">Свежие</a></b> ('.$totalnew.')<br>';

foreach($output[0] as $key => $data) {
    echo '<i class="fa fa-music"></i> ';
    echo '<b><a href="/load/down?cid='.$data['id'].'">'.$data['name'].'</a></b> ';
    $subcnt = (empty($data['subcnt'])) ? '' : '/'.$data['subcnt'];
    $new = (empty($data['new'])) ? '' : '/<span style="color:#ff0000">+'.$data['new'].'</span>';
    echo '('.$data['count'] . $subcnt . $new.')<br>';

        if (isset($output[$key])) {
            foreach($output[$key] as $odata) {
                $subcnt = (empty($odata['subcnt'])) ? '' : '/'.$odata['subcnt'];
                $new = (empty($odata['new'])) ? '' : '/<span style="color:#ff0000">+'.$odata['new'].'</span>';
                echo '<i class="fa fa-angle-right"> <i class="fa fa-music"></i></i> <b><a href="/load/down?cid='.$odata['id'].'">'.$odata['name'].'</a></b> ';
                echo '('.$odata['count'] . $subcnt . $new.')<br>';
            }
        }
}

if (is_user()) {
    echo '<div class="b"><i class="fa fa-list-alt fa-lg text-muted"></i> Мои</div>';
    echo '<i class="fa fa-folder-open"></i> <a href="/load/active?act=files">Файлы</a><br>';
    echo '<i class="fa fa-folder-open"></i> <a href="/load/active?act=comments">Комментарии</a><br>';
}
        
echo '<div class="b"><i class="fa fa-list-alt fa-lg text-muted"></i> Новые</div>';
echo '<i class="fa fa-folder-open"></i> <a href="/load/new?act=files">Файлы</a><br>';
echo '<i class="fa fa-folder-open"></i> <a href="/load/new?act=comments">Комментарии</a><br>';

} else {
    show_error('Категории еще не созданы!');
}
    ?>
