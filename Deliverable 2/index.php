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
            };
        ?>
    </table>

    <form action="rentals.php" method="GET">
        <label for="costume_id">Costume ID</label>
        <input type="number" name="costume_id" id="costume_id" placeholder="Costume ID" required>
    </form>

    <form action="add.php" method="POST">
        <label for="new_id">Costume ID</label>
        <input type="number" name="new_costume_id" id="new_costume_id" required>
        <!-- Maybe just default to 1? And see if ID can be autoset too -->
        <label for="is_available">Is Available</label>
        <input type="number" name="is_available" id="is_available" required>
        <label for="branch_id">Branch ID</label>
        <input type="number" name="branch_id" id="branch_id" required>
        <label for="costume_name">Name</label>
        <input type="text" name="costume_name" id="costume_name" required>
        <label for="size">Size</label>
        <input type="text" name="size" id="size" required>
        <label for="daily_rate">Daily Rate</label>
        <input type="number" name="daily_rate" id="daily_rate" required>
        <!-- Maybe a dropdown? -->
        <label for="category">Category</label>
        <input type="text" name="category" id="category" required>
    </form>

    <!-- form that takes a costume id, sends a GET to rentals.php -->

    <!-- form that takes new costume info, sends a POST to add.php -->
</body>
</html>