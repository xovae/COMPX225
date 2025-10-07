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
            <!-- Top 10 most hired costumes -->
            <?php
                require_once("db.php");

                $query = "SELECT c.id, c.name, c.size, c.category, r.count FROM costumes AS c INNER JOIN (SELECT costume_id, COUNT(*) AS count FROM rentals GROUP BY costume_id ORDER BY count DESC) r ON c.id = r.costume_id ORDER BY r.count DESC LIMIT 10";
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
            <!-- Costume that has generated the most revenue -->
            <?php
                $query = "SELECT c.id, c.name, c.size, c.category, SUM(c.daily_rate * DATEDIFF(r.end_datetime, r.start_datetime)) AS revenue FROM costumes AS c INNER JOIN rentals AS r ON c.id = r.costume_id GROUP BY c.id ORDER BY revenue DESC LIMIT 1";

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
        <div>
            <!-- Top 3 costume categories -->
            <?php
                $query = "SELECT c.category, COUNT(*) as count FROM costumes AS c INNER JOIN rentals as r ON c.id = r.costume_id GROUP BY c.category ORDER BY count DESC LIMIT 3";

                $result = mysqli_query($con, $query);

                if ($result == false)
                {
                    echo "<h1>Could not connect to the database!</h1>";
                }
                else
                {
                    echo "<h1>Top costume categories</h1>";
                    echo "<table>";
                    echo "<th>Category</th>";
                    echo "<th># of rentals</th>";
                    echo "<tr>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['category'] . "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
        <div>
            <!-- Rentals per branch -->
            <?php
                $query = "SELECT b.id, b.name, b.location, b.email, COUNT(c.branch_id) AS count FROM costumes AS c INNER JOIN rentals AS r ON c.id = r.costume_id INNER JOIN branches AS b on c.branch_id = b.id GROUP BY b.id ORDER BY count DESC";

                $result = mysqli_query($con, $query);

                // Handle the query failing
                if ($result == false)
                {
                    echo "<h1>Could not connect to the database!</h1>";
                }
                else
                {
                    echo "<h1>Rentals per Branch</h1>";
                    echo "<table>";
                    echo "<th>Branch ID</th>";
                    echo "<th>Branch Name</th>";
                    echo "<th>Branch Location</th>";
                    echo "<th>Branch Email</th>";
                    echo "<th># of Rentals</th>";
                    echo "<tr>";
                    echo "</tr>";

                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['location'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['count'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </div>

</body>
</html>