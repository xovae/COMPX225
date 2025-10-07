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
            <li class="nav_li"><a id="active" href="#">Home</a></li>
            <li class="nav_li"><a href="statistics.php">Stats</a></li>
        </ul>
    </div>

    <div id="body">
        <div>
            <!-- Table of all Costumes in the MySQL Database -->
            <h2>All Costumes</h2>

            <?php
                require_once("db.php");

                $query = "SELECT * FROM `costumes`";
                $result = mysqli_query($con, $query);

                // Handle the query failing
                if ($result == false)
                {
                    echo "<p>Could not connect to the database!</p>";
                }
                else
                {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>ID</th>";
                    echo "<th>Is Available</th>";
                    echo "<th>Branch ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>Size</th>";
                    echo "<th>Daily Rate</th>";
                    echo "<th>Category</th>";
                    echo "</tr>";
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
                    }
                    echo "</table>";
                }
            ?>
        </div>
        <div>
            <h2>Instructions</h2>
            <p>Welcome Kiwi Kloset Employee! To your left is a table of all costumes across all Kiwi Kloset branches.<br><br>Below are forms to <strong>Get all rentals for a specific costume ID</strong>, and <strong>Add a new costume</strong>.</p>

            <!-- Form to query the MySQL DB for any rentals for the given costume ID -->
            <h2>Search Rentals By Costume ID</h2>

            <form action="rentals.php" method="GET" class="form_centre">
                <label for="costume_id">Costume ID</label>
                <input type="number" name="costume_id" id="costume_id" placeholder="Costume ID" min="0" required>
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </form>

            <!-- Form to add a new costume to the MySQL DB -->
            <h2>Add Costume</h2>

            <form id="add" action="add.php" method="POST" class="form_centre">

                <div class="form_row">
                    <label for="new_costume_id">Costume ID</label>
                    <input type="number" name="new_costume_id" id="new_costume_id" placeholder="New Costume ID" min="0" required>

                    <label for="is_available">Is Available</label>
                    <select name="is_available" id="is_available" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                    <label for="branch_id">Branch ID</label>
                    <input type="number" name="branch_id" id="branch_id" placeholder="Branch ID" min="0" required>

                    <label for="costume_name">Name</label>
                    <input type="text" name="costume_name" id="costume_name" placeholder="Costume Name" required>
                </div>

                <div class="form_row">
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
                    <input type="number" name="daily_rate" id="daily_rate" placeholder="Daily Rate" step="0.01" min="0" required>

                    <label for="category">Category</label>
                    <input type="text" name="category" id="category" placeholder="Category" required>
                </div>
                <div class="form_centre">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>