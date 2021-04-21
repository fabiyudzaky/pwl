<?php

    function hitung_nilai($persentase, $data){
        return $persentase / 100 * $data;
    }
    
    $catatan_khusus = array();
    $catatan_khusus[] = "Kehadiran >= 70 %";
    $catatan_khusus[] = "Interaktif di kelas";
    $catatan_khusus[] = "Tidak terlambat mengumpulkan tugas";

    $nilai_tugas    = 0;
    $nilai_uts      = 0;
    $nilai_uas      = 0;

    if(isset($_POST['simpan'])){
        if(isset($_POST['nim'])){
            $nim    = $_POST['nim'];
        }else{
            $nim    = "-";
        }
        
        if(isset($_POST['prodi'])){
            $prodi  = $_POST['prodi'];
        }else{
            $prodi    = "-";
        }
        
        if($_POST['tugas'] != 0){
            $tugas          = $_POST['tugas'];
            $nilai_tugas    = hitung_nilai(40, $tugas);
        }
        
        if($_POST['uts'] != 0){
            $uts            = $_POST['uts'];
            $nilai_uts      = hitung_nilai(30, $uts);
        }

        if($_POST['uas'] != 0){
            $uas            = $_POST['uas'];
            $nilai_uas      = hitung_nilai(30, $uas);
        }
    }
    $nilai_akhir    = $nilai_tugas + $nilai_uts + $nilai_uas;

    if($nilai_akhir >= 85){
        $huruf = "A";
    }
    elseif($nilai_akhir >= 70 && $nilai_akhir <= 84){
        $huruf = "B";
    }
    elseif($nilai_akhir >= 60 && $nilai_akhir <= 69){
        $huruf = "C";
    }
    elseif($nilai_akhir >= 50 && $nilai_akhir <= 59){
        $huruf = "D";
    }
    elseif($nilai_akhir < 50){
        $huruf = "E";
    }
    else{
        $huruf  = "-";
    }
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <form action="" method="post">
            <table style="border:0;">
                <tr>
                    <td>NIM</td>
                    <td><input type="text" name="nim" id="nim"></td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>
                        <select name="prodi" id="prodi">
                            <option value="A11">Teknik Informatika S1</option>
                            <option value="A12">Sistem Informasi S1</option>
                            <option value="A22">Teknik Informatika D3</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nilai Tugas</td>
                    <td><input type="number" name="tugas" id="tugas" min="0" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai UTS</td>
                    <td><input type="number" name="uts" id="uts" min="0" max="100"></td>
                </tr>
                <tr>
                    <td>Nilai UAS</td>
                    <td><input type="number" name="uas" id="uas" min="0" max="100"></td>
                </tr>
                <tr>
                    <td>Catatan Khusus</td>
                    <td>
                        <?php
                            foreach($catatan_khusus as $key => $value){
                                $key += 1;
                        ?>
                            <input type="checkbox" name="catatan<?php echo $key; ?>" id="catatan<?php echo $key; ?>" value="<?php echo $value; ?>"><?php echo $value; ?> <br>
                        <?php
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
            </table>
        </form>
       <table style="border:1px solid black;">
            <thead>
                <tr>
                    <th style="border:1px solid black;">Program Studi</th>
                    <th style="border:1px solid black;">NIM</th>
                    <th style="border:1px solid black;">Nilai Akhir</th>
                    <th style="border:1px solid black;">Status</th>
                    <th style="border:1px solid black;">Catatan Khusus</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:1px solid black;">
                        <?php
                            if(isset($nim))
                                echo $nim;
                            else echo "-";
                        ?>
                    </td>
                    <td style="border:1px solid black;">
                        <?php
                            if(isset($prodi))
                                echo $prodi;
                            else
                                echo "-";
                        ?>
                    </td>
                    <td style="border:1px solid black;">
                        <?php
                            echo $huruf;
                        ?>
                    </td>
                    <td style="border:1px solid black;">
                        <?php
                            if($nilai_akhir >= 60){
                                echo "LULUS";
                            }else{
                                echo "TIDAK";
                            }
                        ?>
                    </td>
                    <td style="border:1px solid black;">
                        <ul>
                            <?php
                                if(isset($_POST['catatan1'])){
                                    echo "<li>" . $_POST['catatan1'] . "</li>";
                                }
                                if(isset($_POST['catatan2'])){
                                    echo "<li>" . $_POST['catatan2'] . "</li>";
                                }
                                if(isset($_POST['catatan3'])){
                                    echo "<li>" . $_POST['catatan3'] . "</li>";
                                }
                            ?>
                        </ul>
                    </td>
                </tr>
            </tbody>
       </table> 
    </body>
</html>