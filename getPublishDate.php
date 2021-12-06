<?php 
    function getJarakPublish($publishAt){
        $uploadDate = strtotime($publishAt);
        $uploadDate= date("Y-m-d", $uploadDate); 
        $uploadDate= new DateTime($uploadDate);
        $tanggal2 = date_create();
        $jarak = $uploadDate->diff($tanggal2);
        
        $jarakAsli = function($nb,$str){global $jaraknya; return $jaraknya .=" ".$nb.$str;}; // adds plurals
        if ($jarak->y !== 0) {
            $jarakAsli($jarak->y," tahun");
        }
        if ($jarak->m !== 0) {
            $jarakAsli($jarak->m," bulan");
        }
        
        global $jaraknya;
        return $jaraknya;
    }
?>