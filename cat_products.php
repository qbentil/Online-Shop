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

</head>
<body>
    
    <?php
        include './inc/function.php'; 
        include './inc/header.php'; 
        include './inc/navbar.php'; 
        // BOdy Left content
        echo "<div id  = 'bodyLeft'><ul>";
        cat_products();
        subcat_products(); 
        men();
        women();
        kids();
        echo"</ul></div>"; 
        // body Right content
    if(isset($_GET['cat_id']) || isset($_GET['subcat_id'])){
        echo "<div id  = 'bodyRight' class  = 'bodyRight'><ul>";
        view_all_subcat();
        view_all_cat(); 
        echo"</ul></div><br clear = 'all'>"; 
    }else{
        include './inc/bodyright.php';
    }

        include './inc/footer.php';
        echo  add_cart();
    ?>


</body>
</html>