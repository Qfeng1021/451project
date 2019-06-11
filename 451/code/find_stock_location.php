<?php
include('connectionDataMarket.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>
    <title>Find location</title>
    </head>
    <body bgcolor="white">

    <hr>

<?php

$name = $_POST['name'];

$name = mysqli_real_escape_string($conn, $name);

$query = "SELECT s.stock_id, s.stock_num, i.item_name, c.location
FROM stock s join items i on s.stock_id=i.stock_id join classification c on s.classification_id=c.class_id
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
    print("stock_id, stock_num, item_name, location");
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        print "\n";
        print "$row[stock_id]       $row[stock_num]        $row[item_name]       $row[location]";
    }
    print "</pre>";

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
        <p>
        <hr>
    <p>
        <a href = "find_stock_location.txt" >Contents</a>
        of the PHP program that create this page.


    </p>
    </body>
</html>







