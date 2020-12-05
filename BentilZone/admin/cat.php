<?php include './inc/function.php'; ?>
<div id = "bodyRight">
<h3>Show all Categories</h3>
<form action="" method="POST" autocomplete = "off" enctype="multipart/form-data">
    <table >
        <tr>
            <th>Sr No.</th>
            <th>Categrory Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
            <?php echo view_cat(); ?>
    </table>
</form>
<h3 id="add-cat">Add New Cartegory from Here</h3>
    <form  method="POST" autocomplete = "off" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Enter Cartegory Name: </td>
                <td><input type="text" name = "cat_name" Placeholder = "Enter Category name"></td>
            </tr>
        </table>
        <center>
            <button type = "submit" name = "add_cat">Add Category</button>
        </center>
    </form>
</div>

<?php echo add_cat(); ?>