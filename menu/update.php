<?php

include "../function.php";
session_start();
if ($_SESSION["admin"] == "") {
    header('location: ../auth/login.php');
}

$id = $_GET["id"];

$data = mysqli_query($connection, "SELECT * FROM tb_menu WHERE id_menu = $id");
$menu = mysqli_fetch_assoc($data);

if (isset($_POST["button"])) {
    if (updateMenu($_POST) > 0) {
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
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-4">
                <div class="card shadow" style="width: 18rem;">
                    <div class="card-header text-bold">
                        Edit
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_menu" value="<?= $menu["id_menu"] ?>">
                            <input type="hidden" name="imageOld" value="<?= $menu["image_menu"] ?>">
                            <img src="../img/<?= $menu['image_menu'] ?>" class="card-img-top p-2" alt="<?= $menu['image_menu'] ?>">
                            <div class="my-2">
                                <input type="text" name="name_menu" class="form-control" placeholder="Menu Name" value="<?= $menu["name_menu"] ?>">
                            </div>
                            <div class="mb-2">
                                <input type="number" name="price_menu" class="form-control" placeholder="Price Menu" value="<?= $menu["price_menu"] ?>">
                            </div>
                            <div class="mb-2">
                                <input type="file" name="image_name" class="form-control">
                            </div>
                            <div class="mb-3 float-end">
                                <a href="../admin/index.php" class="mx-2">Back</a>
                                <button type="submit" class="btn btn-primary" name="button">
                                    Edit
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