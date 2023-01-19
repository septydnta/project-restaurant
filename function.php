<?php

include "config.php";

function register($data)
{
    global $connection;

    $username = $data["username"];
    $password = $data["password"];

    // check name
    $name = mysqli_query($connection,"SELECT * FROM tb_user WHERE username = '$username'");
    if(mysqli_fetch_assoc($name))
    {
        echo "
        <script>
            alert('username sudah terpakai')
        </script>";

        return false;
    }

    mysqli_query($connection,"INSERT INTO tb_user values('','$username','$password','user')");

    return mysqli_affected_rows($connection);
}

function deleteData($id){
    global $connection;
    mysqli_query($connection,"DELETE FROM tb_menu WHERE id_menu = $id");
    return mysqli_affected_rows($connection);
}

function imageMenu(){

    $nameFile = $_FILES["image_name"]["name"];
    $tempName = $_FILES["image_name"]["tmp_name"];
    $error = $_FILES["image_name"]["error"];
    
    // check if no images are uploaded
    if( $error === 4 ){
        echo "please upload image!";
    }
    
    // check extension image
    $extension = ["jpg","png","jpeg","jfif"];
    $extensionImage = explode(".",$nameFile);
    $extensionImage = strtolower(end($extensionImage));
        
    if( !in_array($extensionImage,$extension) ){
        echo "this file not image";
    }
        
        // change name image from default to random string
        $newName = uniqid();
        $newName .= ".";
        $newName .= $extensionImage;
    
        move_uploaded_file($tempName, '../img/' . $newName);
    
        return $newName;
    
    }
    
function createMenu($data)
{
    
    global $connection;
    
    $name = $data["name_menu"];
    $price = $data["price_menu"];
    $image_name = imageMenu();
    
    if(!$image_name){
        return false;
    }
    mysqli_query($connection, "INSERT INTO tb_menu VALUES(
        '',
        '$name',
        '$price',
        '$image_name'
    )");
    
    return mysqli_affected_rows($connection);
}

function updateMenu($data)
{

    global $connection;

    $id = $data["id_menu"];
    $name = $data["name_menu"];
    $price = $data["price_menu"];
    $imageOld = $data["imageOld"];

    if($_FILES["image_name"]["error"] === 4){
        $image_menu = $imageOld;
    }else{
        $image_menu = imageMenu();
    }

    mysqli_query($connection, "UPDATE tb_menu SET
        name_menu = '$name',
        price_menu = '$price',
        image_menu = '$image_menu'
        WHERE id_menu = $id
    ");

    return mysqli_affected_rows($connection);
}

?>