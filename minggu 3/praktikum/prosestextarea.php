<?php
    if(isset($_POST['proses'])){
        $saran = $_POST['saran'];
        echo "Kritik / Saran : <br>";
        echo "<font color=blue><b>$saran</b></font>";
    }
?>