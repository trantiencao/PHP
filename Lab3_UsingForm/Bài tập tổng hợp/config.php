<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưu thông tin</title>
</head>
<body>
    <?php
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phoneNumber']; 
        $sex = $_POST['sex'];
        $nationality = $_POST['nationality'];
        $note = $_POST['note'];

        if ($_POST['sex'] == 'male') {
            $sex = "Nam";
        }
        else if ($_POST['sex'] == 'female') {
            $sex = "Nữ";
        }
    ?>
    <h2>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn nhập:</h2><br>
    <p>Họ tên: <?php echo $name;?></p>
    <p>Giới tính: <?php echo $sex;?></p>
    <p>Địa chỉ: <?php echo $address;?></p>
    <p>Số điện thoại: <?php echo $phoneNumber;?></p>
    <p>Quốc tịch: <?php echo $nationality;?></p>
    <p>Môn học: <?php if(isset($_POST["mh1"])) { echo $_POST["mh1"]; echo ", ";} ?> 
                <?php if(isset($_POST["mh2"])) { echo $_POST["mh2"]; echo ", ";} ?> 
                <?php if(isset($_POST["mh3"])) { echo $_POST["mh3"]; echo ", ";} ?>
                <?php if(isset($_POST["mh4"])) { echo $_POST["mh4"]; echo ".";} ?></p>
    <p>Ghi chú: <?php echo $note;?></p>
    <a href="javascript:window.history.back(-1);">Trở về trang trước</a>
</body>
</html>