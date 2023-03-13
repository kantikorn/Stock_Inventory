<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Stock</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <style>
        .container-form{
            width: 100%;
            height: 100vh;
            background: linear-gradient(#c9d2ff, #0b1b5a);
        }
        .card1{
            width: 500px;
            margin-top: 10rem;
            margin-left: 32rem;
            border-radius: 20px;
        }
        .card{
           width: 500px;
           margin-top: 1rem;
           margin-left: 32rem;
           border-radius: 20px;
       }
       .btnlogin{
            color:#fff; background:  linear-gradient(#c9d2ff, #0b1b5a); width: 170px; border-radius: 10px; margin-left: 20px; border-color: #fff;
        }
    </style>
</head>
<body>
    <script src="js/bootstrap.min.js"></script>
    
    <div class="container-form">
               
        <div class="row">
            <div class="col-lg-12">
               <div class="card1" style="background-color: #fff;">
                <form class="d-flex">
                    <h3 class="headtext" style="color:#061135; font-weight: bolder; padding-top: 1rem; padding-bottom: 1rem; padding-left: 10px;">เข้าสู่ระบบจัดการ สต็อกสินค้า</h3>
                    <i class="fa-solid fa-user" style="font-size: 30px; padding-left: 20px; padding-top: 20px;"></i>
                </form>
                   
               </div>
            </div>  


            <div class="col-lg-12">
                <div class="card" style=" background:  linear-gradient(#c9d2ff, #4960b9);">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6" style="border-radius: 20px; margin-left: -1rem; ">
                                  
                                <img  src="image/login.png" style="width: 200px; height: 250px; margin-left: -0.5rem; ">
                             </div>
             
                             <div class="col-sm-6">
                                <!--form เข้าสู่ระบบ-->
                                 <form action="login.php" method="post">
                                     <div class="mb-3 mt-3">
                                         <label for="email" class="form-label">email</label>
                                         <input class="form-control" id="email" name="email" placeholder="กรอกอีเมลล์ของคุณ....">
                                     </div>
                                     <div class="mb-3 mt-3">
                                         <label for="password" class="form-label">Password</label>
                                         <input class="form-control" id="password" name="password" placeholder="กรอกรหัสผ่านของคุณ....">
                                     </div>

                                     <button class="btnlogin mb-3 mt-3" type="submit" id="logins">เข้าสู่ระบบ</button>
    </form>
    <script>
        $(document).ready(function() {
            $("#logins").click(function(e) {
                const email = $("#email").val();
                const password = $("#password").val();
                e.preventDefault();
                $.ajax({
                    url: "api.php",
                    type: "post",
                    data: `login=&email=${email}&password=${password}`,
                    success: function(res) {
                        const data = JSON.parse(res);
                        window.location.href=data.location;
                    }
                })
            })
        })

    </script>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
</body>
</html>