<!--
Bài 1: Tính chu vi và diện tích các hình học đơn giản
Dựa trên Bài tập 1 - Phần bài tập khởi động, SV bổ sung thêm một số nút radio button thực hiện việc tính chu vi và diện tích của các hình học sau:
    Tam giác đều.
    Tam giác thường có 3 cạnh a, b, c. Lưu ý: Trong khung nhập liệu độ dài cạnh, các cạnh được ngăn cách nhau bởi dấu phẩy (,). Trước khi tính chu vi và diện tích, phải kiểm tra 3 số a, b, c có phải là 3 cạnh của tam giác hay không.
    Hình vuông có 2 cạnh là a, b. Lưu ý: Trong khung nhập liệu độ dài cạnh, các cạnh được ngăn cách nhau bởi dấu phẩy (,). Trước khi tính chu vi và diện tích, phải kiểm tra 2 số a và b có thỏa >0 không.
-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tinh chu vi va dien tich</title>
    <style>
        fieldset {
            background-color: #eeeeee;
        }

        legend {
            background-color: gray;
            color: white;
            padding: 5px 10px;
        }

        input {
            margin: 5px;
        }
    </style>
</head>

<body>
    <?php
    abstract class Hinh
    {
        protected $ten, $dodai;
        public function setTen($ten)
        {
            $this->ten = $ten;
        }
        public function getTen()
        {
            return $this->ten;
        }
        public function setDodai($doDai)
        {
            $this->dodai = $doDai;
        }
        public function getDodai()
        {
            return $this->dodai;
        }
        abstract public function tinh_CV();
        abstract public function tinh_DT();
    }
    class HinhTron extends Hinh
    {
        const PI = 3.14;
        function tinh_CV()
        {
            return $this->dodai * 2 * self::PI;
        }
        function tinh_DT()
        {
            return pow($this->dodai, 2) * self::PI;
        }
    }
    class HinhVuong extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 4;
        }
        public function tinh_DT()
        {
            return pow($this->dodai, 2);
        }
    }
    class HinhTamGiacDeu extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 3;
        }
        public function tinh_DT()
        {
            return (pow($this->dodai, 2)*sqrt(3))/4;
        }
    }
    class HinhTamGiac extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 3;
        }
        public function tinh_DT()
        {
            return (pow($this->dodai, 2)*sqrt(3))/4;
        }
    }
    class HinhChuNhat extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 2;
        }
        public function tinh_DT()
        {
            return $this->dodai * 2;
        }
    }

    $str = NULL;
    if (isset($_POST['tinh'])) {
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {
            $hv = new HinhVuong();
            $hv->setTen($_POST['ten']);
            $hv->setDodai($_POST['dodai']);
            $str = "Diện tích hình vuông " . $hv->getTen() . " là : " . $hv->tinh_DT() . " \n" .
                "Chu vi của hình vuông " . $hv->getTen() . " là : " . $hv->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {
            $ht = new HinhTron();
            $ht->setTen($_POST['ten']);
            $ht->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .
                "Chu vi của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgd") {
            $ht = new HinhTamGiacDeu();
            $ht->setTen($_POST['ten']);
            $ht->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tam giác đều " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .
                "Chu vi của hình tam giác đều " . $ht->getTen() . " là : " . $ht->tinh_CV();
        }
    }
    ?>
    <form action="" method="post">
        <fieldset>
            <legend>Tính chu vi và diện tích các hình đơn giản</legend>
            <table border='0'>
                <tr>
                    <td>Chọn hình</td>
                    <td>
                        <input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked' ?> />Hình vuông
                        <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked' ?> />Hình tròn
                        <input type="radio" name="hinh" value="htgd" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htgd") echo 'checked' ?> />Hình tam giác đều
                        <input type="radio" name="hinh" value="htg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg") echo 'checked' ?> />Hình tam giác
                        <input type="radio" name="hinh" value="htcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htcn") echo 'checked' ?> />Hình chữ nhật
                    </td>
                </tr>
                <tr>
                    <td>Nhập tên:</td>
                    <td><input type="text" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập độ dài:</td>
                    <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" /></td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="tinh" value="TÍNH" /></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>

</html>