<?php 
// session_start();
    if (isset($_POST['logout'])) {
        # code...
        session_reset();
        session_unset();
        session_destroy();
        $message = "Bye for now!";
       header("location: login.php?success=$message");
       exit();
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo MAIN_URL; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo MAIN_URL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo MAIN_URL; ?>/css/dataTables.bootstrap.min.css">
<link rel="Shortcut Icon" href="favicon.ico">
<link rel="icon" type="image/png" href="<?php echo MAIN_URL; ?>/images/favicon.png">

    <title>Biisoft - Food & Beverage</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Biisoft <sup>F&B</sup> </h1>
            <small class="text-white bg-dark">"&nbsp;Restaurant Management Made Easy!&nbsp;"</small>
            <nav class="float-right">
                <!-- d-sm-none -->
                <?php 
                if ($_SESSION['ROLE'] == 1) {
                    # SHow the full Nav bars
                ?>
<p>
               <a href="<?php echo MAIN_URL."/pos.php"; ?>">POS</a> | <a href="<?php echo MAIN_URL."/cat.php"; ?>">Categories</a> | <a href="<?php echo MAIN_URL."/drinks.php"; ?>">Drinks Panel</a> | <a href="<?php echo MAIN_URL."/food.php"; ?>">Food Panel</a> | <a href="<?php echo MAIN_URL."/index.php"; ?>">Reports</a> |&nbsp;<a href="<?php echo MAIN_URL."/smanage.php"; ?>">Staff Management</a>&nbsp;&nbsp;
               <form action="" method="POST">
                   <input type="submit" name="logout" value="Logout" class="float-right btn btn-danger">
               </form>

                </p>
                <?php 
                }elseif ($_SESSION['ROLE'] == 2) {
                    # show the custom menu for an Accountant...
                    ?>
<p>
                <a href="<?php echo MAIN_URL."/drinks.php"; ?>">Drinks Panel</a> | <a href="<?php echo MAIN_URL."/food.php"; ?>">Food Panel</a> | <a href="<?php echo MAIN_URL."/sales.php"; ?>">Sales Report</a>&nbsp;&nbsp;
               <form action="" method="POST">
                   <input type="submit" name="logout" value="Logout" class="float-right btn btn-danger">
               </form>

                </p>
                <?php }elseif ($_SESSION['ROLE'] == 3) {
                    # cashier navigation 
                ?>
<p>
               <a href="<?php echo MAIN_URL."/pos.php"; ?>">POS</a> | <a href="<?php echo MAIN_URL."/store.php"; ?>">Drinks Store</a>&nbsp;&nbsp;
               <form action="" method="POST">
                   <input type="submit" name="logout" value="Logout" class="float-right btn btn-danger">
               </form>

                </p>
                <?php }
                 ?>
                
            </nav>
            
        </div>
        </div>
        