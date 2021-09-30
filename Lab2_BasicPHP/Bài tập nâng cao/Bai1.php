
<?php
echo "<p>Bài 1:</p>";
$n = rand(10,1000);
$str_snt = "";
echo "Số ngẫu nhiên là: $n <br><br>";
{
    for($i=$n-1;$i>1;$i--){
        $count = 0;
        if($i < 2){
            return 0;
        }
        for($j = 2; $j<= sqrt($i); $j++)
        {
            if($i % $j == 0){
                $count++;
            }
        }
        if($count == 0){
            $len = 0;
            $tem = 1;
            while ($tem <= $i) {
                $len++;
                $tem *= 10;
            }

            
            $k = $i;
            $k = abs($k); //lay tri tuyet do cua so nguyen k
            $max = 0; //dung de luu chu so lon nhat
            //dung vong lap lay ra tung chu so theo: hàng don vi, hang chuc, hang tram
            while ($k > 0) {
                $temp = $k % 10;
                $k /= 10;
                if ($temp > $max)
                    $max = $temp;
            }
            $str_snt .= "  ".$i." - có $len chữ số - có chữ số lớn nhất là $max <br>";
        }
        else {
            $str_snt .= "";
        }
    }
    echo "Các số nguyên nhỏ hơn $n là: <br>".$str_snt;
}
?>