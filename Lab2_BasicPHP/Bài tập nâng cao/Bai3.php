<?php
echo "<br>";
echo "Bài 3:<br><br>";
echo "<table border='1px' >";
echo "<tr>";
for($i = 2; $i < 10; $i ++) {
    echo "<td>";
    for($j = 1; $j <= 10; $j ++) {
        echo "$i x $j = " . ($i * $j);
        echo "<br>";
    }
    echo "</td>";
}
echo "</tr>";
echo "</table>";
?>