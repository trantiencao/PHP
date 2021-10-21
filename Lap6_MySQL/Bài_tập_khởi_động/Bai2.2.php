<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Thong tin hang sua</title>
</head>

<body>
	<?php

	// Phan trang
	$rowsPerPage = 2; //số mẩu tin trên mỗi trang
	if (!isset($_GET['page'])) {
		$_GET['page'] = 1;
	}
	$offset = ($_GET['page'] - 1) * $rowsPerPage; //vị trí của mẩu tin đầu tiên trên mỗi trang

	// Ket noi CSDL
	require("connect.php");
	//lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
	$strSQL = 'SELECT * FROM hang_sua LIMIT ' . $offset . ', ' . $rowsPerPage;
	$result = mysqli_query($dbc, $strSQL);

	// Xu ly du lieu tra ve
	if (mysqli_num_rows($result) == 0) {
		echo "Chưa có dữ liệu";
	} else {
		echo "<h1 style='color: blue;' align='center'>THÔNG TIN HÃNG SỮA</h1>
		  <table align='center' width='800' border='1' cellpadding='2' cellspacing='2' 
				style='border-collapse: collapse;'>
		  	<tr style='background-color: #0084ab;' align='center'>
				<td><b>Mã HS</b></td>
				<td><b>Tên hãng sữa</b></td>
				<td><b>Địa chỉ</b></td>
				<td><b>Điện thoại</b></td>
				<td><b>Email</b></td>
		  	</tr>";
		$stt = 1;
		while ($row = mysqli_fetch_row($result)) {
			if ($stt % 2 != 0) {
				echo "<tr>";
				for ($i = 0; $i < count($row); $i++) {
					echo "<td>$row[$i]</td>";
				}
				echo "</tr>";
			} else {
				echo "<tr style='background-color: #ffb1007a;'>";
				for ($i = 0; $i < count($row); $i++) {
					echo "<td>$row[$i]</td>";
				}
				echo "</tr>";
			}
			$stt += 1;
		}
		echo '</table>';

		$re = mysqli_query($dbc, 'SELECT * FROM hang_sua');
		//tổng số mẩu tin cần hiển thị
		$numRows = mysqli_num_rows($re);
		//tổng số trang
		$maxPage = floor($numRows / $rowsPerPage) + 1;
		echo '<p style="align-items: center; text-align: center;">';
		//tạo link tương ứng tới các trang
		for ($i = 1; $i <= $maxPage; $i++) {
			if ($i == $_GET['page']) echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
			else echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
		}
		echo '</p>';
	}
	//Dong ket noi
	mysqli_close($dbc);
	?>
</body>

</html>