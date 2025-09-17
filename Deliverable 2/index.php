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
<body>
    <div id="header">
        <p>Kiwi Closet</p>
    </div>

    <div id="body">
        <!-- instructions -->

        <!-- Table of all Costumes in the MySQL Database -->
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

                while ($row = mysqli_fetch_assoc($result))
                {
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

        <h1>Get Costume By ID</h1>

        <form action="rentals.php" method="GET">
            <div>
                <label for="costume_id">Costume ID</label>
                <input type="number" name="costume_id" id="costume_id" placeholder="Costume ID" min="0" required>
            </div>

            <div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>

        <h1>Add Costume</h1>

        <form action="add.php" method="POST">
            <div>
                <label for="new_costume_id">Costume ID</label>
                <input type="number" name="new_costume_id" id="new_costume_id" required>

                <!-- Maybe just default to 1? And see if ID can be autoset too -->
                <label for="is_available">Is Available</label>
                <select name="is_available" id="is_available" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>

                <label for="branch_id">Branch ID</label>
                <input type="number" name="branch_id" id="branch_id" min="0" required>

                <label for="costume_name">Name</label>
                <input type="text" name="costume_name" id="costume_name" required>

                <label for="size">Size</label>
                <select name="size" id="size" required>
                    <option value="Mens Extra Small">Mens Small</option>
                    <option value="Mens Small">Mens Small</option>
                    <option value="Mens Medium">Mens Medium</option>
                    <option value="Mens Large">Mens Large</option>
                    <option value="Mens Extra Large">Mens Extra Large</option>
                    <option value="Womans Extra Small">Womans Extra Small</option>
                    <option value="Womans Small">Womans Small</option>
                    <option value="Womans Medium">Womans Medium</option>
                    <option value="Womans Large">Womans Large</option>
                    <option value="Womans Extra Large">Womans Extra Large</option>
                    <option value="Standard">Standard</option>
                </select>

                <label for="daily_rate">Daily Rate</label>
                <input type="number" name="daily_rate" id="daily_rate" step="0.01" min="0" required>

                <!-- Maybe a dropdown? -->
                <label for="category">Category</label>
                <input type="text" name="category" id="category" required>
            </div>

            <div>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>