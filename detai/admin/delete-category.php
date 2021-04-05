<?php
    //echo "delete page"
    include('../config/constants.php');
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //echo "Get value and delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove image file available
        if($image_name != "")
        {
            //Remove
            $path = '../images/category/'.$image_name;
            $remove = unlink($path);

            if($remove == false)
            {
                //Set the session remove
                $_SESSION['remove'] = "<div class='error'>Failed to remove category Image.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
                //Stop the process
                die();
            }
            
        }
        //SQL Query
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        if($res==true)
        {
            //Success message
            $_SESSION['delete'] = "<div class='success'>Category Delete Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            //Failed
            $_SESSION['delete'] = "<div class='error'>Failed to delete Category.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
    }
    else
    {
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>