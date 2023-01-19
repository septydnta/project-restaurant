<?php

include('../config.php');
session_start();
if (isset($_POST["button"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //check username
    $user = mysqli_query($connection, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'");
    $data = mysqli_fetch_assoc($user);
    $data_id = $data["id_user"];
    if (mysqli_num_rows($user) === 1) {
        // check level
        if ($data["status"] == "admin") {
            $_SESSION["admin"] = $username;
            $_SESSION["id_admin"] = $data_id;
            echo "
            <script>
                document.location.href = '../admin/index.php'
                alert('berhasil login')
            </script>
            ";
        } else if ($data["status"] == "user") {
            $_SESSION["user"] = $username;
            $_SESSION["id_user"] = $data_id;
            echo "
            <script>
                document.location.href = '../user/index.php'
                alert('berhasil login')
            </script>
            ";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background: rgb(100, 149, 237);
            background: linear-gradient(90deg, rgba(100, 149, 237) 0%, rgba(240, 45, 253, 1) 100%);
        }

        button {
            font-size: 17px;
            padding: 0.5em 2em;
            border: transparent;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);
            background: dodgerblue;
            color: white;
            border-radius: 4px;
        }

        button:hover {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(30, 144, 255, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }

        button:active {
            transform: translate(0em, 0.2em);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header text-bold">
                        <div class="center-text">
                            <p style="font-weight: bold;">
                                <font size="5">
                                    LOGIN
                            </p>
                            </font>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="my-2">
                                <input type="text" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="mb-2">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="mb-3 float-end">
                                <a href="register.php" class="mx-2">create account?</a>
                                <button type="submit" class="btn btn-primary" name="button">
                                    Login
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