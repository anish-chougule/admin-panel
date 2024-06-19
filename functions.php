<?php
include('connection.php');

///////////////////////////////////////
// Import the file data to database ///
///////////////////////////////////////

if (isset($_POST["Import"])) {
    echo $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        fgets($file);
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT into $TABLE (SKU, TSI, VENDOR, BRAND, SHIPPING_TEMPLATE, TEMPLATE_CODE, INSTOCK_LEADTIME, NOSTOCK_LEADTIME, QUANTITY, OBSOLETE, IS_UPDATED) 
                    values ('" . $getData[1] . "','" . $getData[2] . "','" . $getData[3] . "','" . $getData[4] . "','" . $getData[5] . "','" . $getData[6] . "','" . $getData[7] . "','" . $getData[8] . "','" . $getData[9] . "','" . $getData[10] . "','" . $getData[11] . "')";
            $result = mysqli_query($conn, $sql);
        }

        if (!isset($result)) {
            echo "<script type=\"text/javascript\">
                        alert(\"Invalid File:Please Upload CSV File.\");
                        window.location = \"index.php\"
                        </script>";
        } else {
            echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"index.php\"
                </script>";
        }

        fclose($file);
        mysqli_free_result($result);
    }
}

///////////////////////////////
// Export data from database //
///////////////////////////////

if (isset($_POST["Export"])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=export_data.csv');

    $output = fopen("php://output", "w");
    fputcsv($output, $cols);
    $query = "SELECT * from $TABLE ORDER BY ID";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
    fclose($output);
    mysqli_free_result($result);
    exit();
}

/////////////////////////////////////////
// Routes any requests to add.php page //
/////////////////////////////////////////

if (isset($_POST["add-data-route"])){
    header("Location: add.php");
}


////////////////////////////
// Display table function //
////////////////////////////

function DisplayTable()
{
    global $conn;
    global $TABLE;
    global $cols;

    $Sql = "SELECT * FROM $TABLE";
    $result = mysqli_query($conn, $Sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<form action='index.php' method='POST'><div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
        <thead>
        <tr>";
        foreach($cols as $i ){
            echo("<th>$i</th>");
        }
        echo "<th colspan='2'>Operations</th>
                </tr></thead><tbody><tr>";

        while ($row = mysqli_fetch_assoc($result)) {

            $ID = $row['ID'];
            foreach($cols as $i){
                echo ("<td>" . $row[$i] . "</td>");
            }

            echo "<td><a href='update.php?ID=$ID'>Update</a></td>
            <td><a href='delete.php?ID=$ID'>Delete</a></td></tr>";
        }
        echo "</tbody></table></div></table>";
    } else {
        echo "Emtpy Databse";
    }
}

////////////////////////////
// API Handling Functions //
////////////////////////////

function handleGetAll()
{
    global $conn;
    global $TABLE;

    $sql = "SELECT * FROM $TABLE";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $employee = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($employee);
    } else {
        echo ('No records found!');
    }
}

function handleUpdate()
{
    global $conn;
    global $TABLE;

    $data = json_decode(file_get_contents('php://input'), true);

    $SKU = $data["SKU"];
    $TSI = $data["TSI"];
    $VENDOR = $data["VENDOR"];
    $BRAND = $data["BRAND"];
    $SHIPPING_TEMPLATE = $data["SHIPPING_TEMPLATE"];
    $TEMPLATE_CODE = $data["TEMPLATE_CODE"];
    $INSTOCK_LEADTIME = $data["INSTOCK_LEADTIME"];
    $NOSTOCK_LEADTIME = $data["NOSTOCK_LEADTIME"];
    $QUANTITY = $data["QUANTITY"];
    $OBSOLETE = $data["OBSOLETE"];
    $IS_UPDATED = $data["IS_UPDATED"];


    $sql = "UPDATE $TABLE SET TSI='$TSI', VENDOR='$VENDOR', BRAND='$BRAND', SHIPPING_TEMPLATE='$SHIPPING_TEMPLATE', TEMPLATE_CODE='$TEMPLATE_CODE', INSTOCK_LEADTIME='$INSTOCK_LEADTIME', NOSTOCK_LEADTIME='$NOSTOCK_LEADTIME', QUANTITY='$QUANTITY', OBSOLETE='$OBSOLETE', IS_UPDATED='$IS_UPDATED' WHERE SKU='$SKU'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Item data updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update Item data"]);
    }
}

function handleDelete($Params)
{
    global $conn;
    global $TABLE;

    $SKU = mysqli_real_escape_string($conn, $Params['ID']);

    if (!isset($SKU)) {
        echo ("SKU not found in URL");
    } elseif ($SKU == null) {
        echo ("Enter SKU");
    }

    $sql = "DELETE FROM $TABLE WHERE SKU='$SKU'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo json_encode(["message" => "Item deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete item"]);
    }
}

function handleAdd()
{
    global $conn;
    global $TABLE;

    $data = json_decode(file_get_contents('php://input'), true);
    $SKU = $data["SKU"];
    $TSI = $data["TSI"];
    $VENDOR = $data["VENDOR"];
    $BRAND = $data["BRAND"];
    $SHIPPING_TEMPLATE = $data["SHIPPING_TEMPLATE"];
    $TEMPLATE_CODE = $data["TEMPLATE_CODE"];
    $INSTOCK_LEADTIME = $data["INSTOCK_LEADTIME"];
    $NOSTOCK_LEADTIME = $data["NOSTOCK_LEADTIME"];
    $QUANTITY = $data["QUANTITY"];
    $OBSOLETE = $data["OBSOLETE"];
    $IS_UPDATED = $data["IS_UPDATED"];

    $sql = "INSERT INTO $TABLE(SKU, TSI, VENDOR, BRAND,	SHIPPING_TEMPLATE, TEMPLATE_CODE, INSTOCK_LEADTIME, NOSTOCK_LEADTIME, QUANTITY,	OBSOLETE, IS_UPDATED)
            VALUES ('$SKU', '$TSI', '$VENDOR', '$BRAND', '$SHIPPING_TEMPLATE', '$TEMPLATE_CODE', '$INSTOCK_LEADTIME', '$NOSTOCK_LEADTIME', '$QUANTITY', '$OBSOLETE', '$IS_UPDATED')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["message" => "Item added successfully"]);
    } else {
        echo json_encode(["message" => "Failed to add Item to the database"]);
    }
}