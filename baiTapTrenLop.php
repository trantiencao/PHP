<?php
define('pi',3.141516);
$a = rand(1,4);
$b = rand(10,100);
echo "Số ngẫu nhiên a = ".$a;
echo "<br>";
echo "Số ngẫu nhiên b = ".$b;
echo "<br>";
if($a==1){
    echo "chu vi của hình vuông có cạnh ".$b." là: ".$b."x4 = ".$b*4;
    echo "<br>";
    echo "diện tích của hình vuông có cạnh ".$b." là: ".$b."<sup>2</sup> = ".pow($b,2);
}
if($a==2){
    echo "chu vi của hình tròn có bán kính ".$b." là:.2xPIx".$b." = ".(2*pi*$b);
    echo "<br>";
    echo "diện tích của hình tròn có bán kinh ".$b." là:.PIx".$b."<sup>2</sup>"." = ".(pi*pow($b,2));
}
if($a==3){
    echo "chu vi của tam giác đều có cạnh ".$b." là: ".$b."x4 = ".$b*3;
    echo "<br>";
    echo "diện tích của tam giác đều có cạnh ".$b." là: ".((pow($b,2)*sqrt(3))/4);
}
if($a==4){
    echo "chu vi của hình chữ nhật có cạnh ".$a." và ".$b." là: (".$a."+".$b.")x2 = ".($a+$b)*2;
    echo "<br>";
    echo "diện tích của hình chữ nhật có cạnh ".$a." và ".$b." là: ".$a."x".$b." = ".$a*$b;
}
?>