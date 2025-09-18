<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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

        $query = "SELECT * FROM `costumes` WHERE id = $costume_id";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 0)
        {
            echo "<h1>No costumes with the provided ID!</h1>";
        }
        else
        {

            echo "<h1>Costume Found!</h1>";

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

            $row = mysqli_fetch_assoc($result);
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
            echo "</table>";
        }
    ?>

    <a href="index.php"><button><-- Back</button></a>
</body>
</html>