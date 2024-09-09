<?php
include 'config.php';


$query = "SELECT customers.CustomerId, customers.CustomerName, shippers.ShipperName FROM customers INNER JOIN shippers ON customers.CustomerId = shippers.ShipperId";
if ($result = $conn->query($query)) {
    echo "INNER JOIN Results:<br> <br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['CustomerId'] . " | " . $row['CustomerName'] . " | " . $row['ShipperName'] . "<br>";
        }
        echo "<br>";
    }
    else {
            echo "Error: " . $conn->error;
}


$leftJoin = "SELECT customers.CustomerId, customers.CustomerName, shippers.ShipperName FROM customers LEFT JOIN shippers ON customers.CustomerId = shippers.ShipperId";

if ($result = $conn->query($leftJoin)) {
    echo "LEFT JOIN Results:<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['CustomerId'] . " | " . $row['CustomerName'] . " | " . $row['ShipperName'] . "<br>";
        }
    echo "<br>";
    }
    else {
         echo "Error: " . $conn->error;
}



$rightJoin = "SELECT customers.CustomerId, customers.CustomerName, shippers.ShipperName FROM customers RIGHT JOIN shippers ON customers.CustomerId = shippers.ShipperId";
if ($result = $conn->query($rightJoin)) {
    echo "LEFT JOIN Results:<br><br>";
    while ($row = $result->fetch_assoc()) {
        echo $row['CustomerId'] . " | " . $row['CustomerName'] . " | " . $row['ShipperName'] . "<br>";
        }
        echo "<br>";
    }
    else {
        echo "Error: " . $conn->error;
}


$selfJoin = "SELECT c1.CustomerId AS Customer1, c2.CustomerId AS Customer2 FROM customers c1, customers c2 WHERE c1.City = c2.City";

if ($result = $conn->query($selfJoin)) {
    echo "SELF JOIN Results:<br><br>";
    while ($row = $result->fetch_assoc()) {
    echo $row['Customer1'] . " | " . $row['Customer2'] . "<br>";
        }
    echo "<br>";
    } 
    else {
        echo "Error: " . $conn->error;
}

$crossJoin = "SELECT customers.CustomerName, shippers.ShipperName FROM customers CROSS JOIN shippers";

if ($crossResult = $conn->query($crossJoin)) {
    echo "<br>CROSS JOIN Results:<br> <br>";
    while ($row = $crossResult->fetch_assoc()) {
        echo $row['CustomerName'] . " | " . $row['ShipperName'] . "<br>";
        }
    echo "<br>";
    }
    else {
        echo "Error: " . $conn->error;
}
?>
