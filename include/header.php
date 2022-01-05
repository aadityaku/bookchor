<nav class="navbar navbar-expand-lg navbar-dark bg-warning py-4">
    <div class="container">
       <a href="" class="navbar-brand">BookChor</a>
       <form action="" class="d-flex">
           <div class="input-group">
               <input type="text" class="form-control" size="70" placeholder="Search By Title ,ISBN,Author" name="search">
               <input type="submit" class="btn btn-dark ms-2" name="find">
           </div>
       </form>
       <ul class="navbar-nav ">
           <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
         

           <?php if(isset($_SESSION['user'])){?>
            <li class="nav-item"><a href="./logout.php" class="nav-link text-white">Logout</a></li>
           <?php } else{?>
          
           <li class="nav-item"><a href="login.php" class="nav-link text-white">Login</a></li>
           <li class="nav-item"><a href="create_account.php" class="nav-link text-white">Register</a></li>
           <?php }?>
           <li class="nav-item"><a href="add_book.php" class="btn btn-dark btn-sm ms-3 mt-1">Add book</a></li>
       </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-0 text-light">
    <div class="container">
    <ul class="navbar-nav small">
    <?php
                $callingCat=mysqli_query($connect,"select * from category ORDER BY rand()");
                while($cat=mysqli_fetch_array($callingCat)){
                ?>
               
               
           <li class="nav-item"><a href="index.php?cat_id=<?= $cat['c_id'];?>" class="nav-link"><?= $cat['cat_title'];?></a></li>
           <?php }?>
       </ul>
      
    </div>
</nav>