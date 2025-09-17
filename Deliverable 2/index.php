<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiwi Kloset</title>
</head>
<body>
    <!-- navbar w/ logo? -->
    <h1>Kiwi Kloset</h1>

    <!-- instructions -->

    <!-- table of all costumes -->
    <table>
        <tr>
            <th>ID</th>
            <th>Is Available</th> <!-- Make it so 0 and 1 are formatted to y/n? -->
            <th>Branch ID</th>
            <th>Name</th>
            <th>Size</th>
            <th>Daily Rate</th>
            <th>Category</th>
        </tr>

        <?php
            require_once("db.php");

            $query = "SELECT * FROM `costumes`";
            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['is_available'] . "</td>";
                echo "<td>" . $row['branch_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['size'] . "</td>";
                echo "<td>" . $row['daily_rate'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "</tr>";
            };
        ?>

    </table>

    <!-- form that takes a costume id, sends a GET to rentals.php -->

    <!-- form that takes new costume info, sends a POST to add.php -->
</body>
</html>