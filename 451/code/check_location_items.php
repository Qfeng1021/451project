<?php
include('connectionDataMarket.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>
    <title>Check items in location</title>
    </head>
    <body bgcolor="white">

    <hr>

<?php

$name = $_POST['name'];

$name = mysqli_real_escape_string($conn, $name);

$query = "SELECT c.location, i.item_name, co.company_name, s.stock_num
from classification c join items i on c.class_id=i.class_id join company co on co.company_id=i.company_id join stock s on i.stock_id=s.stock_id
WHERE c.location =  ";
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
    print("location, item_name, company_name, stock_num");
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        print "\n";
        print "$row[location]         $row[item_name]      $row[stock_num]     $row[company_name]   $row[stock_num]";
    }
    print "</pre>";

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
        <p>
        <hr>
    <p>
        <a href = "check_location_items.txt" >Contents</a>
        of the PHP program that create this page.


    </p>
    </body>
</html>







