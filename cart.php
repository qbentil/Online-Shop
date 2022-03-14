<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bentil'sZone || Online Mall</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/pe.css">
        <!-- online css -->
    <link rel="stylesheet" href="./assets/boostrap.min.css">
    <link rel="stylesheet" href="./assets/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="./assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/fontawesome/scss/_animated.scss">
    <link rel="stylesheet" href="./assets/fontawesome/scss/_icons.scss">

</head>
<body>
    
    <?php
        include './inc/function.php'; 
        include './inc/header.php'; 
        include './inc/navbar.php';
    ?>
    <?php 
        if(isset($_GET['remove'])){
            echo "
            <form id = 'alertForm' method='POST'>
            <center>
            <h4><i>Warning: </i><strong>Deleted Records cannot be restored</strong></h4>
            <p>Proceed to delete Cart Product?</p>
            </center>
            <button type='submit'  name='1' id='ok'>Proceed</button>
            <button type='submit' name='0' id = 'can'>Cancel</button>
            </form>
            ";
        }
    
    ?>
    <div class="cart">
        <form method="post" enctype='multipart/form-data' >
            <table cellpadding="0" cellspacing="0">
                <?php cart_details();delete_cart(); ?>
            </table>
        </form>
    </div>
    <?php include './inc/footer.php';?>


</body>
</html>