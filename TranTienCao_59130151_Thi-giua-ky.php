<?php
abstract class Nguoi {
    protected $maSo, $hoTen, $ngaySinh, $gioiTinh;

    /**
     * Get the value of maSo
     */ 
    public function getMaSo()
    {
        return $this->maSo;
    }

    /**
     * Set the value of maSo
     *
     * @return  self
     */ 
    public function setMaSo($maSo)
    {
        $this->maSo = $maSo;

        return $this;
    }

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
     * Get the value of ngaySinh
     */ 
    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }

    /**
     * Set the value of ngaySinh
     *
     * @return  self
     */ 
    public function setNgaySinh($ngaySinh)
    {
        $this->ngaySinh = $ngaySinh;

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

    public function tuoi(){
        $namSinh = explode("/", $this->ngaySinh);
        return (int)date("Y") - (int)$namSinh[0];
    }
    

    abstract protected function tinhThuong();
}

class NhanVienVanPhong extends Nguoi {
    private const luongCoBan = 1500000;
    private $soNamCongTac;

    /**
     * Get the value of soNamCongTac
     */ 
    public function getSoNamCongTac()
    {
        return $this->soNamCongTac;
    }

    /**
     * Set the value of soNamCongTac
     *
     * @return  self
     */ 
    public function setSoNamCongTac($soNamCongTac)
    {
        $this->soNamCongTac = $soNamCongTac;

        return $this;
    }

    public function tinhThuong() {
        if ($this->tuoi() >= 22 && $this->tuoi() <=25) {
            return self::luongCoBan*$this->soNamCongTac*1.1;
        } elseif ($this->tuoi() >= 26 && $this->tuoi() <=30) {
            return self::luongCoBan*$this->soNamCongTac*1.2;
        } elseif ($this->tuoi() > 30) return self::luongCoBan*$this->soNamCongTac;
    }
}
class NhanVienPhucVu extends Nguoi {
    private $chucVu, $soNgayCong;

    /**
     * Get the value of chucVu
     */ 
    public function getChucVu()
    {
        return $this->chucVu;
    }

    /**
     * Set the value of chucVu
     *
     * @return  self
     */ 
    public function setChucVu($chucVu)
    {
        $this->chucVu = $chucVu;

        return $this;
    }

    /**
     * Get the value of soNgayCong
     */ 
    public function getSoNgayCong()
    {
        return $this->soNgayCong;
    }

    /**
     * Set the value of soNgayCong
     *
     * @return  self
     */ 
    public function setSoNgayCong($soNgayCong)
    {
        $this->soNgayCong = $soNgayCong;

        return $this;
    }
    
    public function tinhThuong() {
        if ($this->soNgayCong >= 28 && $this->soNgayCong <=30) {
            return 50000;
        } elseif ($this->soNgayCong <28) return 40000;
    }
}

$info = null;
if (isset($_POST["tinhThuong"])) {
    switch ($loaiDoiTuong = $_POST["loaiDoiTuong"]) {
        case "nhân viên văn phòng": {
                $nvvp = new NhanVienVanPhong();
                $nvvp->setMaSo($_POST["maSo"]);
                $nvvp->setHoTen($_POST["hoTen"]);
                $nvvp->setNgaySinh($_POST["ngaySinh"]);
                $nvvp->setGioiTinh($_POST["gioiTinh"]);
                $nvvp->setSoNamCongTac($_POST["soNamCongTac"]);

                $info .= "Mã số: ".$nvvp->getMaSo()."\n".
                "Họ tên: ".$nvvp->getHoTen()."\n".
                "Ngày sinh: ".$nvvp->getNgaySinh()."\n".
                "Giới tính: ".$nvvp->getGioiTinh()."\n".
                "Số năm công tác: ".$nvvp->getSoNamCongTac()."\n".
                "Tiền thưởng: ".$nvvp->tinhThuong();
            }
            break;
        case "nhân viên phục vụ": {
                $nvpv = new NhanVienPhucVu();
                $nvpv->setMaSo($_POST["maSo"]);
                $nvpv->setHoTen($_POST["hoTen"]);
                $nvpv->setNgaySinh($_POST["ngaySinh"]);
                $nvpv->setGioiTinh($_POST["gioiTinh"]);
                $nvpv->setChucVu($_POST["chucVu"]);
                $nvpv->setSoNgayCong($_POST["soNgayCong"]);

                $info .= "Mã số: ".$nvpv->getMaSo()."\n".
                "Họ tên: ".$nvpv->getHoTen()."\n".
                "Ngày sinh: ".$nvpv->getNgaySinh()."\n".
                "Giới tính: ".$nvpv->getGioiTinh()."\n".
                "Chức vụ: ".$nvpv->getChucVu()."\n".
                "Số ngày công: ".$nvpv->getSoNgayCong()."\n".
                "Tiền thưởng: ".$nvpv->tinhThuong();
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
    <title>Quản lý Nhân Viên</title>
</head>
<body>
    <form action="" method="post">
        <table style="margin: auto; text-align: center;  border: 1px solid white; background: #ccc">
            <tr style="color:white; background:blue">
                <th colspan="4">
                    <h1 style="text-align: center;  border: 1px solid white; ">QUẢN LÝ NHÂN VIÊN</h1>
                </th>
            </tr>
            <tr>
                <td>Chọn loại nhân viên: </td>
                <td>
                    <input type="radio" name="loaiDoiTuong" value="nhân viên văn phòng" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "nhân viên văn phòng") echo 'checked' ?> /> nhân viên văn phòng
                    <input type="radio" name="loaiDoiTuong" value="nhân viên phục vụ" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "nhân viên phục vụ") echo 'checked' ?> /> nhân viên phục vụ
                </td>
            </tr>
            <tr>
                <td>Mã số: </td>
                <td><input type="text" name="maSo" style="width: 300px;" value="<?php echo (isset($_POST["maSo"]) ? $_POST["maSo"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Họ và tên: </td>
                <td><input type="text" name="hoTen" style="width: 300px;" value="<?php echo (isset($_POST["hoTen"]) ? $_POST["hoTen"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ngày sinh: </td>
                <td><input type="date" name="ngaySinh" style="width: 300px;" value="<?php echo (isset($_POST["ngaySinh"]) ? $_POST["ngaySinh"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Giới tính: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="nam" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nam") echo 'checked' ?> />Nam
                    <input type="radio" name="gioiTinh" value="nữ" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nữ") echo 'checked' ?> />Nữ
                </td>
            </tr>
            <tr>
                <td>Số năm công tác: </td>
                <td><input type="text" name="soNamCongTac" style="width: 300px;" value="<?php echo (isset($_POST["soNamCongTac"]) ? $_POST["soNamCongTac"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Chức vụ: </td>
                <td><input type="text" name="chucVu" style="width: 300px;" value="<?php echo (isset($_POST["chucVu"]) ? $_POST["chucVu"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Số ngày công: </td>
                <td><input type="text" name="soNgayCong" style="width: 300px;" value="<?php echo (isset($_POST["soNgayCong"]) ? $_POST["soNgayCong"] : "") ?>"></td>
            </tr>

            <tr>
                <td colspan="4" align="center"><input style="margin: auto;" type="submit" name="tinhThuong" value="Hiện thông tin"></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                <textarea name="comment" disabled rows="8" cols="30"><?php if(isset($_POST['tinhThuong'])) echo $info; ?></textarea>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>