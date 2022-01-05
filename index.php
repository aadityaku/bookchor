<?php include "include/dbconnect.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookChor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

</head>
<body class="bg-light">
<?php include "include/header.php";?>
<div class="container-fulid mt-3">
    <div class="row mt-2">
        <div class="col-3">
            <div class="list-group ">
                <?php
             
                $callingCat=mysqli_query($connect,"select * from category ");
                while($cat=mysqli_fetch_array($callingCat)){
                ?>
                <a href="index.php?cat_id=<?= $cat['c_id'];?>" class="list-group-item list-group-item-action  border-0 shadow-sm"><?= $cat['cat_title'];?></a>
               <?php }?>
            </div>
        </div>
        <div class="col-9">
           <div class="row">
               <?php
                
               if(isset($_GET['find'])){
                   $search=$_GET['search'];
                   $query=mysqli_query($connect,"select * from cws_book where title LIKE '%$search%'
                   ORDER by id desc");

               }
               elseif(isset($_GET['cat_id'])){
                    $c_id=$_GET['cat_id'];
                    $query=mysqli_query($connect,"select * from cws_book where cat_id='$c_id'
                   ORDER by id desc");

            }
               else{
                $query=mysqli_query($connect,"select * from cws_book order by id DESC");
               }
              
               while($call=mysqli_fetch_array($query)){

             
               ?>
               <div class="col-3 mt-2">
                   <div class="card border-0 shadow-sm">
                       <img src="images/<?= $call['cover'];?> " alt="" class="card-img-top" style="height:205px;object-fit:cover;">
                       <div class="card-body">
                            <h6 class="fw-bold h5 text-truncate"><?= $call['title'];?></h6>
                            <p class="small fw-bold text-uppercase text-primary"><?= $call['author'];?></p>
                            <a href="" class="btn btn-dark">Know more</a>
                       </div>
                   </div>
               </div>
               <?php }?>
           </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>