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
                                    <input type="email" class="form-control" id="email" placeholder="enter email" name="email">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" placeholder="enter Password" name="password">
                                    <label for="password">Password</label>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-success w-100" name="login">
                                </div>
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['login'])){
                            $email=$_POST['email'];
                            $password=sha1($_POST['password']);

                            $query=mysqli_query($connect,"select * from accounts where email='$email' AND password='$password'");

                            $count=mysqli_num_rows($query);
                            if($count > 0){
                                $_SESSION['user']=$email;
                                if(isset($_GET['next'])){
                                    $link = $_GET['next'];
                                    header("location: $link");
                                    die();
                                }
                                else{
                                    header('location: index.php');
                                    die();
                                }
                               
                            }
                            else{
                                echo "<script>alert('Email and Password not match')</script>";
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