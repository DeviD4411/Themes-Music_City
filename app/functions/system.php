<?php

############################################################################################
##    Функция кэширования топ файлов load                                                 ##
############################################################################################
function top($show = 10) {
    if (@filemtime(STORAGE."/temp/top.dat") < time()-600) {
        $queryfiles = DB::run() -> query("SELECT * FROM `downs` WHERE `active`=? ORDER BY `time` DESC LIMIT ".$show.";", [1]);
        $recent = $queryfiles -> fetchAll();

        file_put_contents(STORAGE."/temp/top.dat", serialize($recent), LOCK_EX);
    }

    $files = unserialize(file_get_contents(STORAGE."/temp/top.dat"));
    if (is_array($files) && count($files) > 0) {
        foreach ($files as $file){

            $filesize = (!empty($file['link'])) ? read_file(HOME.'/uploads/files/'.$file['link']) : 0;
            echo '<i class="fa fa-music fa-lg text-muted"></i>  <a href="/load/down?act=view&amp;id='.$file['id'].'">'.$file['title'].'</a> ('.$filesize.')<br />';
        }
    }
}

############################################################################################
##    Функция подключения файлов views                                                    ##
############################################################################################
function views($view, $params = [], $return = false){
    extract($params);
    if ($return) {
        ob_start();
    }
        if (file_exists(HOME.'/themes/Music_City/app/views/'.$view.'.blade.php')){
            include (HOME.'/themes/Music_City/app/views/'.$view.'.blade.php');
        }

            if ($return) {
                return ob_get_clean();
            }
}
