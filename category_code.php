<?php 
session_start();
include 'config/dbcon.php';
include 'functions/myfunctions.php';
if(isset($_POST['SaveCat_btn'])){

    $Category_Code= mysqli_real_escape_string($connection, $_POST['Category_Code']);
    $CategoryName= mysqli_real_escape_string($connection, $_POST['CategoryName']);
    $Description= mysqli_real_escape_string($connection, $_POST['Description']);
    
    $category_query="INSERT into category (Category_Code,Category_name,Description) VALUES('$Category_Code','$CategoryName','$Description');";

    $cat_query_run=mysqli_query($connection, $category_query);
    if($cat_query_run){
        $_SESSION['message']="New Product Added Successfully!";
        header('Location: Admin/pages/category/category.php');
    }
    else{
        redirect("category.php","Something Went Wrong!");

        }
    }
elseif(isset($_POST['Save_Edit'])){

    $Category_Code= mysqli_real_escape_string($connection, $_POST['Cat_Code']);
    $CategoryName= mysqli_real_escape_string($connection, $_POST['Cat_Name']);
    $Description= mysqli_real_escape_string($connection, $_POST['Descp']);
    
    
    $category_query="UPDATE `category` SET `Category_name` = '$CategoryName',`Description`='$Description' WHERE `Category_Code` ='$Category_Code' ;";

    $cat_query_run=mysqli_query($connection, $category_query);
    if($cat_query_run){
        $_SESSION['message']="Category Updated Successfully!";
        header('Location: Admin/pages/category/category.php');
    }
    else{
        redirect("category.php","Something Went Wrong!");

        }
    }
   
elseif(isset($_POST['YES_Delete'])){
        $old_cc=$_GET['catc'];
        $old_cn=$_GET['catn'];
        $old_cd=$_GET['catd'];

        
        
        $category_query="DELETE FROM category WHERE `Category_name` = '$old_cn';";
    
        $cat_query_run=mysqli_query($connection, $category_query);
        if($cat_query_run){
            $_SESSION['message']="Category deleted Successfully!";
            header('Location: Admin/pages/category/category.php');
        }
        else{
            redirect("category.php","Something Went Wrong!");
    
            }
    }
       
    
?>