<?php

include "../function.php";
session_start();
if ($_SESSION["admin"] == "") {
    header('location: ../auth/login.php');
}

if (isset($_POST["button"])) {
    if (createMenu($_POST) > 0) {
        header('location: ../admin/index.php');
        echo "
        <script>
            alert('data berhasil di tambahkan')
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
         body{
        background: rgb(100, 149, 237);
        background: linear-gradient(90deg, rgba(100, 149, 237) 0%, rgba(240,45,253,1) 100%);
    }
        </style>
</head>
<body>
<div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-bold">
                        Create
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="my-2">
                                <input type="text" name="name_menu" class="form-control" placeholder="Menu Name" >
                            </div>
                            <div class="mb-2">
                                <input type="number" name="price_menu" class="form-control" placeholder="Price Menu" >
                            </div>
                            <div class="mb-2">
                                <input type="file" name="image_name" class="form-control" placeholder="Price Menu" >
                            </div>
                            <div class="mb-3 float-end">
                                <a href="../admin/index.php" class="mx-2">Back</a>
                                <button type="submit" class="btn btn-primary" name="button">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>