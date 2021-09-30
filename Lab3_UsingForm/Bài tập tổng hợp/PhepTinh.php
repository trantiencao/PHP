<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thực hiện phép tính</title>
</head>
<body>
    <?php
        if(isset($_POST['txtSTN'])) 
            $first = trim($_POST['txtSTN']);
        else $first=0;
        if(isset($_POST['txtSTH']))  
            $second=trim($_POST['txtSTH']); 
        else $second=0;
    ?>
    <form action="KetQuaPhepTinh.php" method="POST">
        <table align="center">
            <tr>
                <th colspan="5" align="center"><h3><font color="blue">PHÉP TÍNH TRÊN HAI SỐ</font></h3></th>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>Cộng<input type="radio" name="ptinh" value="cong" /></td>
                <td>Trừ<input type="radio" name="ptinh" value="tru" /></td>
                <td>Nhân<input type="radio" name="ptinh" value="nhan" /></td>
                <td>Chia<input type="radio" name="ptinh" value="chia" /></td>
            </tr>
            <tr></tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td colspan="4"><input type="text" name="txtSTN" value="<?php echo $first;?>"/></td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td colspan="4"><input type="text" name="txtSTH" value="<?php echo $second;?>"/></td>
            </tr>
            <tr>
                <td colspan = "2" align="center"><input type="submit" name="btnTinh" value="Tính"/></td>
            </tr>
        </table>
    </form>
</body>
</html>