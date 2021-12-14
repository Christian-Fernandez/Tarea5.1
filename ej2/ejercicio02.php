<?php
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];

if(!isset($num1) || !isset($num2) || !is_numeric($num1) || !is_numeric($num2) ){
    echo "ERROR:Introduce un número.";
}else{
    echo "La suma de los números es de: " . ($num1+$num2);
}
