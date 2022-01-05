<?php include "include/dbconnect.php";?>
<?php
if(!isset($_SESSION['user'])){
  header("location: login.php?next=".$_SERVER['REQUEST_URI']);
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body>
    <?php include "include/header.php";?>
    <div class="container-fulid mt-3">
        <div class="row">
            <div class="col-3">
                <div class="list-group ">
                <?php
                    $callingCat=mysqli_query($connect,"select * from category");
                    while($cat=mysqli_fetch_array($callingCat)){
                ?>
                    <div class="list-group-item list-group-item-action  border-0 shadow-sm"><?= $cat['cat_title'];?></div>
               <?php }?>
                </div>
            </div>
            <div class="col-7 mx-auto">
                <div class="card">
                    <div class="card-header text-center fw-bold">Insert here book</div>
                    <div class="card-body">
                        <form action="" method ="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">author</label>
                                <input type="text" name="author" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Category</label>
                       
                                <select name="category" class="form-select">
                                <?php 
                                    $callingCat = mysqli_query($connect,"select * from category");
                                    while($cat = mysqli_fetch_array($callingCat)){
                                ?>
                                    <option value="<?= $cat['c_id'];?>"><?= $cat['cat_title'];?></option>
                                <?php } ?>
                                </select>
                            <div class="row">
                                <div class="col">
                                    <label for="">No Page</label>
                                    <input type="text" name="nop" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">Price</label>
                                    <input type="text" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="">Cover</label>
                                    <input type="file" name="cover" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="">ISBN</label>
                                    <input type="text" name="isbn" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="Submit" class="btn btn-success float-start">
                                <input type="reset" name="reset" class="btn btn-danger float-end">
                            </div>
                        </form>
                    <?php 
                        if(isset($_POST['Submit'])){

                           $title=$_POST['title'];
                            $author=$_POST['author'];
                        
                            $nop=$_POST['nop'];
                            $price=$_POST['price'];
                            $category=$_POST['category'];
                            $isbn=$_POST['isbn'];
                            //image work
                            $cover=$_FILES['cover']['name'];
                            $tmp_cover=$_FILES['cover']['tmp_name'];
                            move_uploaded_file($tmp_cover,"images/$cover");
                            $query = mysqli_query($connect,"insert into cws_book(title,author,nop,price,cat_id,isbn,cover) value ('$title',
                            '$author','$nop','$price','$category','$isbn','$cover')");
                        
                             if($query){
                            
                                 echo "<script>window.open('index.php','_self')</script>";
                             }
                             else{
                                 echo"fail";
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