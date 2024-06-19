<?php include("functions.php") ?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title>Admin Panel</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <a href='index.php'><h2 class="display-6 text-center">Admin Panel</h2></a>
                    </div>

                    <div class="card-body">

                        <form action="functions.php" method="post" name="upload_excel" enctype="multipart/form-data">
                            <fieldset>

                            <!-- Import Data Form -->
                            <legend>Import data</legend>

                            <!-- File Button -->
                            <div class="form-group">
                                <label><b>Select File</b></label>
                                <div>
                                    <input type="file" name="file" id="file" class="input-large" required>
                                </div>
                            </div>

                            <br>

                            <!-- Import Button -->
                            <div class="form-group">
                                <div>
                                    <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
                                </div>
                            </div>

                            </fieldset>
                        </form>
                    </div>
                </div>   

                <div class="card mt-5">
                        <br><br>

                        <!-- Display data from Database -->
                        <?php DisplayTable() ?>

                    <div class="card-body">  
                        <form action="functions.php" method="POST" name="export" enctype="multiform/form-data">
                            <div class="form-group">
                                
                                <!-- Add data to database -->
                                <button type="btn" id="add-data" name="add-data-route" class="btn btn-success">Add Data</button>
                                
                                <!-- Export Data from database -->
                                <input type="submit" name="Export" class="btn btn-primary" value="Export"/>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        </div>
</body>
</html>