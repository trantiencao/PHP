<!--
Bài 4: Bài toán thao tác trên ma trận
Tạo form nhập vào 2 giá trị n, m nguyên dương.
Sau đó tạo một ma trận có các phần tử là các số ngẫu nhiên trong khoảng [-200,200].

In ra ma trận vừa mới tạo.
Đếm số phần tử có chữ số cuối là số lẻ.
Thay thế các phần tử khác 0 thành 1. In ra ma trận sau khi thay thế.

Yêu cầu:
    Sử dụng hàm, lệnh foreach và mảng hai chiều để xử lý.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4: Bài toán thao tác trên ma trận</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        body {
            text-align: center;
        }
        .a {
            width: 600px;
            margin: 0 auto;
        }
        td {
            border: 1px solid blue;
            padding: 10px;
        }
        .a tr td:first-child {
            width: 20%;
        }
        .b {
            width: 300px;
            margin: 0 auto;
        }
        
    </style>
</head>
<body>
<?php
		if(isset($_POST["m"]))
            $m = $_POST["m"];
        else $m = null;
		if(isset($_POST["n"]))
            $n = $_POST["n"];
        else $n = null;

		function TaoMT($mt,$m,$n)
		{
			$arr = array();
			for ($i = 0; $i < $m; $i++)
				for ($j = 0; $j < $n; $j++)
					$mt[$i][$j] = rand(-200,200);
			$arr = $mt;
			return $arr;			
		}

		function XuatMT($mt,$m,$n)
		{
			$arr = "<table class='b' style='text-align:center;' bgcolor='lightblue'>";
			for ($i = 0; $i < $m; $i++)
			{
				$arr = $arr."<tr>";
				for ($j = 0; $j < $n; $j++)
					$arr = $arr."<td style='border:1px solid white;'>".$mt[$i][$j]."</td>";
				$arr = $arr."</tr>";
			}
			$arr = $arr."</table>";
			return $arr;
		}

        function SoPhanTuCoSoCuoiLe($mt,$m,$n){
            $dem = 0;
            for ($i = 0; $i < $m; $i++)
				for ($j = 0; $j < $n; $j++){
                    $matrix = "";
                    $doDai = strlen($mt[$i][$j]);
                    $matrix .= $mt[$i][$j];
                    if($matrix[$doDai-1] % 2 != 0)
                        $dem++;
                }
            return $dem;
        }
        

		$arr = array();
        $matrix = "";
		if (isset($_POST["xuly"]))
		{
			if(!is_numeric($m) || $m < 2)
				echo "<script>alert('Phải nhập vào m >= 2')</script>";		
			else
			if(!is_numeric($n) || $n > 10 || $n <= 0)
				echo "<script>alert('Phải nhập vào n là số nguyên dương và <= 10')</script>";		
			else
			{
				$arr = TaoMT($arr,$m,$n);
				$matrix = XuatMT($arr,$m,$n);
                $soPhanTuCuoiLe = SoPhanTuCoSoCuoiLe($arr,$m,$n);
			}				
		}
	?>

	<form action="" method="POST">
	    <table border="0" class="a">
            <tr>
                <td colspan="2" bgcolor="blue" style="color:white; text-align:center;">TẠO MA TRẬN NGẪU NHIÊN</td>
            </tr>
            <tr>
                <td>Nhập số hàng: </td>
                <td><input type="text" name="m" value="<?php echo $m;?>"/></td>
            </tr>
            <tr>
                <td>Nhập số cột: </td>
                <td><input type="text" name="n" value="<?php echo $n;?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Tạo ma trận" name="xuly"/></td>
            </tr>
            <tr>
                <td>Ma trận vừa tạo:</td>
                <td><?php if(isset($_POST["xuly"])) echo $matrix; ?></td>
            </tr>
            <tr>
                <td>Số phần tử có số cuối lẻ là:</td>
                <td><?php if(isset($_POST["xuly"])) echo $soPhanTuCuoiLe; ?></td>
            </tr>
		</table>
	</form>
</body>
</html>