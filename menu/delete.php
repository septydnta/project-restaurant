<?php

include("../function.php");
session_start();
if ($_SESSION["admin"] == "") {
    header('location: ../user/index.php');
}
$id = $_GET["id"];

if(deleteData($id) > 0){
    echo'
    <script>
        alert("data delete has succesfully")
        document.location.href = "../admin/index.php"
    </script>';
}

?>