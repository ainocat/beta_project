<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>test connect</title>
<?php
$servername="localhost";
$username="root";
$password="lasertec";

try{
    $conn=new PDO("mysql:host=$servername;",$username,$password);
    echo "connect successful";
}catch(PDOException $e){
    echo $e->getMessage();
}
?>

</head>

<body>

</body>
</html>
