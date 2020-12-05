<div id="bodyLeft">
        <?php if(!isset($_GET['cat_id'])){?>
        <h2>STORES AND THEIR BRANDS</h2>
        <div id="slider">
            <img src="./img/slider/bg.jpg" alt="" width="300">
        </div><!--End of slider-->
        <ul>
        <?php echo electronics() ?>
        </ul><br clear = 'All'>
        <ul>
        <?php echo computers() ?>
        </ul><br clear = 'All'>
        <ul>
        <?php echo gadgets() ?>
        </ul><br clear = 'All'>
        <ul>
        <?php echo crockery() ?>
        </ul><br clear = 'All'>
        <ul>
        <?php echo cloths() ?>
        </ul><br clear = 'All'>
        <?php } ?>
    </div><!--End of body left-->

