<!-- Tạo form nhập vào chiều dài và chiều rộng, tính diện tích của hình chữ nhật. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>RECTANGLE AREA</title>

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
        // Để thông báo cho server nhận dữ liệu từ POST khi có,
        // thì chúng ta chỉ cần sử dụng $_POST,
        // đây là một biến toàn cục lưu trữ dưới dạng mảng bất tuần tự.
        //   Để lấy giá trị của POST chúng ta sử dụng cú pháp: $_POST['FieldName'];
        // Trong đó: FieldName là tên của post data chúng ta muốn nhận 

        if(isset($_POST['chieuDai']))  
        // Hàm trim($str, $char) sẽ loại bỏ khoẳng trắng (hoặc bất kì kí tự nào được cung cấp) dư thừa ở đầu và cuối chuỗi.
            $chieuDai=trim($_POST['chieuDai']);
        else $chieuDai=0;
        if(isset($_POST['chieuRong'])) 
            $chieuRong=trim($_POST['chieuRong']); 
        else $chieuRong=0;
        if(isset($_POST['tinh'])) {
            if (is_numeric($chieuDai) && is_numeric($chieuRong))  
                $dienTich=$chieuDai * $chieuRong;
            else {
                echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                $dienTich="";
            }
        } else $dienTich=0;
    ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-4"></div>
            <div class="col-5">
                <form action="RectangleArea.php" method="post" role="form">
                    <table border="0" style="background-color: lightgrey">
                        <tr bgcolor="lightblue">
                            <th colspan="2" align="center">
                                <h3><font style="font-family: garamond,arial,helvetica;" color="blue">DIỆN TÍCH HÌNH CHỮ NHẬT</font></h3>
                            </th>
                        </tr>
                        <tr>
                            <td>Chiều dài:</td>
                            <td align="right"><input type="number" name="chieuDai" value="<?php echo $chieuDai;?>"/></td>
                        </tr>
                        <tr>
                            <td>Chiều rộng:</td>
                            <td align="right"><input type="number" name="chieuRong" value="<?php echo $chieuRong;?>"/></td>
                        </tr>
                        <tr>
                            <td>Diện tích:</td>
                            <td align="right"><input type="text" name="dienTich" disabled="disabled" value="<?php echo $dienTich;?>"/></td>
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