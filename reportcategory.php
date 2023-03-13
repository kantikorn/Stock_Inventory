<?php
include "api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Category</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(175, 212, 255); ">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navindex">
                <ul class="navbar-nav me-auto">

                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="managestock.php">HOME</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12" >
              
                   <div class="container-fluid mt-4" >
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                <span class="badge mb-4" style="background-color: rgb(4, 22, 56); font-size: 30px; font-weight: bolder; margin-left: -1rem;">สรุปข้อมูล สินค้าคงคลังของคุณ</span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                
                            </div>
                         
                           
                            <form class="d-flex" action="reportcategory.php" method="post">

                                <div class="col-12 col-sm-6 col-md-3 col-lg-4">
                                 
                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                    <label for="categoryproduct" class="form-label" style="color:#6a6a6a; font-size: 20px; margin-left: -3rem;">เลือกประเภทสินค้าตรวจสอบ</label>
                                    <select id="categoryproduct" name="categoryproduct">
                                    <?php 
                                                        $sql = "SELECT DISTINCT cate_name FROM `product` WHERE 1";
                                                        $q = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_array($q)) {
                                                            echo '<option value="'.$row['cate_name'].'">'.$row['cate_name'].'</option>';
                                                        }
                                                        ?>

                                </select>

                                </div>
                                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                                    <button class="btn btn-outline-primary" type="submit" name="search">Search</button>
                                </div>

                
                                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                                   
                                </div>
                
                
                            </form>




                            <div class="container-fluid mt-3">
                                <table class="table table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>รูปภาพประเภทสินค้า</th>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th style="background-color: rgb(0, 199, 53);">คงเหลือในสต็อก</th>

                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php
                                        if($_SERVER['REQUEST_METHOD'] == "GET") {
                                            $sql = "SELECT DISTINCT * FROM `product` WHERE 1";
                                            $q = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_array($q)) {
                                                $n = $row['cate_name'];
                                                $sql2 = "SELECT * FROM `category` WHERE `name`='$n'";
                                                $q2 = mysqli_query($conn, $sql2);
                                                $row2 = mysqli_fetch_array($q2);
                                                echo '
                                                <tr>
                                                <td><img class="mt-1 mb-1"style="border-radius: 20px; width: 150px; height: 100px;" src="'.$row2['image'].'"></td>
                                                <td>'.$row['cate_name'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['unit'].'</td>
                                            </tr>
                                                ';
                                            }
                                        }

                                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                                            $s = $_POST['categoryproduct'];
                                            $sql = "SELECT DISTINCT * FROM `product` WHERE `cate_name`='$s'";
                                            $q = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_array($q)) {
                                                $n = $row['cate_name'];
                                                $sql2 = "SELECT * FROM `category` WHERE `name`='$n'";
                                                $q2 = mysqli_query($conn, $sql2);
                                                $row2 = mysqli_fetch_array($q2);
                                                echo '
                                                <tr>
                                                <td><img class="mt-1 mb-1"style="border-radius: 20px; width: 150px; height: 100px;" src="'.$row2['image'].'"></td>
                                                <td>'.$row['cate_name'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['unit'].'</td>
                                            </tr>
                                                ';
                                            }
                                        }

                     
                                        ?>
                                        
                                      
                                           
                                    </tbody>
                                </table>

                              
                           

                        </div>
                   </div>
            </div>
        </div>
    </div>



    

</body>
</html>