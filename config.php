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

    function singkat_angka($n, $presisi=2) {
        if ($n < 900) {
            $format_angka = number_format($n, $presisi);
            $simbol = '';
        } else if ($n < 900000) {
            $format_angka = number_format($n / 1000, $presisi);
            $simbol = 'rb';
        } else if ($n < 900000000) {
            $format_angka = number_format($n / 1000000, $presisi);
            $simbol = 'jt';
        } else if ($n < 900000000000) {
            $format_angka = number_format($n / 1000000000, $presisi);
            $simbol = 'M';
        } else {
            $format_angka = number_format($n / 1000000000000, $presisi);
            $simbol = 'T';
        }
    
        if ( $presisi > 0 ) {
            $pisah = '.' . str_repeat( '0', $presisi );
            $format_angka = str_replace( $pisah, '', $format_angka );
        }
        
        return $format_angka . $simbol;
    }
?>