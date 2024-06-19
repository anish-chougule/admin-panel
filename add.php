<?php include("connection.php");
global $TABLE;
global $cols;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <a href='index.php'>
                            <h2 class="display-6 text-center">Admin Panel</h2>
                        </a>
                    </div>
                    <div class="card-body">

                        <!-- Input Form  -->
                        <form action="add.php" method="post" name="add-data" id="add-data">
                            <div class="table-resposive">
                                    <table class="table table-striped">
                                        <tr>
                                            <td>SKU</td>
                                            <td><input type="text" id="SKU" name="SKU"></td>
                                        </tr>
                                        <tr>
                                            <td>TSI</td>
                                            <td><input type="text" id="TSI" name="TSI"></td>
                                        </tr>
                                        <tr>
                                            <td>VENDOR</td>
                                            <td><input type="text" id="VENDOR" name="VENDOR"></td>
                                        </tr>
                                        <tr>
                                            <td>BRAND</td>
                                            <td><input type="text" id="BRAND" name="BRAND"></td>
                                        </tr>
                                        <tr>
                                            <td>SHIPPING TEMPLATE</td>
                                            <td><input type="text" id="SHIPPING_TEMPLATE" name="SHIPPING_TEMPLATE"></td>
                                        </tr>
                                        <tr>
                                            <td>TEMPLATE CODE</td>
                                            <td><input type="text" id="TEMPLATE_CODE" name="TEMPLATE_CODE"></td>
                                        </tr>
                                        <tr>
                                            <td>INSTOCK LEADTIME</td>
                                            <td><input type="text" id="INSTOCK_LEADTIME" name="INSTOCK_LEADTIME"></td>
                                        </tr>
                                        <tr>
                                            <td>NOSTOCK LEADTIME</td>
                                            <td><input type="text" id="NOSTOCK_LEADTIME" name="NOSTOCK_LEADTIME"></td>
                                        </tr>
                                        <tr>
                                            <td>QUANTITY</td>
                                            <td><input type="text" id="QUANTITY" name="QUANTITY"></td>
                                        </tr>
                                        <tr>
                                            <td>OBSOLETE</td>
                                            <td><input type="text" id="OBSOLETE" name="OBSOLETE"></td>
                                        </tr>
                                        <tr>
                                            <td>IS UPDATED</td>
                                            <td><input type="text" id="IS_UPDATED" name="IS_UPDATED"></td>
                                        </tr>
                                    </table>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="add-data" class="btn btn-success">Add Data</button>
                            </div>
                        </form>
                        <br>
                        <button type="submit" name="clear" class="btn btn-success" onclick="clearInputField()"> Clear</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>

    <script language="javascript">
        
        // Clears input fields 
        function clearInputField() {
            document.getElementById('add-data').reset();
        }

        // Displays success msg and routes to index.php
        function addDataSuccess(){
            alert("Data has been to the database.");
            window.location = "index.php";
        }
    </script>

</body>

<?php
// Catches the POST Request to add data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['SKU']) && !empty($_POST['TSI']) && !empty($_POST['VENDOR']) && !empty($_POST['BRAND']) && !empty($_POST['SHIPPING_TEMPLATE']) && !empty($_POST['TEMPLATE_CODE']) && !empty($_POST['INSTOCK_LEADTIME']) && !empty($_POST['NOSTOCK_LEADTIME']) && !empty($_POST['QUANTITY']) && !empty($_POST['OBSOLETE']) && !empty($_POST['IS_UPDATED'])) {

        $ID = $_POST["ID"];
        $SKU = $_POST["SKU"];
        $TSI = $_POST["TSI"];
        $VENDOR = $_POST["VENDOR"];
        $BRAND = $_POST["BRAND"];
        $SHIPPING_TEMPLATE = $_POST["SHIPPING_TEMPLATE"];
        $TEMPLATE_CODE = $_POST["TEMPLATE_CODE"];
        $INSTOCK_LEADTIME = $_POST["INSTOCK_LEADTIME"];
        $NOSTOCK_LEADTIME = $_POST["NOSTOCK_LEADTIME"];
        $QUANTITY = $_POST["QUANTITY"];
        $OBSOLETE = $_POST["OBSOLETE"];
        $IS_UPDATED = $_POST["IS_UPDATED"];

        // SQL Query to insert data
        $sql = "INSERT INTO $TABLE(SKU, TSI, VENDOR, BRAND, SHIPPING_TEMPLATE, TEMPLATE_CODE, INSTOCK_LEADTIME, NOSTOCK_LEADTIME, QUANTITY, OBSOLETE, IS_UPDATED) VALUES ('$SKU', '$TSI', '$VENDOR', '$BRAND', '$SHIPPING_TEMPLATE', '$TEMPLATE_CODE', '$INSTOCK_LEADTIME', '$NOSTOCK_LEADTIME', '$QUANTITY', '$OBSOLETE', '$IS_UPDATED')";

        // SQL Query execution
        $result = mysqli_query($conn, $sql);

        // Result display
        if (isset($result)) {
            echo "<script type=\"text/javascript\">
                    addDataSuccess();
                    </script>";
        } else {
            echo ("Error adding data to the Database");
        }
    } else {
        echo("<script type=\"text/javascript\">
                    alert(\"Empty or Invalid input. Correct it before submitting.\");
                    window.location = \"add.php\";
                    </script>");
    }
}
?>

</html>