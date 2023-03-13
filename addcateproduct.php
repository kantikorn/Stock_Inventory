<?php
include "api.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
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
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addcate">เพิ่มที่ประเภทสินค้า +</button>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

        <!--ป้อปอัพเพิ่มประเภทสินค้า-->       
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
                                <div class="col-sm-12">
                               
                                </div>
                                <div class="col-sm-6 mt-2" style="border-radius: 20px; margin-left: -1rem; ">
                                  
                                   <img src="image/login.png" style="width: 120%; height: 200px; ">
                                </div>
                
                                <div class="col-sm-6" style="margin-left: 1rem;">
                                    <form action="addcateproduct.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3 mt-3">
                                            <label for="category" class="form-label">ประเภทสินค้า</label>
                                            <input class="form-control" id="category" name="category" style="width: 80%;" placeholder="ประเภทสินค้า.....">
                                        </div>
                                        <div class="mb-3 mt-3">
                                            <label for="img" class="form-label">รูปถาพประเภทสินค้า</label>
                                            <input type="file" class="form-control" id="img" name="img" >
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit" name="addwater" style="width: 100%;">เพิ่มข้อมูล</button>
                                        </div>
                                      

                                        </div>

                                    </form>
                                    <?php
                                    if(isset($_POST['addwater'])) {
                                        $name = $_POST['category'];
                                        $content = file_get_contents($_FILES['img']['tmp_name']);
                                        $base64 = 'data:image/png;base64,' . base64_encode($content);
                                        $sql = "INSERT INTO `category`(`cate_id`, `name`, `image`) VALUES (NULL,'$name','$base64')";
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


    <div class="container-fluid mt-4">

        <div class="row">
                <!--card โชว์ประเภทสินค้า **เพิ่มประเภทสินค้าก่อนไปเพิ่มรายการสินค้าในประเภทนั้นๆ-->    
                <?php 
                $sql = "SELECT * FROM `category` WHERE 1";
                $q = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($q)) {
                    echo '
                    <div class="col-lg-3">
                    <div class="card" style="width:100%; background-color: #333;">
                        <img src="'.$row['image'].'" class="rounded-circle mt-3 mb-1" style="width:230px; height: 230px; margin-left: 2rem;">
                        <div class="card-body">
                            <h4 class="card-title" style="color:#fff;">'.$row['name'].'</h4>
                            <hr style="color:#fff;">
                            <form class="d-flex">
                                <a class="btn btn-warning" type="button" href="addproduct.php?id='.$row['cate_id'].'" style="width:100%;">เพิ่มสินค้าเข้าสต็อก</a>
                                <a class="btn btn-danger" type="button" href="" style="width:100%; margin-left: 10px;"  data-bs-toggle="modal" data-bs-target="#deletecate-'.$row['cate_id'].'">ลบประเภทนี้</a>
                            </form>
                           
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deletecate-'.$row['cate_id'].'">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: rgb(255, 92, 92);">
                               
                                <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                            </div>
            
            
                            <div class="modal-body"  style="background-color: rgb(255, 92, 92);">
                                <form action="addcateproduct.php" method="post">
                                    <h5 class="mb-5 mt-5" style="color:#fff; font-size: 30px; margin-left: 3rem;">คุณต้องการลบรายการนี้ใช่ไหม</h5> 
                                    
                                    <div class="modal-footer"   style="background-color: rgb(255, 92, 92);">
                                        <button class="btn btn-outline-success" type="submit" name="delete-con-'.$row['cate_id'].'">Confirm</button>
                                        <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Cancle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    ';
                    if(isset($_POST['delete-con-'.$row['cate_id'].''])) {
                        $id = $row['cate_id'];
                        $sql = "DELETE FROM `category` WHERE `cate_id`='$id'";
                        mysqli_query($conn, $sql);
                        echo "<meta http-equiv='refresh' content='0'>";
                    }
                }
                ?>   
        </div>
    </div>

    


            
</body>
</html>
