<?php 
    require './inc/db_config.php' ;
    include './inc/function.php';
?>
<div id = "bodyRight">
    <h3>Add New Product from Here</h3>
    <form action='' method='POST' autocomplete = 'off' enctype='multipart/form-data'>
        
        <table>
            <tr>
                <td>Enter Product Name: </td>
                <td><input type='text' name = 'pro_name' Placeholder = 'Enter product name'></td>
            </tr>
            <tr>
                <td>Select Category: </td>
                <td>
                    <select name='main_cat' id=''>
                        <option disabled selected>--Select main category--</option>
                        <?php echo fetch_cat(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select Sub Category: </td>
                <td>
                    <select name='sub_cat' id=''>
                        <option disabled selected>--Select sub category--</option>
                        <?php echo fetch_sub_cat(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Select Product Image 1: </td>
                <td><input type='file' name = 'img1'></td>
            </tr>
            <tr>
                <td>Select Product Image 2: </td>
                <td><input type='file' name = 'img2'></td>
            </tr>
            <tr>
                <td>Select Product Image 3: </td>
                <td><input type='file' name = 'img3'></td>
            </tr>
            <tr>
                <td>Select Product Image 4: </td>
                <td><input type='file' name = 'img4'></td>
            </tr>
            <tr>
                <td>Enter Feature 1: </td>
                <td><input type='text' name = 'feature1' Placeholder = 'Enter product Feature'></td>
            </tr>
            <tr>
                <td>Enter Feature 2: </td>
                <td><input type='text' name = 'feature2' Placeholder = 'Enter product Feature'></td>
            </tr>
            <tr>
                <td>Enter Feature 3: </td>
                <td><input type='text' name = 'feature3' Placeholder = 'Enter product Feature'></td>
            </tr>
            <tr>
                <td>Enter Feature 4: </td>
                <td><input type='text' name = 'feature4' Placeholder = 'Enter product Feature'></td>
            </tr>
            <tr>
                <td>Enter Price: </td>
                <td><input type='text' name = 'price' Placeholder = 'Enter product Price'></td>
            </tr>
            <tr>
                <td>Enter Model No.: </td>
                <td><input type='text' name = 'model' Placeholder = 'Enter Model number'></td>
            </tr>
            <tr>
                <td>Enter Warranty: </td>
                <td><input type='text' name = 'warranty' Placeholder = 'Enter product Warranty'></td>
            </tr>
            <tr>
                <td>For Whom: </td>
                <td>
                    <select name='for_whom' >
                        <option selected disabled>--For whom--</option>
                        <option value='All'>Custom</option>
                        <option value='Men'>Men</option>
                        <option value='Women'>Women</option>
                        <option value='Kids'>Kids</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Enter Product Keywords: </td>
                <td><input type='text' name = 'key' Placeholder = 'Enter product Keyword'></td>
            </tr>
        </table>
        <center>
            <button type = 'submit' name = 'add_product'>Add Product</button>
        </center>
    </form>
</div>

    <?php echo add_product(); ?>
