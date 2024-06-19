<?php include("connection.php");
global $TABLE;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Admin Panel</title>
</head>

<body class="bg-dark">
    <?php 

    $ID = $_GET['ID'];

    $sql = "SELECT * FROM $TABLE WHERE ID='$ID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)==0){
        echo("Invalid ID");
    }
    else{
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $SKU = $data[0]["SKU"];
        $TSI = $data[0]["TSI"];
        $VENDOR = $data[0]["VENDOR"];
        $BRAND = $data[0]["BRAND"];
        $SHIPPING_TEMPLATE = $data[0]["SHIPPING_TEMPLATE"];
        $TEMPLATE_CODE = $data[0]["TEMPLATE_CODE"];
        $INSTOCK_LEADTIME = $data[0]["INSTOCK_LEADTIME"];
        $NOSTOCK_LEADTIME = $data[0]["NOSTOCK_LEADTIME"];
        $QUANTITY = $data[0]["QUANTITY"];
        $OBSOLETE = $data[0]["OBSOLETE"];
        $IS_UPDATED = $data[0]["IS_UPDATED"]; 
    }

    ?>
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
                        <form action="update.php?ID=<?php echo($ID)?>" method="POST" name="update-data" id="update-data">
                            <div class="table-resposive">
                                <table class="table table-striped">
                                <tr>
                                            <td>SKU</td>
                                            <td><input type="text" id="SKU" name="SKU" placeholder="<?php echo($SKU)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>TSI</td>
                                            <td><input type="text" id="TSI" name="TSI" placeholder="<?php echo($TSI)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>VENDOR</td>
                                            <td><input type="text" id="VENDOR" name="VENDOR" placeholder="<?php echo($VENDOR)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>BRAND</td>
                                            <td><input type="text" id="BRAND" name="BRAND" placeholder="<?php echo($BRAND)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>SHIPPING TEMPLATE</td>
                                            <td><input type="text" id="SHIPPING_TEMPLATE" name="SHIPPING_TEMPLATE" placeholder="<?php echo($SHIPPING_TEMPLATE)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>TEMPLATE CODE</td>
                                            <td><input type="text" id="TEMPLATE_CODE" name="TEMPLATE_CODE" placeholder="<?php echo($TEMPLATE_CODE)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>INSTOCK LEADTIME</td>
                                            <td><input type="text" id="INSTOCK_LEADTIME" name="INSTOCK_LEADTIME" placeholder="<?php echo($INSTOCK_LEADTIME)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>NOSTOCK LEADTIME</td>
                                            <td><input type="text" id="NOSTOCK_LEADTIME" name="NOSTOCK_LEADTIME" placeholder="<?php echo($NOSTOCK_LEADTIME)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>QUANTITY</td>
                                            <td><input type="text" id="QUANTITY" name="QUANTITY" placeholder="<?php echo($QUANTITY)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>OBSOLETE</td>
                                            <td><input type="text" id="OBSOLETE" name="OBSOLETE" placeholder="<?php echo($OBSOLETE)?>"></td>
                                        </tr>
                                        <tr>
                                            <td>IS UPDATED</td>
                                            <td><input type="text" id="IS_UPDATED" name="IS_UPDATED" placeholder="<?php echo($IS_UPDATED)?>"></td>
                                        </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <button type="submit" name="update-data" class="btn btn-success">Update Data</button>
                            </div>
                            <br>
                        </form>
                        <button type="btn" name="clear" class="btn btn-success" onclick="clearInputField()"> Clear All</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        // Clears input fields
        function clearInputField() {
            document.getElementById('update-data').reset();
        }
    </script> 

</body>

</html>

<?php
    // Catches POST Request Method to update data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Checks if there are any updates and updates the variables accordingly
        if($_POST["SKU"]!=null){
            $Name = $_POST["SKU"];
        }
        if($_POST["TSI"]!=null){
            $Age = $_POST["TSI"];
        }
        if($_POST["VENDOR"]!=null){
            $VENDOR = $_POST["VENDOR"];
        }
        if($_POST["BRAND"]!=null){
            $BRAND = $_POST["BRAND"];
        }
        if($_POST["SHIPPING_TEMPLATE"]!=null){
            $SHIPPING_TEMPLATE = $_POST["SHIPPING_TEMPLATE"];
        }
        if($_POST["TEMPLATE_CODE"]!=null){
            $TEMPLATE_CODE = $_POST["TEMPLATE_CODE"];
        }
        if($_POST["INSTOCK_LEADTIME"]!=null){
            $INSTOCK_LEADTIME = $_POST["INSTOCK_LEADTIME"];
        }
        if($_POST["NOSTOCK_LEADTIME"]!=null){
            $NOSTOCK_LEADTIME = $_POST["NOSTOCK_LEADTIME"];
        }
        if($_POST["QUANTITY"]!=null){
            $QUANTITY = $_POST["QUANTITY"];
        }
        if($_POST["OBSOLETE"]!=null){
            $OBSOLETE = $_POST["OBSOLETE"];
        }
        if($_POST["IS_UPDATED"]!=null){
            $IS_UPDATED = $_POST["IS_UPDATED"];
        }
        
        // SQL Query to update data
        $sql = "UPDATE $TABLE SET SKU='$SKU', TSI='$TSI', VENDOR='$VENDOR', BRAND='$BRAND', SHIPPING_TEMPLATE='$SHIPPING_TEMPLATE', TEMPLATE_CODE='$TEMPLATE_CODE', INSTOCK_LEADTIME='$INSTOCK_LEADTIME', NOSTOCK_LEADTIME='$NOSTOCK_LEADTIME', QUANTITY='$QUANTITY', OBSOLETE='$OBSOLETE', IS_UPDATED='$IS_UPDATED' WHERE ID='$ID'";
        
        // SQL Query execution
        $result = mysqli_query($conn, $sql);

        // Result Display
        if ($result) {
            echo "<script type=\"text/javascript\">
                    alert(\"Data has been updated in the database.\");
                    window.location = \"index.php\";
                    </script>";
        } else {
            echo ("Error occured updating data to the database.");
        }
    }
?>