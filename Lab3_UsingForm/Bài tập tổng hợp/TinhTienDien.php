<!-- Tạo form nhập vào chiều dài và chiều rộng, tính diện tích của hình chữ nhật. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tính tiền điện</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php 
        // define('donGia',20000);
        const donGia = 20000; 
        // Để thông báo cho server nhận dữ liệu từ POST khi có,
        // thì chúng ta chỉ cần sử dụng $_POST,
        // đây là một biến toàn cục lưu trữ dưới dạng mảng bất tuần tự.
        //   Để lấy giá trị của POST chúng ta sử dụng cú pháp: $_POST['FieldName'];
        // Trong đó: FieldName là tên của post data chúng ta muốn nhận

        if(isset($_POST['tenChuHo']))  
        // Hàm trim($str, $char) sẽ loại bỏ khoẳng trắng (hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi.
            $tenChuHo=trim($_POST['tenChuHo']);
        else $tenChuHo='';
        if(isset($_POST['chiSoCu'])) 
            $chiSoCu=trim($_POST['chiSoCu']); 
        else $chiSoCu=0;
        if(isset($_POST['chiSoMoi'])) 
            $chiSoMoi=trim($_POST['chiSoMoi']); 
        else $chiSoMoi=0;
        if(isset($_POST['tinh'])) {
            if (is_numeric($chiSoCu) && is_numeric($chiSoMoi)) {
                $soTienThanhToan = ($chiSoMoi - $chiSoCu)*donGia;
            }
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $soTienThanhToan="";
            }
        } else $soTienThanhToan=0;
    ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-5">
                <form action="TinhTienDien.php" method="post" role="form">
                    <table border="0" style="background-color: lightgrey;">
                        <tr bgcolor="lightblue" align="center">
                            <th colspan="3">
                                <h3><font style="font-family: garamond,arial,helvetica;" color="blue">THANH TOÁN TIỀN ĐIỆN</font></h3>
                            </th>
                        </tr>
                        <tr>
                            <td>Tên chủ hộ:</td>
                            <td align="center"><input type="text" name="tenChuHo" value="<?php echo $tenChuHo;?>"/></td>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td>Chỉ số cũ:</td>
                            <td align="center"><input type="number" name="chiSoCu" value="<?php echo $chiSoCu;?>"/></td>
                            <td align="right">(Kw)</td>
                        </tr>
                        <tr>
                            <td>Chỉ số mới:</td>
                            <td align="center"><input type="number" name="chiSoMoi" value="<?php echo $chiSoMoi;?>"/></td>
                            <td align="right">(Kw)</td>
                        </tr>
                        <tr>
                            <td>Đơn giá:</td>
                            <td align="center"><input type="number" name="donGia" value="<?php echo donGia;?>"/></td>
                            <td align="right">(VNĐ)</td>
                        </tr>
                        <tr>
                            <td>Số tiền thanh toán:</td>
                            <td align="center"><input type="number" name="soTienThanhToan" disabled="disabled" value="<?php echo $soTienThanhToan;?>"/></td>
                            <td align="right">(VNĐ)</td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right"><input type="submit" value="Tính" name="tinh"/></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    
</body>
</html>