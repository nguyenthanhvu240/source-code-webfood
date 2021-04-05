<?php include('partials/menu.php'); ?>

        <!-- Main content Section Start --> 
        <div class="main-content">
            <div class="wrapper">
            <h1>Quản lí Admin</h1>
                <br/><br/>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];  //Displaying session message
                    unset($_SESSION['add']);    //Removing session message
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }
                

            ?>
            <br><br><br>

            <!-- Button to Add Admin --> 
            <a href='add-admin.php' class='btn-primary'>Add Admin</a>
                <br/><br/><br/>
            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>

                <?php
                    //Query to get all Admin
                    $sql = "SELECT * FROM tbl_admin";
                    //Execute the Query
                    $res = mysqli_query($conn,$sql);
                    //Check whether the query is executed or not
                    if($res==true)
                    {
                        //Count rows to check whether we have data in databae or not
                        $count = mysqli_num_rows($res);

                        $sn = 1;    //Create a variable and assign the value
                        
                        //Check the num of rows
                        if($count > 0)
                        {
                            //We have data in database
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Using While loop to get all the data form database
                                //and while loop will run as long as wh have data in database
                                //Get individual data
                                $id=$row['id'];
                                $ful_name = $row['full_name'];
                                $username = $row['username'];

                                //display the values in our table
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $ful_name; ?></td>
                                        <td><?php echo $username; ?></td>
                                        <td>
                                            <a href='<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>' class='btn-primary'>Change Password</a>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class='btn-secondary'>Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class='btn-danger'>Delete Admin</a>
                                        </td>
                                    </tr>
                                <?php

                            }        
                        }
                        else
                        {
                            // ???
                        }
                    }
                ?>

            </table>

            </div>
        </div>
        <!-- Main content Section Ends --> 

<?php include('partials/footer.php'); ?>