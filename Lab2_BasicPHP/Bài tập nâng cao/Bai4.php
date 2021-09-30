<?php
echo "<br>";
echo "Bài 4:";
$m = rand(2,5);
$n = rand(2,5);
echo"<br><br>";
echo "Ma tran ngau nhien duoc tao la $m x $n <br>";
for($i = 0; $i< $m; $i++){
    $a2[] = array();
    for($j = 0; $j <$n; $j++){ 
        $a2[$i][] = rand(-100,100);
    }
}
echo "<table border='1px' >";
for($hang = 0; $hang < $m; $hang++){
    echo "<tr>";
    
    for($cot = 0; $cot <$n; $cot++){
        echo "<td>";
        echo $a2[$hang][$cot];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>