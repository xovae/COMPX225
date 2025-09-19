<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiwi Kloset</title>

    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300..700&display=swap" rel="stylesheet">
</head>
<body id="result">
    <div id="header">
        <h1>Kiwi Kloset</h1>
    </div>

    <?php
        require_once("db.php");

        $costume_id = $_GET['costume_id'];

        $query = "SELECT * FROM `rentals` WHERE costume_id = $costume_id";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0)
        {
            echo "<h1>There are no rentals for the provided ID!</h1>";
        }
        else
        {
            $query = "SELECT `name` FROM `costumes` WHERE id = $costume_id";

            $costume_name = mysqli_fetch_assoc(mysqli_query($con, $query));

            echo "<h2>Rentals for: " . $costume_name['name'] . "</h2>";

            echo "<table>";
            echo "<tr>";
            echo "<th>Booking ID</th>";
            echo "<th>Start Date</th>";
            echo "<th>End Date</th>";
            echo "<th>Customer ID</th>";
            echo "</tr>";

            while ($row = mysqli_fetch_assoc($result))
            {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['start_datetime'] . "</td>";
                echo "<td>" . $row['end_datetime'] . "</td>";
                echo "<td>" . $row['customer_id'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>

    <a href="index.php"><button><-- Back</button></a>
</body>
</html>