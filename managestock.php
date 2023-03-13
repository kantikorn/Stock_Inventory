<?php
include "api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Stock</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(23, 17, 94);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">ยินดีต้อนรับ ผู้ดูเเลสต็อกสินค้า</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navadmin">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    

    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-2">
                <div class="card" style="background-color: #2d2d2d; height: 100vh; margin-left: -1rem; box-shadow: #fff 10px;">
                    <img class="rounded-circle mt-3 mb-2" src="image/bandner.jpeg" style="width: 200px; height: 180px; margin-left: 1rem;">
                    <hr class="mt-5" style="color:#fff;">
                    <h6 class="card-title"  style="color:#fff; margin-left: 10px;"><i class="fa-solid fa-pen-to-square" style="margin-right: 5px;"></i>Rungreung Stock</h6>
                    <br>
                    
                    <?php
                    $sql = "SELECT * FROM `category` WHERE 1";
                    $q = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($q)) {
                        $n = $row['name'];
                        $sql2 = "SELECT * FROM `product` WHERE `cate_name`='$n'";
                        $qs = mysqli_query($conn, $sql2);
                        $xd = mysqli_num_rows($qs);
                        echo '
                        <span class="badge position-relative"  style="background-color: rgb(18, 15, 82); font-size: 20px; width:180px;  margin-left:2rem;">
                        <i class="fa-solid fa-bottle-droplet"></i> <!--ดึงประเภทสินค้ามาเเสดง-->'.$row['name'].'
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger">
                           <!--ดึงข้อมูลว่ามีกี่รายการมาเเสดง--> '.$xd.'
                        </span>
                    </span>
                    <br>
                        ';
                    }
                    ?>
                </div>
            </div>

            <div class="col-lg-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-2">

                        </div>
                        <div class="col-lg-3 mt-5">
                            <img src="image/addstock.JPG" style="width:330px; height: 230px;">
                            <a class="btn btn-outline-primary mt-2" type="button" href="addcateproduct.php" style="width: 120%;">เพิ่มประเภทสินค้า +</a>
                        </div>
                        <div class="col-lg-3 mt-5" style="margin-left: 4rem;">
                            <img src="image/issue.JPG" style="width:330px; height: 230px;">
                            <a class="btn btn-outline-primary mt-2" type="button" href="issueproduct.php" style="width: 120%;">เบิกสินค้าออกสต็อก -</a>
                        </div>
                        
                        <div class="col-lg-2">
                            
                        </div>


                        <div class="col-lg-2 mt-4">

                        </div>
                        <div class="col-lg-3 mt-4">
                            <img src="image/reportcate.JPG" style="width:330px; height: 230px;">
                            <a class="btn btn-outline-primary mt-2" type="button" href="reportcategory.php" style="width: 120%;">สรุปรายประเภทสินค้า</a>
                        </div>
                        <div class="col-lg-3 mt-4" style="margin-left: 4rem;">
                            <img src="image/reportdate.JPG" style="width:330px; height: 230px;">
                            <a class="btn btn-outline-primary mt-2" type="button" href="reportproduct.php" style="width: 120%;">สรุปข้อมูล รายวัน เดือน ปี </a>
                        </div>
                        <div class="col-lg-2 mt-4">
                            
                        </div>
                        
                    </div>
                </div>
             </div> 
</body>
</html>