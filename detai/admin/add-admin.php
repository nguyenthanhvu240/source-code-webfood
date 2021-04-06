<?php include('partials/menu.php'); ?>

<div class='main-centent'>
    <div class='wrapper'>
        <h1>Add Admin</h1>

        <br><br>

        <?php
            if(isset($_SESSION['add']))     //Checking whether the session is set or not
            {
                echo $_SESSION['add'];  //displaying the session message
                unset($_SESSION['add']);    //Remove\ing session message
            }
        ?>

            <form action='' method='POST'>
                <table class='tbl-30'>
                    <tr>
                        <td>Full Name:</td>
                        <td><input type='text' name='full_name' placeholder='Enter Your Name'></td>
                    </tr>

                    <tr>
                        <td>Username:</td>
                        <td><input type='text' name='username' placeholder='Your Username'></td>
                    </tr>

                    <tr>
                        <td>Password:</td>
                        <td><input type='password' name='password' placeholder='Your Password'></td>
                    </tr>

                    <tr>
                        <td colspan='2'>
                            <input type='submit' name='submit' value='Add Admin' class='btn-secondary'>
                        </td>
                    </tr>
                </table>
            </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    require_once "../config/constants.php";
    //Process the value from form and save it in database

    //Check whether the submit button is clicked or not
    
    if(isset($_POST['submit']))
    {
        //Button Clicked
        //echo 'Button Clicked';

        //1.Get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = $_POST['password'];//encrypt password
        

        //2.Insert data into database
        $sql ="INSERT INTO `tbl_admin`(`full_name`, `username`, `password`) VALUES ('$full_name','$username','$password')";
        //var_dump($sql);
        //3.Execute query and add to database
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //4.check whether the (QUery is executed) data is inserted or not and display appropriate message
        if($res == true)
        {
            //echo "Data Inserted";
            //create a sesstion variable to display message
            $_SESSION['add'] = 'Admin Added Successfully';
            //Redirect page to manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        } 
        else
        {
            //echo "Data Inserted";
            //create a sesstion variable to display message
            $_SESSION['add'] = 'Failed to Add Successfully';
            //Redirect page to manage admin
            header('location:'.SITEURL.'admin/add-admin.php');
        }
        
    }
?>
