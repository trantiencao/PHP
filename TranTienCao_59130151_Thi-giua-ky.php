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
            return 50000*$this->soNgayCong;
        } elseif ($this->soNgayCong <28) return 40000*$this->soNgayCong;
    }
}

$info = null;
if (isset($_POST["tinhThuong"])) {
    switch ($loaiDoiTuong = $_POST["loaiDoiTuong"]) {
        case "nh??n vi??n v??n ph??ng": {
                $nvvp = new NhanVienVanPhong();
                $nvvp->setMaSo($_POST["maSo"]);
                $nvvp->setHoTen($_POST["hoTen"]);
                $nvvp->setNgaySinh($_POST["ngaySinh"]);
                $nvvp->setGioiTinh($_POST["gioiTinh"]);
                $nvvp->setSoNamCongTac($_POST["soNamCongTac"]);

                $info .= "M?? s???: ".$nvvp->getMaSo()."\n".
                "H??? t??n: ".$nvvp->getHoTen()."\n".
                "Ng??y sinh: ".$nvvp->getNgaySinh()."\n".
                "Gi???i t??nh: ".$nvvp->getGioiTinh()."\n".
                "S??? n??m c??ng t??c: ".$nvvp->getSoNamCongTac()."\n".
                "Ti???n th?????ng: ".$nvvp->tinhThuong();
            }
            break;
        case "nh??n vi??n ph???c v???": {
                $nvpv = new NhanVienPhucVu();
                $nvpv->setMaSo($_POST["maSo"]);
                $nvpv->setHoTen($_POST["hoTen"]);
                $nvpv->setNgaySinh($_POST["ngaySinh"]);
                $nvpv->setGioiTinh($_POST["gioiTinh"]);
                $nvpv->setChucVu($_POST["chucVu"]);
                $nvpv->setSoNgayCong($_POST["soNgayCong"]);

                $info .= "M?? s???: ".$nvpv->getMaSo()."\n".
                "H??? t??n: ".$nvpv->getHoTen()."\n".
                "Ng??y sinh: ".$nvpv->getNgaySinh()."\n".
                "Gi???i t??nh: ".$nvpv->getGioiTinh()."\n".
                "Ch???c v???: ".$nvpv->getChucVu()."\n".
                "S??? ng??y c??ng: ".$nvpv->getSoNgayCong()."\n".
                "Ti???n th?????ng: ".$nvpv->tinhThuong();
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
    <title>Qu???n l?? Nh??n Vi??n</title>
</head>
<body>
    <form action="" method="post">
        <table style="margin: auto; text-align: center;  border: 1px solid white; background: #ccc">
            <tr style="color:white; background:blue">
                <th colspan="4">
                    <h1 style="text-align: center;  border: 1px solid white; ">QU???N L?? NH??N VI??N</h1>
                </th>
            </tr>
            <tr>
                <td>Ch???n lo???i nh??n vi??n: </td>
                <td>
                    <input type="radio" name="loaiDoiTuong" value="nh??n vi??n v??n ph??ng" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "nh??n vi??n v??n ph??ng") echo 'checked' ?> /> nh??n vi??n v??n ph??ng
                    <input type="radio" name="loaiDoiTuong" value="nh??n vi??n ph???c v???" <?php if (isset($_POST['loaiDoiTuong']) && ($_POST['loaiDoiTuong']) == "nh??n vi??n ph???c v???") echo 'checked' ?> /> nh??n vi??n ph???c v???
                </td>
            </tr>
            <tr>
                <td>M?? s???: </td>
                <td><input type="text" name="maSo" style="width: 300px;" value="<?php echo (isset($_POST["maSo"]) ? $_POST["maSo"] : "") ?>"></td>
            </tr>
            <tr>
                <td>H??? v?? t??n: </td>
                <td><input type="text" name="hoTen" style="width: 300px;" value="<?php echo (isset($_POST["hoTen"]) ? $_POST["hoTen"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ng??y sinh: </td>
                <td><input type="date" name="ngaySinh" style="width: 300px;" value="<?php echo (isset($_POST["ngaySinh"]) ? $_POST["ngaySinh"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Gi???i t??nh: </td>
                <td>
                    <input type="radio" name="gioiTinh" value="nam" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "nam") echo 'checked' ?> />Nam
                    <input type="radio" name="gioiTinh" value="n???" <?php if (isset($_POST['gioiTinh']) && ($_POST['gioiTinh']) == "n???") echo 'checked' ?> />N???
                </td>
            </tr>
            <tr>
                <td>S??? n??m c??ng t??c: </td>
                <td><input type="text" name="soNamCongTac" style="width: 300px;" value="<?php echo (isset($_POST["soNamCongTac"]) ? $_POST["soNamCongTac"] : "") ?>"></td>
            </tr>
            <tr>
                <td>Ch???c v???: </td>
                <td><input type="text" name="chucVu" style="width: 300px;" value="<?php echo (isset($_POST["chucVu"]) ? $_POST["chucVu"] : "") ?>"></td>
            </tr>
            <tr>
                <td>S??? ng??y c??ng: </td>
                <td><input type="text" name="soNgayCong" style="width: 300px;" value="<?php echo (isset($_POST["soNgayCong"]) ? $_POST["soNgayCong"] : "") ?>"></td>
            </tr>

            <tr>
                <td colspan="4" align="center"><input style="margin: auto;" type="submit" name="tinhThuong" value="Hi???n th??ng tin"></td>
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