<?php
abstract class Nguoi
{
    protected $hoTen, $diaChi, $gioiTinh;

    /**
     * Get the value of hoTen
     */
    public function getHoTen()
    {
        return $this->hoTen;
    }

    /**
     * Set the value of hoTen
     *
     * @return  self
     */
    public function setHoTen($hoTen)
    {
        $this->hoTen = $hoTen;

        return $this;
    }

    /**
     * Get the value of diaChi
     */
    public function getDiaChi()
    {
        return $this->diaChi;
    }

    /**
     * Set the value of diaChi
     *
     * @return  self
     */
    public function setDiaChi($diaChi)
    {
        $this->diaChi = $diaChi;

        return $this;
    }

    /**
     * Get the value of gioiTinh
     */
    public function getGioiTinh()
    {
        return $this->gioiTinh;
    }

    /**
     * Set the value of gioiTinh
     *
     * @return  self
     */
    public function setGioiTinh($gioiTinh)
    {
        $this->gioiTinh = $gioiTinh;

        return $this;
    }
}

class SinhVien extends Nguoi
{
    private $lopHoc, $nganhHoc;

    //Version 2: Update construct
    public function __construct($hoTen,$diaChi,$gioiTinh,$lopHoc,$nganhHoc)
    {
        $this->hoTen = $hoTen;
        $this->diaChi = $diaChi;
        $this->gioiTinh = $gioiTinh;
        $this->lopHoc = $lopHoc;
        $this->nganhHoc = $nganhHoc;
    }

    /**
     * Get the value of lopHoc
     */
    public function getLopHoc()
    {
        return $this->lopHoc;
    }

    /**
     * Set the value of lopHoc
     *
     * @return  self
     */
    public function setLopHoc($lopHoc)
    {
        $this->lopHoc = $lopHoc;

        return $this;
    }

    /**
     * Get the value of nganhHoc
     */
    public function getNganhHoc()
    {
        return $this->nganhHoc;
    }

    /**
     * Set the value of nganhHoc
     *
     * @return  self
     */
    public function setNganhHoc($nganhHoc)
    {
        $this->nganhHoc = $nganhHoc;

        return $this;
    }

    public function tinhDiemThuong($nganhHoc)
    {
        if ($nganhHoc == "công nghệ thông tin") {
            return 1;
        } else if ($nganhHoc == "kinh tế") {
            return 1.5;
        } else return 0;
    }
}

class GiangVien extends Nguoi
{
    private $trinhDo;
    private const luongCoBan = 1500000;

    //Version 2: Update construct
    public function __construct($hoTen,$diaChi,$gioiTinh,$trinhDo)
    {
        $this->hoTen = $hoTen;
        $this->diaChi = $diaChi;
        $this->gioiTinh = $gioiTinh;
        $this->trinhDo = $trinhDo;
    }

    /**
     * Get the value of trinhDo
     */
    public function getTrinhDo()
    {
        return $this->trinhDo;
    }

    /**
     * Set the value of trinhDo
     *
     * @return  self
     */
    public function setTrinhDo($trinhDo)
    {
        $this->trinhDo = $trinhDo;

        return $this;
    }

    public function tinhLuong($trinhdo)
    {
        if ($trinhdo == "cử nhân") {
            return self::luongCoBan * 2.34;
        } else if ($trinhdo == "thạc sĩ") {
            return self::luongCoBan * 3.67;
        } else return self::luongCoBan * 5.66;
    }
}

$info = "";
if (isset($_POST["showInfo"])) {
    switch ($loaiDoiTuong = $_POST["loaiDoiTuong"]) {
        case "sinh viên": {
                //Version 1
                /*
                $addSv = new SinhVien();
                $addSv->setHoTen($_POST["hoTen"]);
                $addSv->setDiaChi($_POST["diaChi"]);
                $addSv->setGioiTinh($_POST["gioiTinh"]);
                $addSv->setLopHoc($_POST["lopHoc"]);
                $addSv->setNganhHoc($_POST["nganhHoc"]);
                */

                //Version 2: Update construct
                $addSv = new SinhVien($_POST["hoTen"],$_POST["diaChi"],$_POST["gioiTinh"],$_POST["lopHoc"],$_POST["nganhHoc"]);

                $info .= "Họ tên: ".$addSv->getHoTen()."\n".
                "Giới tính: ".$addSv->getGioiTinh()."\n".
                "Địa chỉ: ".$addSv->getDiaChi()."\n".
                "Lớp học: ".$addSv->getLopHoc()."\n".
                "Ngành học: ".$addSv->getNganhHoc()."\n".
                "Điểm thưởng: ".$addSv->tinhDiemThuong($addSv->getNganhHoc());
            }
            break;
        case "giảng viên": {
                //Version 1
                /*
                $addGv = new GiangVien();
                $addGv->setHoTen($_POST["hoTen"]);
                $addGv->setDiaChi($_POST["diaChi"]);
                $addGv->setGioiTinh($_POST["gioiTinh"]);
                $addGv->setTrinhDo($_POST["trinhDo"]);
                */

                //Version 2: Update construct
                $addGv = new GiangVien($_POST["hoTen"],$_POST["diaChi"],$_POST["gioiTinh"],$_POST["trinhDo"]);

                $info .= "Họ tên: ".$addGv->getHoTen()."\n".
                "Giới tính: ".$addGv->getGioiTinh()."\n".
                "Địa chỉ: ".$addGv->getDiaChi()."\n".
                "Trình độ: ".$addGv->getTrinhDo()."\n".
                "Lương: ".$addGv->tinhLuong($addGv->getTrinhDo());
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Người</title>
</head>
<body>
    <form action="" method="post">
        <table style="margin: auto; text-align: center;  border: 1px solid white; background: #ccc">
            <tr style="color:white; background:blue">
                <th colspan="4">
                    <h1 style="text-align: center;  border: 1px solid white; ">QUẢN LÝ NGƯỜI</h1>
                </th>
            </tr>
            <tr>
                <td>Chọn đối tượng: </td>
                <td>
                    <input type="radio" name="loaiDoiTuong" value="sinh viên" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "sinh viên") echo 'checked' ?> /> Sinh viên
                    <input type="radio" name="loaiDoiTuong" value="giảng viên" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "giảng viên") echo 'checked' ?> /> Giảng viên
                </td>
            </tr>
            <tr>
                <td>Họ và tên: </td>
                <td><input type="text" name="hoTen" style="width: 300px;" value="<?php echo (isset($_POST["hoTen"]) ? $_POST["hoTen"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="nam" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nam") echo 'checked' ?> />Nam
                    <input type="radio" name="gioiTinh" value="nữ" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nữ") echo 'checked' ?> />Nữ
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="diaChi" style="width: 300px;" value="<?php echo (isset($_POST["diaChi"]) ? $_POST["diaChi"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Trình độ: </td>
                <td>
                    <input type="radio" name="trinhDo" value="cử nhân" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "cử nhân") echo 'checked' ?> /> Cử nhân
                    <input type="radio" name="trinhDo" value="thạc sĩ" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "thạc sĩ") echo 'checked' ?> /> Thạc sĩ
                    <input type="radio" name="trinhDo" value="tiến sĩ" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "tiến sĩ") echo 'checked' ?> /> Tiến sĩ
                </td>
            </tr>
            <tr>
                <td>Lớp học: </td>
                <td><input type="text" name="lopHoc" style="width: 300px;" value="<?php echo (isset($_POST["lopHoc"]) ? $_POST["lopHoc"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ngành học: </td>
                <td>
                    <input type="radio" name="nganhHoc" value="công nghệ thông tin" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "công nghệ thông tin") echo 'checked' ?> /> CNTT
                    <input type="radio" name="nganhHoc" value="kinh tế" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "kinh tế") echo 'checked' ?> /> Kinh Tế
                    <input type="radio" name="nganhHoc" value="ngành khác" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "ngành khác") echo 'checked' ?> /> Ngành khác
                </td>
            </tr>

            <tr>
                <td colspan="4" align="center"><input style="margin: auto;" type="submit" name="showInfo" value="Hiển thị thông tin"></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                <textarea name="comment" disabled rows="6" cols="30"><?php if(isset($_POST['showInfo'])) echo $info; ?></textarea>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>