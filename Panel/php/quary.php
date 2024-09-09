<?php
include("connection.php");

// CATEGORY
 if(isset($_POST['categoryButton'])){
    $Name = $_POST['categoryName'];
    $Image = $_FILES['categoryImage']['name'];
    $TmpName = $_FILES['categoryImage']['tmp_name'];
    $extension = pathinfo($Image,PATHINFO_EXTENSION);
    $des = 'img/categories/'.$Image;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
        if(move_uploaded_file($TmpName,$des)){
            $query = $pdo-> prepare("insert into name (CatName,CatImage) values(:pn,:pi)");
            $query ->bindParam("pn",$Name);
            $query ->bindParam("pi",$Image);
            $query ->execute();
            echo"<script>alert('category added')</script>";

        }
    }


 }
 ?>

