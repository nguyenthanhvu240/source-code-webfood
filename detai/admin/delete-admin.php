<?php
    include('../config/constants.php');

    //echo isset($_GET['id']) ? $_GET['id'] : "Empty";
    //1.Get the id of admin to be deleted
    //echo $id = $_GET['id'];   in ra man hinh
    $id = $_GET['id'];

    //2. create sql query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    //Execute the query
    $res = mysqli_query($conn,$sql);

    //Check whether the query executed successfully or not
    if($res == true)
    {
        //Query executed successfully and admin deleted
        //echo 'Admin deleted';
        //Create Session variable to display message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        //Redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed
        //echo 'Failed to delete admin';
        $_SESSION['delete'] = "<div class='error'>Failed to delete admin. Try again.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }

    //3.redirect to manage admin page with message

?>