<?php
include('connectionDataMarket.txt');

$conn = mysqli_connect($server, $user, $pass, $dbname, $port)
or die("Error connecting to MySQL server.");

?>

<html>
<head>
    <title>Check membership</title>
    </head>
    <body bgcolor="white">

    <hr>

<?php

$name = $_POST['name'];

$name = mysqli_real_escape_string($conn, $name);

$query = "SELECT c.customer_id, c.fname, c.lname, i.item_name, o.total_price, m.mem_discount_status
    from customer c join orders o on c.customer_id=o.customer_id join items i on o.item_id=i.item_num join membership m on m.mem_card_id = c.membership_mem_card_id
WHERE c.customer_id = ";
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
    print("customer_id, fname, lname, item_name, total_price, mem_discount_status");
    while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
    {
        print "\n";
        print "$row[customer_id]        $row[fname]    $row[lname]   $row[item_name]   $row[total_price]        $row[mem_discount_status]";
    }
    print "</pre>";

    mysqli_free_result($result);
    mysqli_close($conn);
    ?>
        <p>
        <hr>
    <p>
        <a href = "check_memship.txt" >Contents</a>
        of the PHP program that create this page.


    </p>
    </body>
</html>







