<?php
    require_once("db.php");

    $query = "INSERT INTO `costumes`
    (id, is_available, branch_id, name, size, daily_rate, category)
    VALUES ('" . $_POST['new_costume_id'] . "',
            '" . $_POST['is_available'] . "',
            '" . $_POST['branch_id'] . "',
            '" . $_POST['costume_name'] . "',
            '" . $_POST['size'] . "',
            '" . $_POST['daily_rate'] . "',
            '" . $_POST['category'] . "')";

    mysqli_query($con, $query);

    header("location: index.php");
?>