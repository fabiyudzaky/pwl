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
                        <input type="checkbox" name="catatan1" id="catatan1" value="Kehadiran >= 70 %">Kehadiran >= 70 % <br>
                        <input type="checkbox" name="catatan2" id="catatan2" value="Interaktif dikelas">Interaktif dikelas <br>
                        <input type="checkbox" name="catatan3" id="catatan3" value="Tidak terlambat mengumpulkan tugas">Tidak terlambat mengumpulkan tugas
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="simpan" value="Simpan"></td>
                </tr>
            </table>
        </form>
        <?php
            $tugas  = 0;
            $uts    = 0;
            $uas    = 0;
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
                if(isset($_POST['tugas'])){
                    $tugas  = $_POST['tugas'];
                }
                if(isset($_POST['uts'])){
                    $uts    = $_POST['uts'];
                }
                if(isset($_POST['uas'])){
                    $uas    = $_POST['uas'];
                }
            }

            $nilai_tugas    = 40 / 100 * $tugas;
            $nilai_uts      = 30 / 100 * $uts;
            $nilai_uas      = 30 / 100 * $uas;
            $nilai_akhir    = $nilai_tugas + $nilai_uts + $nilai_uas;

            if($nilai_akhir >= 85){
                $huruf = "A";
            }
            elseif($nilai_akhir >= 84 && $nilai_akhir <= 70){
                $huruf = "B";
            }
            elseif($nilai_akhir >= 69 && $nilai_akhir <= 60){
                $huruf = "C";
            }
            elseif($nilai_akhir >= 59 && $nilai_akhir <= 50){
                $huruf = "D";
            }
            elseif($nilai_akhir < 50){
                $huruf = "E";
            }
            else{
                $huruf  = "-";
            }
        ?>
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