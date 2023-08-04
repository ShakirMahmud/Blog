<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }

    include "logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Blog using PHP & MySQL</title>
</head>
<body>

   <div class="container mt-5">
        <div class = "navbar justify-content-between">
            <div id = "left_side">
                
            </div>
            
            <div id="right_side">
                <p> <a href="logout.php" class="btn btn-danger btn-sm ml-2" style="color: white;">logout</a> </p>
            </div>   
        </div>

        <?php if($query->num_rows > 0){ ?>
                
            <?php foreach($query as $q){?>
                <div class="bg-white p-5 rounded-lg text-dark text-center">
                    <h1><?php echo $q['title'];?></h1>

                    <?php if(isset($q['author_id']) && $q['author_id'] == $_SESSION['user_id']){ ?>
                        <div class="d-flex mt-2 justify-content-center align-items-center">
                            <a href="edit.php?id=<?php echo $q['id']?>" class="btn btn-dark btn-sm" name="edit">Edit</a>
                            <form method="POST">
                                <input type="text" hidden value='<?php echo $q['id']?>' name="id">
                                <button class="btn btn-danger btn-sm ml-2" name="delete">Delete</button>
                            </form>
                        </div>
                    <?php } ?>

                </div>
                <p class="mt-5 border-left border-dark pl-3"><?php echo $q['content'];?></p>
            <?php } ?>
        <?php }else{ ?>
            <div class="alert alert-danger" role="alert">
                No posts found
            </div>
        <?php } ?>    

        <a href="index.php" class="btn btn-dark text-white btn-outline-dark my-3">Go Home</a>
   </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>