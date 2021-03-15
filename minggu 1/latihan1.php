<?php
    $hasil = 0;
    $bil1 = 0;
    $bil2 = 0;
    $operator = null;

    if(isset($_POST['operator'])){
        $operator = $_POST['operator'];
    }

    if(isset($_POST['bil1'])){
        $bil1 = $_POST['bil1'];
    }

    if(isset($_POST['bil2'])){
        $bil2 = $_POST['bil2'];
    }

    if($operator == "+"){
        $hasil = $bil1 + $bil2;
    }else if($operator == "-"){
        $hasil = $bil1 - $bil2;
    }else if($operator == "*"){
        $hasil = $bil1 * $bil2;
    }else if($operator == "/"){
        $hasil = $bil1 / $bil2;
    }else{
        $hasil = $hasil;
    }
?>

<center>
    <form method="post">
        <label for="bil1">bil 1</label>
        <input type="text" name="bil1" required><br>
        <label for="bil2">bil 2</label>
        <input type="text" name="bil2" required><br>
        <label for="hasil">hasil</label>
        <input type="text" name="hasil" disabled value="<?php echo $hasil; ?>"><br>
        <label for="operator">operator</label>
        <select name="operator" id="">
            <option value="+">+ (tambah)</option>
            <option value="-">- (kurang)</option>
            <option value="*">* (kali)</option>
            <option value="/">/ (bagi)</option>
        </select>
        <input type="submit" value="=">
    </form>
</center>