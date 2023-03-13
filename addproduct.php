<?php
include "api.php";
if(isset($_GET['id'])) {
    $_SESSION['cate_id'] = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(23, 17, 94);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">เพิ่มสินค้าเข้าสต็อก</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navadmin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" >
                        <a class="btn btn-primary" type="button" href="managestock.php">HOME</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addcate">เพิ่มสินค้าเข้าสต็อก +</button>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-4">
                <div class="card" style="width:100%; background-color: rgb(171, 205, 236); border-radius: 30px;">
                    <h5 class="mb-5 mt-5" style="color:#fff; font-size:30px; margin-left: 60px; font-weight: bolder;">ข้อมูลการเพิ่มสินค้าในสต็อก</h5>
                </div>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
    </div>


    <div class="modal fade" id="addcate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มที่ประเภทสินค้า</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="card" style="background: linear-gradient(#beecff, #9198e5);">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6" style="border-radius: 20px;">     
                                    <img src="image/addband.png" style="width:120%; height: 400px; ">
                                 </div>
                                <div class="col-sm-6">

                                    <!--เพิ่มรายการสินค้าเข้าสต้อก-->
                                    <form action="addproduct.php" method="post">
                                         
                                             <form action="Index.php" method="post">

                                                 <div class="mb-3 mt-3">
                                                     <label for="categorywater" class="form-label">เลือกที่เพิ่มไว้</label>
                                                     <select id="cate" name="cate">
                                                        <?php 
                                                        $sql = "SELECT * FROM `category` WHERE 1";
                                                        $q = mysqli_query($conn, $sql);
                                                        while($row = mysqli_fetch_array($q)) {
                                                            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
                                                        }
                                                        ?>
                                                         
                                                     </select>
                                                 </div>
                 
                                                 <div class="mb-3">
                                                     <label for="typewater" class="form-label">ชื่อสินค้า</label>
                                                     <input class="form-control" id="typewater" name="typewater"  placeholder="ชื่อสินค้า.....">
                                                 </div>
                 
                 
                                                 <div class="mb-3">
                                                     <label for="Unit" class="form-label">จำนวนที่เพิ่มเข้า</label>
                                                     <input class="form-control" id="Unit" name="Unit"  placeholder="จำนวนที่เพิ่มเข้า.....">
                                                 </div>
                 
                                                 <div class="mb-3">
                                                     <label for="start">วันที่เพิ่มรายการ</label>
                                                     <input type="date" id="start" name="date" value="">
                                                 </div>
                                                 
                                                 <div class="mb-3">
                                                     <button class="btn btn-primary" type="submit" name="addwater" style="width: 100%;">เพิ่มข้อมูล</button>
                                                 </div>
                                             </form>
                                             <?php
                                             if(isset($_POST['addwater'])) {
                                                $name = $_POST['typewater'];
                                                $cate = $_POST['cate'];
                                                $unit = $_POST['Unit'];
                                                $date = $_POST['date'];
                                                $sql = "INSERT INTO `product`(`pro_id`, `name`, `cate_name`, `unit`, `date`, `total`) VALUES (NULL,'$name','$cate','$unit','$date','$unit')";
                                                mysqli_query($conn, $sql);
                                             }
                                             
                                             ?>
                                        </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>





                    <div class="container-fluid mt-3">
                        <table class="table table-primary table-hover">
                            <thead>
                                <!--โชว์รายการสินค้าที่เพิ่มเข้า-->
                                <tr>
                                    <th>ชื่อประเภทสินค้า</th>
                                    <th>ชื่อยี้ห่อสินค้า</th>
                                    <th>จำนวนสินค้า</th>
                                    <th>วันที่เพิ่มรายการ</th>
                                    <th>เเก้ไขรายการ</th>
                                    <th>ลบรายการ</th>
                                    <th>เพิ่มที่หมวดหมู่นี้</th>
                                </tr>
                            </thead>
                
                            <tbody>
                                <!--โชว์รายการสินค้าที่เพิ่มเข้า-->
                                <?php
                                
                                    if(isset($_GET['id'])) {
                                        $idca = $_GET['id'];
                                        $sql5 = "SELECT * FROM `category` WHERE `cate_id`='$idca'";
                                        $qc = mysqli_query($conn, $sql5);
                                        $fc = mysqli_fetch_array($qc);
                                        $names = $fc['name'];
                                        $sql = "SELECT * FROM `product` WHERE cate_name='$names'";
                                $q = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($q)) {
                                    echo '
                                    <tr>
                                    <td>'.$row['cate_name'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['unit'].'</td>
                                    <td>'.$row['date'].'</td>
                                  <!--ปุ่มเเก้ไขรายการ-->
                                    <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#Editwater-'.$row['pro_id'].'"><i class="fa-solid fa-pen-to-square"></i>เเก้ไขรายการ</button></td>
                                   <!--ปุ่มลบรายการ-->
                                    <td><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deletewater-'.$row['pro_id'].'"><i class="fa-solid fa-trash"></i>ลบรายการ</button></td>
                                   <!--ปุ่มเข้ารายการเดิม-->
                                    <td><button class="btn btn-info" style="color:#fff;" type="button" data-bs-toggle="modal" data-bs-target="#addwater-'.$row['pro_id'].'"><i class="fa-sharp fa-solid fa-cart-plus"></i>เพิ่มสินค้าเข้าสต็อก</button></td>
                                    </tr>

                                    <!--ป้อปอัพเเก้ไขรายการ-->       
                                    <div class="modal fade" id="Editwater-'.$row['pro_id'].'">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: rgb(198, 225, 255);">
                                                <h5 class="modal-title">เเก้ไขรายการ</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                            </div>
                            
                                            <div class="modal-body" style="background-color: rgb(198, 225, 255);">
                                                <form action="addproduct.php?id='.$fc['cate_id'].'" method="post">
                                                <label for="categorywater" class="form-label">เลือกที่เพิ่มไว้</label>
                                                <select id="cate" name="categorywater">
                                                ';                                            
                                                $sql4 = "SELECT * FROM `category` WHERE 1";
                                                $qsss = mysqli_query($conn, $sql4);
                                                while($row4 = mysqli_fetch_array($qsss)) {
                                                    echo '<option value="'.$row4['name'].'">'.$row4['name'].'</option>';
                                                }
    
                                                    echo '
                                                    </select>
                    
                                                    <div class="mb-3">
                                                        <label for="typewater" class="form-label">ชื่อสินค้า</label>
                                                        <input class="form-control" id="typewater" name="typewater"  placeholder="ชื่อสินค้า....." value="'.$row['name'].'">
                                                    </div>
                    
                    
                                                    <div class="mb-3">
                                                        <label for="Unit" class="form-label">จำนวนที่เพิ่มเข้า</label>
                                                        <input class="form-control" id="Unit" name="Unit"  placeholder="จำนวนที่เพิ่มเข้า....." value="'.$row['unit'].'">
                                                    </div>
                    
                                                    <div class="mb-3">
                                                        <label for="start">วันที่เพิ่มรายการ</label>
                                                        <input type="date" id="start" name="date" value="">
                                                    </div>
        
                                                    <div class="modal-footer" style="background-color: rgb(198, 225, 255);">
                                                        <button class="btn btn-outline-success" type="submit" name="conedit-'.$row['pro_id'].'">Confirm</button>
                                                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
        
                                    <!--ป้อปอัพลบรายการ-->       
                                    <div class="modal fade" id="deletewater-'.$row['pro_id'].'">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: rgb(255, 120, 120);">
                                               
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                            </div>
                            
                            
                                            <div class="modal-body"  style="background-color: rgb(255, 120, 120);">
                                                <form action="addproduct.php" method="post">
                                                    <h5 class="mb-5 mt-5" style="color:#fff; font-size: 30px; margin-left: 3rem;">คุณต้องการลบรายการนี้ใช่ไหม</h5> 
                                                    
                                                    <div class="modal-footer"   style="background-color: rgb(255, 120, 120);">
                                                        <button class="btn btn-outline-success" type="submit" name="delete-con-'.$row['pro_id'].'">Confirm</button>
                                                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="addwater-'.$row['pro_id'].'">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: rgb(198, 225, 255);">
                                            <h5 class="modal-title">เพิ่มที่หมวดหมู่นี้</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                        </div>
                        
                                        <div class="modal-body" style="background-color: rgb(198, 225, 255);">
                                            <form action="addproduct.php?id='.$fc['cate_id'].'" method="post">
                                            <label for="categorywater" class="form-label">เลือกที่เพิ่มไว้</label>
                                            <select id="cate" name="categorywater">
                                            ';                                            
                                            $sql3 = "SELECT * FROM `category` WHERE 1";
                                            $qss = mysqli_query($conn, $sql3);
                                            while($row3 = mysqli_fetch_array($qss)) {
                                                echo '<option value="'.$row3['name'].'">'.$row3['name'].'</option>';
                                            }

                                                echo '
                                                </select>

                                                <div class="mb-3">
                                                    <label for="typewater" class="form-label">ชื่อสินค้า</label>
                                                    <input class="form-control" id="typewater" name="typewater" placeholder="ชื่อสินค้า....." value="'.$row['name'].'">
                                                </div>
                
                
                                                <div class="mb-3">
                                                    <label for="Unit" class="form-label">จำนวนที่เพิ่มเข้า</label>
                                                    <input class="form-control" id="Unit" name="Unit" placeholder="จำนวนที่เพิ่มเข้า....." value="'.$row['unit'].'">
                                                </div>
                
                                                <div class="mb-3">
                                                    <label for="start">วันที่เพิ่มรายการ</label>
                                                    <input type="date" id="start" name="date">
                                                </div>
                                                <div class="modal-footer" style="background-color: rgb(198, 225, 255);">
                                                    <button class="btn btn-outline-success" type="submit" name="conadd-'.$row['pro_id'].'">Confirm</button>
                                                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    ';
                                    
                                    if(isset($_POST['conedit-'.$row['pro_id'].''])) {
                                        $name = $_POST['typewater'];
                                        $cate = $_POST['categorywater'];
                                        $unit = $_POST['Unit'];
                                        $date = $_POST['date'];
                                        $id = $row['pro_id'];
                                        $sql = "UPDATE `product` SET `name`='$name',`cate_name`='$cate',`unit`='$unit',`date`='$date' WHERE `pro_id`='$id'";
                                        mysqli_query($conn, $sql);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }

                                    if(isset($_POST['delete-con-'.$row['pro_id'].''])) {
                                        $id = $row['pro_id'];
                                        $sql = "DELETE FROM `product` WHERE `pro_id`='$id'";
                                        mysqli_query($conn, $sql);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }


                                    // wait fix this
                                    if(isset($_POST['conadd-'.$row['pro_id'].''])) {
                                        $name = $_POST['typewater'];
                                        $cate = $_POST['categorywater'];
                                        $unit = $_POST['Unit'];
                                        $date = $_POST['date'];
                                        $id = $row['pro_id'];
                                        $cacurate2 = $row['total'] + $unit;
                                        $cacurate = $row['unit'] + $unit;
                                        $sql2 = "UPDATE `product` SET `unit`='$cacurate', `total`='$cacurate2' WHERE `pro_id`='$id'";
                                        $sql = "INSERT INTO `issue`(`issue_id`, `name`, `cate_name`, `unit`, `date`) VALUES ('$id','$name','$cate','$unit','$date')";
                                        // mysqli_query($conn, $sql);
                                        mysqli_query($conn, $sql2);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    
                                }
                                    } else { // Check if id has been used push to new statement
                                        $sql = "SELECT * FROM `product` WHERE 1";
                                $q = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($q)) {
                                    echo '
                                    <tr>
                                    <td>'.$row['cate_name'].'</td>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row['unit'].'</td>
                                    <td>'.$row['date'].'</td>
                                  <!--ปุ่มเเก้ไขรายการ-->
                                    <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#Editwater-'.$row['pro_id'].'"><i class="fa-solid fa-pen-to-square"></i>เเก้ไขรายการ</button></td>
                                   <!--ปุ่มลบรายการ-->
                                    <td><button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#deletewater-'.$row['pro_id'].'"><i class="fa-solid fa-trash"></i>ลบรายการ</button></td>
                                   <!--ปุ่มเข้ารายการเดิม-->
                                    <td><button class="btn btn-info" style="color:#fff;" type="button" data-bs-toggle="modal" data-bs-target="#addwater-'.$row['pro_id'].'"><i class="fa-sharp fa-solid fa-cart-plus"></i>เพิ่มสินค้าเข้าสต็อก</button></td>
                                    </tr>

                                    <!--ป้อปอัพเเก้ไขรายการ-->       
                                    <div class="modal fade" id="Editwater-'.$row['pro_id'].'">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: rgb(198, 225, 255);">
                                                <h5 class="modal-title">เเก้ไขรายการ</h5>
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                            </div>
                            
                                            <div class="modal-body" style="background-color: rgb(198, 225, 255);">
                                                <form action="addproduct.php" method="post">
                                                <label for="categorywater" class="form-label">เลือกที่เพิ่มไว้</label>
                                                <select id="cate" name="categorywater">
                                                ';                                            
                                                $sql4 = "SELECT * FROM `category` WHERE 1";
                                                $qsss = mysqli_query($conn, $sql4);
                                                while($row4 = mysqli_fetch_array($qsss)) {
                                                    echo '<option value="'.$row4['name'].'">'.$row4['name'].'</option>';
                                                }
    
                                                    echo '
                                                    </select>
                    
                                                    <div class="mb-3">
                                                        <label for="typewater" class="form-label">ชื่อสินค้า</label>
                                                        <input class="form-control" id="typewater" name="typewater"  placeholder="ชื่อสินค้า....." value="'.$row['name'].'">
                                                    </div>
                    
                    
                                                    <div class="mb-3">
                                                        <label for="Unit" class="form-label">จำนวนที่เพิ่มเข้า</label>
                                                        <input class="form-control" id="Unit" name="Unit"  placeholder="จำนวนที่เพิ่มเข้า....." value="'.$row['unit'].'">
                                                    </div>
                    
                                                    <div class="mb-3">
                                                        <label for="start">วันที่เพิ่มรายการ</label>
                                                        <input type="date" id="start" name="date" value="">
                                                    </div>
        
                                                    <div class="modal-footer" style="background-color: rgb(198, 225, 255);">
                                                        <button class="btn btn-outline-success" type="submit" name="conedit-'.$row['pro_id'].'">Confirm</button>
                                                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
        
                                    <!--ป้อปอัพลบรายการ-->       
                                    <div class="modal fade" id="deletewater-'.$row['pro_id'].'">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: rgb(255, 120, 120);">
                                               
                                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                            </div>
                            
                            
                                            <div class="modal-body"  style="background-color: rgb(255, 120, 120);">
                                                <form action="addproduct.php" method="post">
                                                    <h5 class="mb-5 mt-5" style="color:#fff; font-size: 30px; margin-left: 3rem;">คุณต้องการลบรายการนี้ใช่ไหม</h5> 
                                                    
                                                    <div class="modal-footer"   style="background-color: rgb(255, 120, 120);">
                                                        <button class="btn btn-outline-success" type="submit" name="delete-con-'.$row['pro_id'].'">Confirm</button>
                                                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="addwater-'.$row['pro_id'].'">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: rgb(198, 225, 255);">
                                            <h5 class="modal-title">เพิ่มที่หมวดหมู่นี้</h5>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                        </div>
                        
                                        <div class="modal-body" style="background-color: rgb(198, 225, 255);">
                                            <form action="addproduct.php" method="post">
                                            <label for="categorywater" class="form-label">เลือกที่เพิ่มไว้</label>
                                            <select id="cate" name="categorywater">
                                            ';                                            
                                            $sql3 = "SELECT * FROM `category` WHERE 1";
                                            $qss = mysqli_query($conn, $sql3);
                                            while($row3 = mysqli_fetch_array($qss)) {
                                                echo '<option value="'.$row3['name'].'">'.$row3['name'].'</option>';
                                            }

                                                echo '
                                                </select>

                                                <div class="mb-3">
                                                    <label for="typewater" class="form-label">ชื่อสินค้า</label>
                                                    <input class="form-control" id="typewater" name="typewater" placeholder="ชื่อสินค้า....." value="'.$row['name'].'">
                                                </div>
                
                
                                                <div class="mb-3">
                                                    <label for="Unit" class="form-label">จำนวนที่เพิ่มเข้า</label>
                                                    <input class="form-control" id="Unit" name="Unit" placeholder="จำนวนที่เพิ่มเข้า....." value="'.$row['unit'].'">
                                                </div>
                
                                                <div class="mb-3">
                                                    <label for="start">วันที่เพิ่มรายการ</label>
                                                    <input type="date" id="start" name="date">
                                                </div>
                                                <div class="modal-footer" style="background-color: rgb(198, 225, 255);">
                                                    <button class="btn btn-outline-success" type="submit" name="conadd-'.$row['pro_id'].'">Confirm</button>
                                                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    ';
                                    
                                    if(isset($_POST['conedit-'.$row['pro_id'].''])) {
                                        $name = $_POST['typewater'];
                                        $cate = $_POST['categorywater'];
                                        $unit = $_POST['Unit'];
                                        $date = $_POST['date'];
                                        $id = $row['pro_id'];
                                        $sql = "UPDATE `product` SET `name`='$name',`cate_name`='$cate',`unit`='$unit',`date`='$date' WHERE `pro_id`='$id'";
                                        mysqli_query($conn, $sql);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }

                                    if(isset($_POST['delete-con-'.$row['pro_id'].''])) {
                                        $id = $row['pro_id'];
                                        $sql = "DELETE FROM `product` WHERE `pro_id`='$id'";
                                        mysqli_query($conn, $sql);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }


                                    // wait fix this
                                    if(isset($_POST['conadd-'.$row['pro_id'].''])) {
                                        $name = $_POST['typewater'];
                                        $cate = $_POST['categorywater'];
                                        $unit = $_POST['Unit'];
                                        $date = $_POST['date'];
                                        $id = $row['pro_id'];
                                        $cacurate2 = $row['total'] + $unit;
                                        $cacurate = $row['unit'] + $unit;
                                        $sql2 = "UPDATE `product` SET `unit`='$cacurate', `total`='$cacurate2' WHERE `pro_id`='$id'";
                                        $sql = "INSERT INTO `issue`(`issue_id`, `name`, `cate_name`, `unit`, `date`) VALUES ('$id','$name','$cate','$unit','$date')";
                                        // mysqli_query($conn, $sql);
                                        mysqli_query($conn, $sql2);
                                        echo "<meta http-equiv='refresh' content='0'>";
                                    }
                                    
                                }
                                    }
                                
                                
                                ?>



                                        
    
    
                                   

                            
    
                                <!--ป้อปเพิ่มเข้ารายการเดิม-->       



    
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>

          
        </div>
</body>
</html>