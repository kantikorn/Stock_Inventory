<?php
include "api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(23, 17, 94);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">เบิกสินค้าออกจากสต็อก</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navadmin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="managestock.php">HOME</a>
                    </li>
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="addproduct.php">เพิ่มสินค้า</a>
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

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12" >
              
                   <div class="container-fluid mt-4" >
                        <div class="row">
                        




                            <div class="container-fluid mt-3">
                                <table class="table table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>จำนวน</th>
                                            <th>วันที่เบิกออก</th>
                                            <th>เบิกสินค้าออกจากสต็อก</th>

                                        </tr>
                                    </thead>
                        
                                    <tbody>
                                        <?php
                         
                                            $sql = "SELECT * FROM `product` WHERE 1";
                                            $q = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_array($q)) {
                                                echo '
                                                <tr>
                                                <td>'.$row['cate_name'].'</td>
                                                <td>'.$row['name'].'</td>
                                                <td>'.$row['unit'].'</td>
                                                <td>'.$row['date'].'</td>
                                                <td><button class="btn" style="background-color: rgb(80, 127, 171); color:#fff;" type="button" data-bs-toggle="modal" data-bs-target="#issue-'.$row['pro_id'].'" style="color:#ffffff;"><i class="fa-sharp fa-solid fa-right-from-bracket"></i>เบิกสินค้าออกสต็อกสินค้า</button></td>  
                                            </tr>

                                            <div class="modal fade" id="issue-'.$row['pro_id'].'">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: rgb(198, 225, 255);">
                                                        <h5 class="modal-title">เบิกสินค้าออกจากสต็อกสินค้า</h5>
                                                        <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                                                    </div>
                                    
                                                    <div class="modal-body" style="background-color: rgb(198, 225, 255);">
                                                        <form action="issueproduct.php" method="post">
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
                                                                <input class="form-control" id="typewater" name="typewater"  value="'.$row['name'].'">
                                                            </div>
                            
                            
                                                            
                                                            <div class="mb-3 mt-3">
                                                                <label for="Unit" class="form-label">จำนวนที่เบิกออก</label>
                                                                <input class="form-control" id="Unit" name="Unit"  style="background-color: rgb(255, 88, 88); color:#fff;" value="'.$row['unit'].'">
                                                            </div>
                            
                                                            <div class="mb-3">
                                                                <label for="start">วันที่เบิกสินค้าออก</label>
                                                                <input type="date" id="start" name="date" value="">
                                                            </div>
                                                            
                                                            
                                                          
                                                            <div class="modal-footer" style="background-color: rgb(198, 225, 255);">
                                                                <button class="btn btn-outline-success" type="submit" name="conissue-'.$row['pro_id'].'">Confirm</button>
                                                                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                                            </div>
                                                 
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                                ';
                                                if(isset($_POST['conissue-'.$row['pro_id'].''])) {
                                                    $cate = $_POST['categorywater'];
                                                    $name = $_POST['typewater'];
                                                    $unit = $_POST['Unit'];
                                                    $cacurate = $row['unit'] - $unit;
                                                    $date = $_POST['date'];
                                                    $id = $row['pro_id'];
                                                    $t = $row['unit'];
                                                    
                                                    $sql2 = "UPDATE `product` SET `unit`='$cacurate', `date`='$date'  WHERE `pro_id`='$id'";
                                                    
                                                    $sql = "INSERT INTO `issue`(`issue_id`, `name`, `cate_name`, `unit`, `date`, `id`, `total`, `t_c`) VALUES ('$id','$name','$cate','$unit','$date',NULL,'$cacurate', '$t')";
                                                    mysqli_query($conn, $sql);
                                                    mysqli_query($conn, $sql2);
                                                    echo "<meta http-equiv='refresh' content='0'>";
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