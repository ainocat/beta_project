<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>test connect</title>
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
    //echo "connect successful";
    //read all data wit foreach
    /*
    $result=$conn->query('SELECT * from parts');
    foreach($result as $row){
        print_r($row[0]);
        echo "<br />";
    }
    */
    //use prepare method if sql is wrong, will catch error.
    //the benefit of prepare is format or multi var. 
    $sth = $conn->prepare('SELECT * from parts');
    $sth->execute();
    //give fetch style.
    /*
    while($result=$sth->fetch(PDO::FETCH_NUM))
    {
        foreach($result as $row)
        {
            print_r($row);
            echo "  ";
            }//end foreach
        echo "<br />";
        }//end while

    $conn=null;
    */
}catch(PDOException $e){
    echo $e->getMessage();
}
?>

</head>

<body>
<table border="1" cellspacing="1" cellpadding="1">
    <tr>
        <th width="200" scope="col">Part Number</th>
        <th width="200" scope="col">Name</th>
        <th width="50" scope="col">SH</th>
        <th width="50" scope="col">NJ</th>
        <th width="50" scope="col">WX</th>
        <th width="50" scope="col">Total</th>
    </tr>
    <?php
        while($result=$sth->fetch(PDO::FETCH_NUM))
        {
    ?>
    <tr>
    <?php
            foreach($result as $row)
            {
    ?>
        <td>&nbsp;<?php echo $row; ?></td>
    <?php
            }//end foreach
        }//end while
    ?>
    </tr>

</table>

</body>
</html>
<?php
    
    $conn=null;
?>
