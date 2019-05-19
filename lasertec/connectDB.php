<?php
//establish connection with PDO
$dbms="mysql";
$host="localhost";
$dbName="ch13";
$username="root";
$password="lasertec";
$dsn="$dbms:host=$host;dbname=$dbName";

try{
    $conn=new PDO($dsn,$username,$password);
}catch(PDOException $e){
    echo $e->getMessage();
}
?>
