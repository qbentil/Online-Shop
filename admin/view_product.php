<?php 
    require './inc/db_config.php' ;
    include './inc/function.php';
?>
<div class = "pro" id = "bodyRight">
<h3 id="scroll">Show all Products</h3>
<form id="view_pro" method="POST" autocomplete = "off" enctype="multipart/form-data">
    <table>
        <tr>
            <th>Sr No.</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Product Name</th>
            <th>Product Images</th>
            <th>Feature 1</th>
            <th>Feature 2</th>
            <th>Feature 3</th>
            <th>Feature 4</th>
            <th>Price (GHC)</th>
            <th>Model No.</th>
            <th>Warranty</th>
            <th>Keyword</th>
            <th>Date Added</th>
        </tr>
            <?php echo  view_product(); ?>
    </table>
</form>
</div>