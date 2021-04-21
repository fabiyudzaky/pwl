<?php
    $str = "Is your name Dzaky ?";
    $str2 = addslashes($str);
    $str3 = stripslashes($str2);
    echo "<b>String asli</b> : $str";
    echo "<br><b>adslashes()</b> : $str";
    echo "<br><b>stripslashes()</b> : $str3";
?>