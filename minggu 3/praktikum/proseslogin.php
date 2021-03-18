<?php
    if(isset($_POST['login'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if($user == "fabiyudzaky" && $pass == "123"){
            echo "<h2>Login Berhasil</h2>";
        }else{
            echo "<h2>Login Gagal</h2>";
        }
    }
?>