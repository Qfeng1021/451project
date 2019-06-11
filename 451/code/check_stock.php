<?php
include('connectionDataMarket.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>
    <title>Check Stock</title>
    </head>
    <body bgcolor="white">

    <hr>

<?php

$name = $_POST['name'];

$name = mysqli_real_escape_string($conn, $name);

$query = "SELECT i.item_name, s.stock_num
FROM stock s join items i on s.stock_id=i.item_num
WHERE i.item_name = ";
$query = $query."'".$name."'";
    
?>

    <p>
        The query:
    <p>
    <?php
    print $query;
    ?>

    <hr>
    <p>
        Result of query:
        <p>

    <?php
    $result = mysqli_query($conn, $query)
    or die(mysqli_error($conn));

    print("<pre>");
    print("item_name, stock_name");
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        print "\n";
        print "$row[item_name]   $row[stock_num]";
    }
    print "</pre>";

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
        <p>
        <hr>
    <p>
        <a href = "check_stock.txt" >Contents</a>
        of the PHP program that create this page.


    </p>
    </body>
</html>







