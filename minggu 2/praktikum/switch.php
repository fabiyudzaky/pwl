<?php
    $day = date ("D");
    switch ($day){
        case 'Sun' : $hari = "Ahad"; break;
        case 'Mon' : $hari = "Senin"; break;
        case 'Tue' : $hari = "Selasa"; break;
        case 'Wed' : $hari = "Rabu"; break;
        case 'Thu' : $hari = "Kamis"; break;
        case 'Fri' : $hari = "Jumat"; break;
        case 'Sat' : $hari = "Sabtu"; break;
        default : $hari = "Kiamat";
    }
    echo "Hari ini hari <b>$hari</b>";
?>