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

    public function tinhDiemThuong($nganh)
    {
        if ($nganh == "cntt") {
            return 1;
        } else if ($nganh == "kt") {
            return 1.5;
        } else return 0;
    }
}

class GiangVien extends Nguoi
{
    private $trinhDo;
    private const luongCoBan = 1500000;

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
        if ($trinhdo == "cn") {
            return self::luongCoBan * 2.34;
        } else if ($trinhdo == "ths") {
            return self::luongCoBan * 3.67;
        } else return self::luongCoBan * 5.66;
    }
}

$info = "";
if (isset($_POST["showInfo"])) {
    switch ($loaiDoiTuong = $_POST["loaiDoiTuong"]) {
        case "sv": {
                $addSv = new SinhVien();
                $addSv->setHoTen($_POST["hoTen"]);
                $addSv->setGioiTinh($_POST["gioiTinh"]);
                $addSv->setDiaChi($_POST["diaChi"]);
                $addSv->setLopHoc($_POST["lopHoc"]);
                $addSv->setNganhHoc($_POST["nganhHoc"]);

                $info .= "Họ tên: ".$addSv->getHoTen()."\n".
                "Giới tính: ".$addSv->getGioiTinh()."\n".
                "Địa chỉ: ".$addSv->getDiaChi()."\n".
                "Lớp học: ".$addSv->getLopHoc()."\n".
                "Ngành học: ".$addSv->getNganhHoc()."\n".
                "Điểm thưởng: ".$addSv->tinhDiemThuong($addSv->getNganhHoc());
            }
            break;
        case "gv": {
                $addGv = new GiangVien();
                $addGv->setHoTen($_POST["hoTen"]);
                $addGv->setGioiTinh($_POST["gioiTinh"]);
                $addGv->setDiaChi($_POST["diaChi"]);
                $addGv->setTrinhDo($_POST["trinhDo"]);

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
                    <input type="radio" name="loaiDoiTuong" value="sv" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "sv") echo 'checked' ?> /> Sinh viên
                    <input type="radio" name="loaiDoiTuong" value="gv" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "gv") echo 'checked' ?> /> Giảng viên
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
                    <input type="radio" name="gioiTinh" value="nu" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nu") echo 'checked' ?> />Nữ
                </td>
            </tr>
            <tr>
                <td>Địa chỉ: </td>
                <td><input type="text" name="diaChi" style="width: 300px;" value="<?php echo (isset($_POST["diaChi"]) ? $_POST["diaChi"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Trình độ: </td>
                <td>
                    <input type="radio" name="trinhDo" value="cn" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "cn") echo 'checked' ?> /> Cử nhân
                    <input type="radio" name="trinhDo" value="ths" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "ths") echo 'checked' ?> /> Thạc sĩ
                    <input type="radio" name="trinhDo" value="ts" <?php if (isset($_POST['trinhDo']) && ($_POST['trinhDo']) == "ts") echo 'checked' ?> /> Tiến sĩ
                </td>
            </tr>
            <tr>
                <td>Lớp học: </td>
                <td><input type="text" name="lopHoc" style="width: 300px;" value="<?php echo (isset($_POST["lopHoc"]) ? $_POST["lopHoc"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ngành học: </td>
                <td>
                    <input type="radio" name="nganhHoc" value="cntt" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "cntt") echo 'checked' ?> /> CNTT
                    <input type="radio" name="nganhHoc" value="kt" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "kt") echo 'checked' ?> /> Kinh Tế
                    <input type="radio" name="nganhHoc" value="nganhkhac" <?php if (isset($_POST['nganhHoc']) && ($_POST['nganhHoc']) == "nganhkhac") echo 'checked' ?> /> Ngành khác
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