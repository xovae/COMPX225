<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiwi Kloset</title>

    <link rel="stylesheet" href="styles/styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body id="result">
    <div id="header">
        <h1>Kiwi Kloset</h1>

        <ul id="nav_bar">
            <li class="nav_li"><a href="index.php">Home</a></li>
            <li class="nav_li"><a href="statistics.php">Stats</a></li>
        </ul>
    </div>

    <?php
        require_once("db.php");

        $costume_id = $_GET['costume_id'];

        $query = "SELECT * FROM `rentals` WHERE costume_id = ?";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt,"i", $costume_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) === 0)
        {
            echo "<h1>There are no rentals for the provided ID!</h1>";
            mysqli_stmt_close($stmt);
        }
        else
        {
            mysqli_stmt_bind_result($stmt, $id, $start_datetime, $end_datetime, $costume_id, $customer_id);
        
            $query = "SELECT `name` FROM `costumes` WHERE id = ?";
            
            $costume_stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($costume_stmt,"i", $costume_id);
            mysqli_stmt_execute($costume_stmt);
            mysqli_stmt_bind_result($costume_stmt, $costume_name);
            mysqli_stmt_fetch($costume_stmt);
            mysqli_stmt_close($costume_stmt);

            echo "<h2>Rentals for: " . htmlspecialchars($costume_name) . "</h2>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Booking ID</th>";
            echo "<th>Start Date</th>";
            echo "<th>End Date</th>";
            echo "<th>Customer ID</th>";
            echo "</tr>";

            while (mysqli_stmt_fetch($stmt))
            {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($id) . "</td>";
                echo "<td>" . htmlspecialchars($start_datetime) . "</td>";
                echo "<td>" . htmlspecialchars($end_datetime) . "</td>";
                echo "<td>" . htmlspecialchars($customer_id) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <a href="index.php"><button><-- Back</button></a>
</body>
</html>