        <?php

        include "../config.php";
        session_start();
        if ($_SESSION["user"] == "") {
            header('location: ../auth/login.php');
        }

        $menus = mysqli_query($connection, "select * from tb_menu");

        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>User</title>
            <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
            <style>
                /* Navigation Bar */
                #navbar {
                    background-color: #E6E6FA;
                    overflow: hidden;
                }

                #navbar a {
                    float: left;
                    color: #f2f2f2;
                    text-align: center;
                    padding: 14px 16px;
                    text-decoration: none;
                    font-size: 17px;
                }

                #navbar a:hover {
                    background-color: #ddd;
                    color: black;
                }

                #navbar a.active {
                    background-color: #4CAF50;
                    color: white;
                }
            </style>
        </head>

        <body>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary mb-4">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <p style="font-weight: bold;">
                            <font size="6">My Resto</font>
                    </a></p>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">
                                    <p style="font-weight: bold;">Home
                                </a></p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <p style="font-weight: bold;">Menu
                                </a></p>
                            <li class="nav-item">
                                <a class="nav-link" href="../auth/logout.php">
                                    <p style="font-weight: bold;">Logout
                                </a></p>
                            </li>
                        </ul>
                    </div>
            </nav>
            <div class="container">
                <div class="row justify-content-start">
                    <?php while ($row = mysqli_fetch_assoc($menus)) : ?>
                        <div class="col-md-4 mb-3">
                            <div class="card" style="width: 18rem;">
                                <img src="../img/<?= $row['image_menu'] ?>" class="card-img-top p-2" alt="<?= $row['image_menu'] ?>">
                                <div class="card-body">
                                    <div>
                                        <h5 class="card-title"><?= $row['name_menu'] ?></h5>
                                    </div>
                                    <div class="float-end">
                                        <h5 class="card-title">Rp<?= $row['price_menu'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </body>

        </html>