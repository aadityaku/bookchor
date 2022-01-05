<?php include "include/dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logic Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <?php include "include/header.php";?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-5 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h1 class="lead mb-3">Login Here</h1>
                        <form action="" method="post">
                            <div class="mb-3">
                                <div class="form-floating mb-3">
                                    <input type="name" class="form-control" id="name" placeholder="enter name" name="name">
                                    <label for="name">Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="contact" placeholder="enter contact" name="contact">
                                    <label for="contact">contact</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="enter email" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-success w-100" name="create">
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['create'])){
                            $name=$_POST['name'];
                            $contact=$_POST['contact'];
                            $email=$_POST['email'];
                            $password=sha1($_POST['password']);
                            $query=mysqli_query($connect,"insert into accounts(name,contact,email,password) value
                            ('$name','$contact','$email','$password')");
                            if($query){
                             echo "<script>window.open('login.php','_self')</script>";
                            }

                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>