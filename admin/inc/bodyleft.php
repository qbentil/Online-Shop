<div id="bodyLeft">
    <h3>Store Management</h3>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?add_category">Manage Categories</a></li>
        <li><a href="index.php?add_subcat">Manage Sub Categories</a></li>
        <li><a href="index.php?add_product">Manage Products</a></li>
        <li><a href="index.php?view_product">View Products</a></li>
        <!-- <li><a href="#">Home</a></li> -->
    </ul>
</div><!--End of body left-->

<?php 
    if(isset($_GET['add_category'])){
        require 'cat.php';
    }
    if(isset($_GET['add_subcat'])){
        require 'subcat.php';
    }
    if(isset($_GET['add_product'])){
        require 'add_products.php';
    }
    if(isset($_GET['view_product'])){
        require 'view_product.php';
    }
?>