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
    public function construct($hoTen,$diaChi,$gioiTinh,$lopHoc,$nganhHoc)
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
        if ($nganhHoc == "c??ng ngh??? th??ng tin") {
            return 1;
        } else if ($nganhHoc == "kinh t???") {
            return 1.5;
        } else return 0;
    }
}

class GiangVien extends Nguoi
{
    private $trinhDo;
    private const luongCoBan = 1500000;

    //Version 2: Update construct
    public function construct($hoTen,$diaChi,$gioiTinh,$trinhDo)
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
        if ($trinhdo == "c??? nh??n") {
            return self::luongCoBan * 2.34;
        } else if ($trinhdo == "th???c s??") {
            return self::luongCoBan * 3.67;
        } else return self::luongCoBan * 5.66;
    }
}

$info = "";
if (isset($_POST["showInfo"])) {
    switch ($loaiDoiTuong = $_POST["loaiDoiTuong"]) {
        case "sinh vi??n": {
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

                $info .= "H??? t??n: ".$addSv->getHoTen()."\n".
                "Gi???i t??nh: ".$addSv->getGioiTinh()."\n".
                "?????a ch???: ".$addSv->getDiaChi()."\n".
                "L???p h???c: ".$addSv->getLopHoc()."\n".
                "Ng??nh h???c: ".$addSv->getNganhHoc()."\n".
                "??i???m th?????ng: ".$addSv->tinhDiemThuong($addSv->getNganhHoc());
            }
            break;
        case "gi???ng vi??n": {
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

                $info .= "H??? t??n: ".$addGv->getHoTen()."\n".
                "Gi???i t??nh: ".$addGv->getGioiTinh()."\n".
                "?????a ch???: ".$addGv->getDiaChi()."\n".
                "Tr??nh ?????: ".$addGv->getTrinhDo()."\n".
                "L????ng: ".$addGv->tinhLuong($addGv->getTrinhDo());
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
    <title>Qu???n l?? Ng?????i</title>
</head>
<body>
    <form action="" method="post">
        <table style="margin: auto; text-align: center;  border: 1px solid white; background: #ccc">
            <tr style="color:white; background:blue">
                <th colspan="4">
                    <h1 style="text-align: center;  border: 1px solid white; ">QU???N L?? NG?????I</h1>
                </th>
            </tr>
            <tr>
                <td>Ch???n ?????i t?????ng: </td>
                <td>
                    <input type="radio" name="loaiDoiTuong" value="sinh vi??n" <?php if (isset($_POST['loaiDoiTuong']) && $_POST['loaiDoiTuong'] == "sinh vi??n") echo 'checked' ?> /> Sinh vi??n
                    <input type="radio" name="loaiDoiTuong" value="gi???ng vi??n" <?php if (isset($_POST['loaiDoiTuong']) && $_POST['loaiDoiTuong'] == "gi???ng vi??n") echo 'checked' ?> /> Gi???ng vi??n
                </td>
            </tr>
            <tr>
                <td>H??? v?? t??n: </td>
                <td><input type="text" name="hoTen" style="width: 300px;" value="<?php echo (isset($_POST["hoTen"]) ? $_POST["hoTen"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Gi???i t??nh: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="nam" <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "nam") echo 'checked' ?> />Nam
                    <input type="radio" name="gioiTinh" value="n???" <?php if (isset($_POST['gioiTinh']) && $_POST['gioiTinh'] == "n???") echo 'checked' ?> />N???
                </td>
            </tr>
            <tr>
                <td>?????a ch???: </td>
                <td><input type="text" name="diaChi" style="width: 300px;" value="<?php echo (isset($_POST["diaChi"]) ? $_POST["diaChi"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Tr??nh ?????: </td>
                <td>
                    <input type="radio" name="trinhDo" value="c??? nh??n" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "c??? nh??n") echo 'checked' ?> /> C??? nh??n
                    <input type="radio" name="trinhDo" value="th???c s??" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "th???c s??") echo 'checked' ?> /> Th???c s??
                    <input type="radio" name="trinhDo" value="ti???n s??" <?php if (isset($_POST['trinhDo']) && $_POST['trinhDo'] == "ti???n s??") echo 'checked' ?> /> Ti???n s??
                </td>
            </tr>
            <tr>
                <td>L???p h???c: </td>
                <td><input type="text" name="lopHoc" style="width: 300px;" value="<?php echo (isset($_POST["lopHoc"]) ? $_POST["lopHoc"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ng??nh h???c: </td>
                <td>
                    <input type="radio" name="nganhHoc" value="c??ng ngh??? th??ng tin" <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == "c??ng ngh??? th??ng tin") echo 'checked' ?> /> CNTT
                    <input type="radio" name="nganhHoc" value="kinh t???" <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == "kinh t???") echo 'checked' ?> /> Kinh T???
                    <input type="radio" name="nganhHoc" value="ng??nh kh??c" <?php if (isset($_POST['nganhHoc']) && $_POST['nganhHoc'] == "ng??nh kh??c") echo 'checked' ?> /> Ng??nh kh??c
                </td>
            </tr>

            <tr>
                <td colspan="4" align="center"><input style="margin: auto;" type="submit" name="showInfo" value="Hi???n th??? th??ng tin"></td>
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