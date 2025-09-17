<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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

            $costume_id = $_GET['costume_id'];

            $query = "SELECT * FROM `costumes` WHERE id = $costume_id";

            $result = mysqli_query($con, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                if ($row['is_available'] == "1") {
                    echo "<td>Yes</td>";
                }
                else {
                    echo "<td>No</td>";
                }
                echo "<td>" . $row['branch_id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['size'] . "</td>";
                echo "<td>" . $row['daily_rate'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>

    <a href="index.php"><-- Back</a>
</body>
</html>