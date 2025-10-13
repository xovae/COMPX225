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

        $costume_id = $_POST['new_costume_id'];

        $query = "SELECT id FROM `costumes` WHERE id = ?";

        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt,"d", $costume_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $result);
        mysqli_stmt_fetch($stmt);

        if ($result != null)
        {
            echo "<h1>A costume with the provided ID already exists!</h1>";
        }
        else
        {
            $query = "INSERT INTO `costumes`
            (id, is_available, branch_id, name, size, daily_rate, category)
            VALUES ('" . htmlspecialchars($_POST['new_costume_id']) . "',
                    '" . htmlspecialchars($_POST['is_available']) . "',
                    '" . htmlspecialchars($_POST['branch_id']) . "',
                    '" . htmlspecialchars($_POST['costume_name']) . "',
                    '" . htmlspecialchars($_POST['size']) . "',
                    '" . htmlspecialchars($_POST['daily_rate']) . "',
                    '" . htmlspecialchars($_POST['category']) . "')";

            mysqli_query($con, $query);


            echo "<h1>Costume Added!</h1>";

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

            echo "<tr>";
            echo "<td>" . $_POST['new_costume_id'] . "</td>";
            if ($_POST['is_available'] == "1") {
                echo "<td>Yes</td>";
            }
            else {
                echo "<td>No</td>";
            }
            echo "<td>" . $_POST['branch_id'] . "</td>";
            echo "<td>" . $_POST['costume_name'] . "</td>";
            echo "<td>" . $_POST['size'] . "</td>";
            echo "<td>" . $_POST['daily_rate'] . "</td>";
            echo "<td>" . $_POST['category'] . "</td>";
            echo "</tr>";
            echo "</table>";
        }
    ?>

    <a href="index.php"><button><-- Back</button></a>
</body>
</html>