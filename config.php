<?php 
    function getJarakPublish($publishAt){
        $uploadDate = strtotime($publishAt);
        $uploadDate= date("Y-m-d", $uploadDate); 
        $uploadDate= new DateTime($uploadDate);
        $tanggal2 = date_create('now');
        $jarak = $uploadDate->diff($tanggal2); // buat mencari jarak
        
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

    function singkat_angka($n) {
        if ($n < 900) {
            $format_angka = number_format($n);
            $simbol = '';
        } else if ($n < 900000) {
            $format_angka = number_format($n / 1000);
            $simbol = 'rb';
        } else if ($n < 900000000) {
            $format_angka = number_format($n / 1000000);
            $simbol = 'jt';
        } else if ($n < 900000000000) {
            $format_angka = number_format($n / 1000000000);
            $simbol = 'M';
        } else {
            $format_angka = number_format($n / 1000000000000);
            $simbol = 'T';
        }

        return $format_angka . $simbol;
    }
?>