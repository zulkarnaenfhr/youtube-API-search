<?php 
    $tgl1 = new DateTime("2020-01-01");
    $tgl2 = new DateTime("2020-02-20");
    $jarak = $tgl2->diff($tgl1);

    $jaraknya =  "variable";
    $jarakAsli = function($nb,$str){global $jaraknya; return $jaraknya .=" ".$nb.$str;}; // adds plurals
    if ($jarak->y !== 0) {
        $jarakAsli($jarak->y," tahun");
    }
    if ($jarak->m !== 0) {
        $jarakAsli($jarak->m," bulan");
    }
    if ($jarak->d !== 0) {
        $jarakAsli($jarak->d," hari");
    }

    echo $jaraknya
?>