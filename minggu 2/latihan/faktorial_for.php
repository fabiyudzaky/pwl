<?php
    $faktorial = 1;
    $hasil = 1;
    
    if(isset($_POST["faktorial"])){
        $faktorial = $_POST["faktorial"];
    }
    
    for($i = $faktorial; $i >= 1; $i--){
        $hasil *= $i;
    }
?>

<form action="" method="post">
    <label for="faktorial">Hitung :</label>
    <input type="text" name="faktorial" id="faktorial" style="width:50px;"> !
    <input type="submit" value="=">
    <input type="text" name="hasil" id="hasil" value="<?php echo $hasil;?>" readonly style="border:0;">
</form>