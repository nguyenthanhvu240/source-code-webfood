<?php
    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        $id=$_GET['id'];
        $image_name = $_GET['image_name'];

        if($image_name!='')
        {
            //Get the image path
            $path = '../images/food/'.$image_name;
            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['upload'] = "<div class='error'>Failed to Remove Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }

            //SQL QUERY
            $sql = "DELETE FROM tbl_food WHERE id=$id";
            $res = mysqli_query($conn,$sql);
            if($res==true)
            {
                //DELETE
                $_SESSION['delete'] = "<div class='success'>Deleted Sucessfully.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }
            else
            {
                //FAILED
                $_SESSION['delete'] = "<div class='error'>Failed to Delete.</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
            }

        }


    }
    else
    {
        $_SESSION['unauthorize'] = "<div class='error'>Unauthorized Access.</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>