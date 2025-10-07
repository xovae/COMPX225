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
<body>
    <div id="header">
        <h1>Kiwi Kloset</h1>

        <ul id="nav_bar">
            <li class="nav_li"><a href="index.php">Home</a></li>
            <li class="nav_li"><a id="active" href="#">Stats</a></li>
        </ul>
    </div>

    <div id="stats">
        <div>
            <?php
                require_once("db.php");

                $query = "SELECT c.id, c.name, c.size, r.count FROM costumes AS c INNER JOIN (SELECT costume_id, COUNT(*) AS count FROM rentals GROUP BY costume_id ORDER BY count DESC) r ON c.id = r.costume_id ORDER BY r.count DESC LIMIT 10";
                $result = mysqli_query($con, $query);

                // Handle the query failing
                if ($result == false)
                {
                    echo "<h1>Could not connect to the database!</h1>";
                }
                else
                {
                    echo "<h1>Top 10 Rented Costumes</h1>";
                    echo "<table>";
                    echo "<th>Costume ID</th>";
                    echo "<th>Costume Name</th>";
                    echo "<th>Size</th>";
                    echo "<th>Count</th>";
                    echo "<tr>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['size'] . "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
        <div>
            <?php
                $query = "SELECT c.id, c.name, c.size, SUM(c.daily_rate * DATEDIFF(r.end_datetime, r.start_datetime)) AS revenue FROM costumes AS c JOIN rentals AS r ON c.id = r.costume_id GROUP BY c.id ORDER BY revenue DESC LIMIT 1";

                $result = mysqli_query($con, $query);

                // Handle the query failing
                if ($result == false)
                {
                    echo "<h1>Could not connect to the database!</h1>";
                }
                else
                {
                    echo "<h1>Top Earner Costume</h1>";
                    echo "<table>";
                    echo "<th>Costume ID</th>";
                    echo "<th>Costume Name</th>";
                    echo "<th>Size</th>";
                    echo "<th>Revenue</th>";
                    echo "<tr>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['size'] . "</td>";
                        echo "<td>" . $row['revenue'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

</body>
</html>