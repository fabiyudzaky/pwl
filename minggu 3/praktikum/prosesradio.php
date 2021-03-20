<?php
    if(isset($_POST['pilih'])){
        $nama = $_POST['jurusan'];
        echo "Jurusan Anda adalah <b><font color='red'>$nama</font></b>";
    }
?>