<?php
include "api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Product</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    <nav class="navbar navbar-expand-sm" style="background-color: rgb(23, 17, 94);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="font-size: 20px; font-weight: bolder; color: #fff;">Report Product</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navadmin">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item" style="margin-left: 10px;">
                        <a class="btn btn-primary" type="button" href="managestock.php">HOME</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-4">

            </div>
            <div class="col-lg-5">
                <div class="card" style="width:100%; background-color: rgb(171, 205, 236); border-radius: 30px;">
                    <h5 class="mb-5 mt-5" style="color:#fff; font-size:30px; margin-left: 50px; font-weight: bolder;">สรุปข้อมูลคลังสินค้า รายประเภทสินค้า</h5>
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
                          

                         
                            <div class="container-fluid ">
                                <div class="row">
                                    <div class="col-lg-4">

                                    </div>

                                    <div class="col-lg-4">
                                    </div>
                                    <div class="col-lg-4">
                                        
                                    </div>
                                 
                                    <form action="reportproduct.php" method="post">
                                        <div class="container-fluid mt-4">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                                    <label for="dateday" class="form-label">สรุปข้อมูลสินค้ารายวัน</label>
                                                    <select id="dateday" name="dateday">
                                                        <option value="NULL"></option>
                                                        <?php
                                                             $sql = "SELECT DISTINCT date as ds, DAY(date) as d FROM issue WHERE 1";
                                                             $q = $conn -> query($sql);
                                                             while($row = $q -> fetch_assoc()) {
                                                                     echo '<option value="'.$row['d'].'">'.$row['ds'].'</option>';
                                                                           }
                                                            ?>
                                                    </select>
                                                </div>
                                                
                                
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                                    <label for="datemonth" class="form-label">สรุปข้อมูลสินค้ารายเดือน</label>
                                                    <select id="datemonth" name="datemonth">
                                                    <option value="NULL"></option>
                                                    <?php
                                                          $sql = "SELECT DISTINCT MONTH(date) as m FROM issue WHERE 1";
                                                         $q = $conn -> query($sql);
                                                                while($row = $q -> fetch_assoc()) {
                                                                     $month = "";
                                                                     if($row['m'] == 1) {
                                                                        $month = "มกราคม";
                                                                    }
                                                                    if($row['m'] == 2) {
                                                                        $month = "กุมภาพันธ์";
                                                                    }
                                                                    if($row['m'] == 3) {
                                                                        $month = "มีนาคม";
                                                                    }
                                                                    if($row['m'] == 4) {
                                                                        $month = "เมษายน";
                                                                    }
                                                                    if($row['m'] == 5) {
                                                                        $month = "พฤษภาคม";
                                                                    }
                                                                    if($row['m'] == 6) {
                                                                        $month = "มิถุนายน";
                                                                    }
                                                                    if($row['m'] == 7) {
                                                                        $month = "กรกฎาคม";
                                                                    }
                                                                    if($row['m'] == 8) {
                                                                        $month = "สิงหาคม";
                                                                    }
                                                                    if($row['m'] == 9) {
                                                                        $month = "กันยายน";
                                                                    }
                                                                    if($row['m'] == 10) {
                                                                        $month = "ตุลาคม";
                                                                    }
                                                                    if($row['m'] == 11) {
                                                                        $month = "พฤศจิกายน";
                                                                    }
                                                                    if($row['m'] == 12) {
                                                                        $month = "ธันวาคม";
                                                                    }
                                                                    echo '<option value="'.$row['m'].'">'.$month.'</option>';
                                                                }
                                                                ?>
                          
                                                     </select>
                                                  
                                                </div>
                                
                                                   
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                                    <label for="dateyear" class="form-label">สรุปข้อมูลสินค้ารายปี</label>
                                                    <select id="dateyear" name="dateyear">
                                                    <option value="NULL"></option>
                                                    <?php
                                                         $sql = "SELECT DISTINCT YEAR(date) as y FROM issue WHERE 1";
                                                         $q = $conn -> query($sql);
                                                         while($row = $q -> fetch_assoc()) {
                                                             echo '<option value="'.$row['y'].'">'.$row['y'].'</option>';
                                                         }
                                                    ?>
                        
                                                    </select>
                                                </div>
                                                    
                                                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                                                    <button class="btn btn-outline-primary" type="submit" name="search">ค้นหาข้อมูล</button>
                                                </div>
                                            </div>
                                        </div>
                                      
                                           
                                       
                                    </form>
                              
                                    
                                </div>
                            </div>




                            <div class="container-fluid mt-3">
                                <table class="table table-primary table-hover">
                                    <thead>
                                        <tr>
                                            <th>วันที่</th>
                                            <th>รหัสเบิกออก</th>
                                            <th>ชื่อประเภทสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th style="background-color: rgb(255, 187, 0);">จำนวนทั้งหมด</th>
                                            <th style="background-color: rgb(255, 69, 69);">จำนวนเบิกออก</th>
                                            <th style="background-color: rgb(0, 188, 50);">คงเหลือ</th>

                                        </tr>
                                    </thead>
                        
                                    <?php
                                         if($_SERVER['REQUEST_METHOD'] == "GET") {
                                            $day = DATE("d");
                                            $sql = "SELECT * FROM `issue` WHERE 1";
                                            if($result = $conn -> query($sql)) {
                                                while($row = $result -> fetch_assoc()) {
                                                    $idss = $row['issue_id'];
                                                    $sql3 = "SELECT * FROM `product` WHERE `pro_id`='$idss'";
                                                    $qs = mysqli_query($conn, $sql3);
                                                    $f = mysqli_fetch_array($qs);
                                                   
                                                    echo '
                                                    <tr>
                                                    <td>'.$row['date'].'</td>
                                                    <td>'.$row['id'].'</td>
                                                    <td>'.$row['cate_name'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['t_c'].'</td>

                                                    <td>'.$row['unit'].'</td>
                                                    <td>'.$row['total'].'</td>

                                                </tr>
                                                    ';
                                                }
                                            }
                                        }

                                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                                            if(isset($_POST['search'])) {
                                                $day = $_POST['dateday'];
                                                $month = $_POST['datemonth'];
                                                $year = $_POST['dateyear'];
    
                                                $d = "";
                                                $m = "";
                                                $y = "";
                                                if($day == "NULL") {
                                                    $d = "";
                                                } else {
                                                    $d = "='$day'";
                                                }
                                                if($month == "NULL") {
                                                    $m = "";
                                                } else {
                                                    $m = "='$month'";
                                                }
                                                if($year == "NULL") {
                                                    $y = "";
                                                }else {
                                                    $y = "='$year'";
                                                }

                                                $sql = "SELECT * FROM `issue` WHERE DAY(date)$d AND MONTH(date)$m AND YEAR(date)$y";
                                                $q = $conn -> query($sql);
                                                while($row = $q -> fetch_assoc()) {
                                                    $idss = $row['issue_id'];
                                                    $sql3 = "SELECT * FROM `product` WHERE DAY(date)$d AND MONTH(date)$m AND YEAR(date)$y AND `pro_id`='$idss'";
                                                    $qs = mysqli_query($conn, $sql3);
                                                    $f = mysqli_fetch_array($qs);
                                                    echo '
                                                    <tr>
                                                    <td>'.$row['date'].'</td>
                                                    <td>'.$row['id'].'</td>
                                                    <td>'.$row['cate_name'].'</td>
                                                    <td>'.$row['name'].'</td>
                                                    <td>'.$row['t_c'].'</td>
                                                    
                                                    <td>'.$row['unit'].'</td>
                                                    <td>'.$row['total'].'</td>
                                                </tr>
                                                    ';
                                                }
    
                                            }
                                        }
                                        ?>
                                           
                                </table>

                              
                           

                        </div>
                   </div>
            </div>
        </div>
    </div>
                        

</body>
</html>