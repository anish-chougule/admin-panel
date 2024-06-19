<?php

include("connection.php")?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>
<body class="bg-dark">
    <?php
        global $TABLE;
        $ID = $_GET["ID"];  //Checks the ID to delete
        if ($ID) {
            $sql = "DELETE FROM $TABLE WHERE ID=$ID";
            $result = mysqli_query($conn, $sql);    // Executes the deletetion

            // Success msg and rerouting to index.php
            if (isset($result)) {
                echo "<script type=\"text/javascript\">
                        alert(\"Data deleted from the database.\");
                        window.location.href = \"index.php\";
                        </script>";
            } else {
                echo ("Error occured adding data to the database.");
            }

        }
    ?>

</body>

</html>