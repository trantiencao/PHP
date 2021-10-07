<!-- Bài 2: Thiết kế Form nhập và tính trên dãy số -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tổng dãy số</title>
    
</head>
<body>
    <?php
        $ketQua=0;
        $mang_so=0;
        

        if(isset($_POST['mang'])){
           $mang = $_POST['mang'];
        }
        else $mang ="";
        if(isset($_POST['btnTinh'])){
            $mang_so = explode(", ",$mang);
            $dem = count($mang_so);
            for($i=0;$i<$dem;$i++){
                $ketQua += $mang_so[$i];
            }
        }
        else $ketQua = 0;
    ?>
    <form action="TongDaySo.php" method="post">
        <table style="width:350px;" align="center" bgcolor="#20B2AA" cellpadding="2" cellspacing="2">
            <tr bgcolor="#008080">
                <th colspan="3" align="center"><h3><i><font color="white">Nhập và tính trên dãy số</font></i></h3></th>
            </tr>
            <tr>
                <td>Nhập dãy số:</td>
                <td><input type="text" name="mang" value="<?php 
                $fp=fopen("dulieu.txt","r") or exit("khong tim thay file can mo");
                while(!feof($fp))
                {
                    echo fgetc($fp);
                }
                fclose($fp);
                 ?>"/><font color="red">(*)</font></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnTinh" value="Tổng dãy số" style="background: #FFFFCC"></td>
            </tr>
            <tr>
                <td>Tổng dãy số:</td>
                <td><input type="text" name="ketQua" disabled="disabled" value="<?php echo $ketQua; ?>" ></td>
            </tr>
        </table>
    </form>
</body>
</html>