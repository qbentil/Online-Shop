<?php
    if(!isset($_GET['add_category'])){
    if(!isset($_GET['add_subcat'])){
    if(!isset($_GET['add_product'])){
    if(!isset($_GET['view_product'])){
    ?>
<div id="bodyRight">
        <?php if(isset($_GET['edit_cat'])){ require 'edit_cat.php';} ?>
        <?php if(isset($_GET['edit_subcat'])){ require 'edit_subcat.php';} ?>
        <?php if(isset($_GET['edit_product'])){ require 'edit_product.php';} ?>
        <?php if(isset($_GET['delete_cat'])){  include 'delete_cat.php'; }?>
        <?php if(isset($_GET['delete_subcat'])){  include 'delete_subcat.php'; } ?>
        <?php if(isset($_GET['delete_product'])){  include 'delete_product.php'; } ?>
</div><!--End of body right--> <br clear="all">
<?php } }} }?>