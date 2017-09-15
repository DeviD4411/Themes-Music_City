<?php

############################################################################################
##    Начальная страница работоспособности проекта - Определение версии проекта           ##
############################################################################################
function themeVersion($version) {
    $num1 = substr($version, 0, -4);
    $numdot = substr($version, -2, -1);
    $num2 = substr($version, -3, -2);
    $builddot = substr($version, -4, -3);
    $build = substr($version, -1);

        $versionn = 'Версия';
        $copy = '<i class="fa fa-copyright text-muted"> <b>2011-'.date('Y').' Music City - '.$versionn.'</b></i>';
        $versionnum1 = '<b>'.$num1.'</b>';
        $versionnumdot = '<i class="fa text-muted">'.$numdot.'</i>';
        $versionnum2 = '<b>'.$num2.'</b>';
        $builddott = '<i class="fa text-muted">'.$builddot.'</i>';
        $buildnum = '<span style="font-size:8px"><b>'.$build.'</b></span>';
        
        $themeversion = $copy.' <i class="fa fa-lg text-success">'.$versionnum1.''.$versionnumdot.''.$versionnum2.''.$builddott.''.$buildnum.'</i>';

    return $themeversion;
}
