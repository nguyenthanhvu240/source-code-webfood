 
<?php include('partials/menu.php'); ?>
        <!-- Main content Section Start --> 
        <div class="main-content">
            <div class="wrapper">
            <h1>Bảng Điều Khiển</h1>
            
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>

                <div class='col-4 text-center'>
                <?php 
                    //SQL QUEY
                    $sql = "SELECT * from tbl_category";
                    $res = mysqli_query($conn,$sql);
                    $count = mysqli_num_rows($res); 
                ?>

                    <h1><?php echo $count;?></h1>
                        <br/>
                        Categories
                    </h1>               
                </div>

                <div class='col-4 text-center'>
                
                <?php 
                    //SQL QUEY
                    $sql2 = "SELECT * from tbl_food";
                    $res2 = mysqli_query($conn,$sql2);
                    $count2 = mysqli_num_rows($res2); 
                ?>
                    <h1><?php echo $count2;?></h1>
                        <br/>
                        Foods
                    </h1>               
                </div>

                <div class='col-4 text-center'>
                <?php 
                    //SQL QUEY
                    $sql3 = "SELECT * from tbl_order";
                    $res3 = mysqli_query($conn,$sql3);
                    $count3 = mysqli_num_rows($res3); 
                ?>
                    <h1><?php echo $count3;?></h1>
                        <br/>
                        Total Orders
                    </h1>               
                </div>

                <div class='col-4 text-center'>
                <?php
                    //SQL QUERY
                    $sql4 = "SELECT SUM(total) AS Total From tbl_order WHERE status='Delivered' ";
                    $res4 = mysqli_query($conn,$sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    //GET TOTAL REvenue
                    $total_revenue = $row4['Total'];
                ?>
                    <h1><?php echo $total_revenue;?>VND</h1>
                        <br/>
                        Revenue Generated
                    </h1>               
                </div>

                <div class='clearfix'></div>
            </div>
        </div>
        <!-- Main content Section Ends --> 

<?php include('partials/footer.php'); ?>