<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>test connect</title>
<?php
//connect to DB. Use the global variance.
global $conn;
include 'connectDB.php';
//search data with keyword like "%__".
/*$keyword='IR';
$sth=$conn->prepare('SELECT * 
                    from parts
                    where number like "%' . $keyword .'%"');
$sth->execute();
*/
?>

</head>

<body>

<!--
data transfer
-->
<form action="" method="post">
    <input name="keyword" id="keyword" type="test" value="KeyWords" onclick="this.value=''" />

<input type="submit" value='search' />

</form>
<?php
//search data with keyword like "%__".
//$keyword='IR';
//@:mean this sentance will not threaght the warning.
@$keyword=trim($_POST['keyword']);
$sth=$conn->prepare('SELECT * 
                    from parts
                    where number like "%' . $keyword .'%" 
                    or name like "%' . $keyword . '%"');
$sth->execute();
?>

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