<?php   include './inc/function.php';?>
<div id = "bodyRight">
    <h3>Show all Sub Categories</h3>
    <form action="" method="POST" autocomplete = "off" enctype="multipart/form-data">
        <table >
            <tr>
                <th>Sr No.</th>
                <th>Categrory Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
                <?php echo view_subcat(); ?>
        </table>
    </form>  
<h3 id="add-cat">Add New Sub Cartegory from Here</h3>
<form action="" method="POST" autocomplete = "off">
        <table>
            <tr>
                <td>Select Category: </td>
                <td>
                    <select name="main_cat" id="">
                        <option disabled selected>--Select main category--</option>
                        <?php echo fetch_cat(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Sub Cartegory Name: </td>
                <td><input type="text" name = "cat_name" Placeholder = "Enter sub category name"></td>
            </tr>
        </table>
        <center>
            <button type = "submit" name = "add_subcat">Add sub category</button>
        </center>
    </form>
</div>
<?php echo add_sub_cat(); ?>